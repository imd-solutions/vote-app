<?php

namespace Tests\Unit\GraphQL\Mutation;

use Tests\Fragments;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use MarvinRabe\LaravelGraphQLTest\TestGraphQL;
use Faker\Generator as Faker;
use App\Models\Movie;
use App\Models\Vote;

class VoteTest extends TestCase
{
    use RefreshDatabase, TestGraphQL, Fragments;

    public $user;
    public $movie;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = $this->signIn();
        $this->movie = Movie::factory()->create();

        $this->assertCount(1, $this->user::all());
    }

    /**
     * Test Case: Can mark movie quote as fave.
     * @test
     * @group gqlMutationVote
     * @return void
     */
    public function canVoteForMovieQuote()
    {
        $method = 'movieVote';
        $input = [
            'user_id' => $this->user->id,
            'movie_id' => $this->movie->id,
        ];

        $response = $this->mutation($method, ['input' => $input], $this->messageFragment());
        $response->assertJsonStructure([
                'data' => [
                    $method => $this->messageFragment()
                ]
            ]);

        $response->assertSee($this->encodeJsonResult($response['data'][$method]));

        $this->assertCount(1, Vote::all());
    }

    /**
     * Test Case: Can un-mark movie quote as fave.
     * @test
     * @group gqlMutationVote
     * @return void
     */
    public function canUnVoteForMovieQuote()
    {
        $vote = Vote::factory()->create([
            'user_id' => $this->user->id,
            'movie_id' => $this->movie->id,
        ]);

        $this->assertCount(1, Vote::all());

        $method = 'movieVote';
        $input = [
            'user_id' => $this->user->id,
            'movie_id' => $this->movie->id,
        ];

        $response = $this->mutation($method, ['input' => $input], $this->messageFragment());
        $response->assertJsonStructure([
                'data' => [
                    $method => $this->messageFragment()
                ]
            ]);

        $response->assertSee($this->encodeJsonResult($response['data'][$method]));

        $this->assertCount(0, Vote::all());
    }
}