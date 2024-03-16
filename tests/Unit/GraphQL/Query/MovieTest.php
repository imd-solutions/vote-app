<?php

namespace Tests\Unit\GraphQL\Query;

use App\Models\Movie;
use Tests\Fragments;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use MarvinRabe\LaravelGraphQLTest\TestGraphQL;

class MovieTest extends TestCase
{
    use RefreshDatabase, TestGraphQL, Fragments;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test Case: Can get all the movies from the database.
     * @test
     * @group gqlQueryMovie
     * @return void
     */
    public function canGetMoviesFromDatabase()
    {
        $movies = Movie::factory(10)->create();

        $response = $this->query('movies', $this->movieFragment());
        $response->assertJsonStructure([
            'data' => [
                'movies' => [
                    $this->movieFragment()
                ]
            ]
        ]);

        $response->assertSee($this->encodeJsonResult($response['data']['movies']));
    }
}
