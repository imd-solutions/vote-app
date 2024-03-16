<?php

namespace Tests\Unit\GraphQL\Mutation;

use App\Models\Profile;
use Tests\Fragments;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use MarvinRabe\LaravelGraphQLTest\TestGraphQL;
use App\Models\User;

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
     * Test Case: User can register their account.
     * @test
     * @group gqlMutationUser
     * @return void
     */
    public function canRegisterAccount(): void
    {

        $response = $this->mutation('userCreate', ['input' => ['firstname' => $this->faker->firstName, 'lastname' => $this->faker->lastName, 'email' => $this->faker->email, 'password' => $this->faker->password]], $this->userFragment());
        $response->assertJsonStructure([
                'data' => [
                    'userCreate' => [
                        'name',
                        'email'
                    ]
                ]
            ]);

        $response->assertSee($this->encodeJsonResult($response['data']['userCreate']));
        $this->assertCount(2, User::all());

    }

    /**
     * Test Case: User can log into the application.
     * @test
     * @group gqlMutationUser
     * @return void
     */
    public function canLogIntoApplication()
    {
        $this->setUp();
        $response = $this->mutation('login', ['input' => ['username' => $this->user->email, 'password' => 'password']], $this->authFragment());
        $response->assertJsonStructure([
                'data' => [
                    'login' => [
                        'access_token',
                        'user' => [
                            'name',
                            'email'
                        ]
                    ]
                ]
            ]);

        $response->assertSee($this->encodeJsonResult($response['data']['login']));
    }

    /**
     * Test Case: User can request a new email confirmation.
     * @test
     * @group gqlMutationUser
     * @return void
     */
    public function canRequestNewEmailConfirmation()
    {
        $response = $this->mutation('resendConfirmationEmail', ['email' => $this->user->email], $this->messageFragment());
        $response->assertJsonStructure([
                'data' => [
                    'resendConfirmationEmail' => [
                        'status',
                        'message'
                    ]
                ]
            ]);

        $response->assertSee($this->encodeJsonResult($response['data']['resendConfirmationEmail']));
    }

    /**
     * Test Case: User can update their information.
     * @test
     * @group gqlMutationUser
     * @return void
     */
    public function canUpdateInformation()
    {
        $input = [
            'id' => $this->user->id,
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'test.user@test.com'
        ];


        $response = $this->mutation('userUpdate', ['input' => $input], $this->userFragment());
        $response->assertJsonStructure([
                'data' => [
                    'userUpdate' => [
                        'id',
                        'name',
                        'email',
                    ]
                ]
            ]);

        $response->assertSee($this->encodeJsonResult($response['data']['userUpdate']));
    }

}