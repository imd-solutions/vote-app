<?php

namespace Tests\Unit\GraphQL\Mutation;

use Tests\Fragments;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use MarvinRabe\LaravelGraphQLTest\TestGraphQL;
use Faker\Generator as Faker;

class MovieTest extends TestCase
{
    use RefreshDatabase, TestGraphQL, Fragments;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test Case: Can add a new movie quote.
     * @test
     * @group gqlMutationMovie
     * @return void
     */
    public function canAddNewMovieQuote()
    {
        $method = 'movieCreate';
        $input = [
            'quote' => $this->faker->sentence,
            'movie' => $this->faker->word,
            'year' => $this->faker->year,
            'image_url' => $this->faker->imageUrl,
            'rating' => $this->faker->numberBetween(1, 5),
            'character' => $this->faker->name
        ];

        $response = $this->mutation($method, ['input' => $input], $this->movieFragment());
        $response->assertJsonStructure([
                'data' => [
                    $method => $this->movieFragment()
                ]
            ]);

        $response->assertSee($this->encodeJsonResult($response['data'][$method]));

    }

    /**
     * Test Case: Can add multiple movie quotes.
     * @test
     * @group gqlMutationMovie
     * @return void
     */
    public function canAddMultipleMovies()
    {

        $method = 'movieApiCreate';
        $input = [
                [
                    'quote' => $this->faker->sentence,
                    'movie' => $this->faker->word,
                    'character' => $this->faker->name,
                    'year' => $this->faker->year,
                ],
                [
                    'quote' => $this->faker->sentence,
                    'movie' => $this->faker->word,
                    'character' => $this->faker->name,
                    'year' => $this->faker->year,
                ]
        ];

        $response = $this->mutation($method, ['input' => $input], $this->movieFragment());
        $response->assertJsonStructure([
                'data' => [
                    $method => [
                        $this->movieFragment()
                    ]
                ]
            ]);

        $response->assertSee($this->encodeJsonResult($response['data'][$method]));
    }
}