<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "quote" => $this->faker->sentence,
            "movie" => $this->faker->word,
            "year" => $this->faker->year,
            "image_url" => $this->faker->imageUrl,
            "rating" => $this->faker->numberBetween(1, 5),
            "character" => $this->faker->name
        ];
    }
}