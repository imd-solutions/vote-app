<?php

namespace Tests\Unit\Model;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Movie;
use Tests\TestCase;

class MovieTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

    }

    /**
     * Test Case: Can add a new movie to the database.
     * @test
     * @group modelMovie
     * @return void
     */
    public function canAddNewMovie()
    {
        $movie = Movie::create([
            'quote' => $this->faker->sentence,
            'movie' => $this->faker->word,
            'character' => $this->faker->name,
            'year' => (int)$this->faker->year,
        ]);

        $this->assertDatabaseCount('movies', 1);
    }
}