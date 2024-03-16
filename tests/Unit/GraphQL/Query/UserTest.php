<?php

namespace Tests\Unit\GraphQL\Query;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Notifications\ResetPassword;
use Tests\Fragments;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use MarvinRabe\LaravelGraphQLTest\TestGraphQL;
use App\Models\User;
use App\Models\Profile;
use App\Models\Movie;
use App\Models\Vote;

class UserTest extends TestCase
{
    use RefreshDatabase, TestGraphQL, Fragments;

    public $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = $this->signIn();

        $this->assertCount(1, $this->user::all());

        $name = explode(' ', $this->user->name);

        $this->user->profile()->save(Profile::factory()->create([
            'user_id' => $this->user->id,
            'firstname' => $name[0],
            'lastname' => $name[1]
        ]));
    }

    /**
     * Test Case: Can get all the users from the database.
     * @test
     * @group gqlQueryUser
     * @return void
     */
    public function canGetUsersFromDatabase()
    {
        $users = User::factory(2)->create();

        $this->assertCount(3, User::all());

        $nameA = explode(' ', $users[0]->name);
        $nameB = explode(' ', $users[1]->name);

        $users[0]->profile()->create([
            'firstname' => $nameA[0],
            'lastname' => $nameA[1]
        ]);

        $users[1]->profile()->create([
            'firstname' => $nameB[0],
            'lastname' => $nameB[1]
        ]);

        $response = $this->query('users', $this->userFragment());
        $response->assertJsonStructure([
                'data' => [
                    'users' => [
                        [
                            'name',
                            'email'
                        ]
                    ]
                ]
            ]);

        $response->assertSee($this->encodeJsonResult($response['data']['users']));
    }

    /**
     * Test Case: Can get a single user from the database.
     * @test
     * @group gqlQueryUser
     * @return void
     */
    public function canGetSingleUserFromDatabase()
    {
        $name = explode(' ', $this->user->name);

        $this->assertCount(1, Profile::all());

        $response = $this->query('user', ['id' => $this->user->id], $this->userFragment());
        $response->assertJsonStructure([
                'data' => [
                    'user' => [
                        'name',
                        'email',
                        'profile' => [
                            'firstname',
                            'lastname'
                        ]
                    ]
                ]
            ]);

        $response->assertSee($this->encodeJsonResult($response['data']['user']));
    }

    /**
     * Test Case: Can get a single user from the database.
     * @test
     * @group gqlQueryUser
     * @return void
     */
    public function canGetSingleUserVotesFromDatabase()
    {
        $movie = Movie::factory()->create();

        Vote::factory()->create([
            'user_id' => $this->user->id,
            'movie_id' => $movie->id
        ]);

        $response = $this->query('user', ['id' => $this->user->id], $this->userFragment());
        $response->assertJsonStructure([
                'data' => [
                    'user' => [
                        'votes' => [
                           [
                            'movie_id'
                           ]
                        ]
                    ]
                ]
            ]);

        $response->assertSee($this->encodeJsonResult($response['data']['user']));
    }

    /**
     * Test Case: User can request a password reset link.
     * @group gqlQueryUser
     * @return void
     */
    public function canRequestPasswordReset()
    {
        Notification::fake();

        $this->mutation('forgotPassword', ['input' => ['email' => $this->user->email]], $this->messageFragment());

        Notification::assertSentTo($this->user, ResetPassword::class);

        $this->assertCount(1, DB::table('password_resets')->get());

    }

    /**
     * Test Case: Users password request token is valid.
     * @group gqlQueryUser
     * @return void
     */
    public function passwordTokenIsValid()
    {
        Notification::fake();

        $token = Password::broker()->createToken($this->user);

        $this->assertCount(1, DB::table('password_resets')->get());

        $response = $this->query('validPasswordResetToken', ['input' => ['token' => $token, 'email' => $this->user->email]], $this->messageFragment());
        $response->assertJsonStructure([
                'data' => [
                    'validPasswordResetToken' => [
                        'status',
                        'message'
                    ]
                ]
            ]);

        $response->assertSee($this->encodeJsonResult($response['data']['validPasswordResetToken']));

    }
}