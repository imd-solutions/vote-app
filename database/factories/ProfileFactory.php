<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ProfileFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition ()
    {
        return [
            'user_id' => function () {
                return factory(User::class)->create()->id;
            },
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName
        ];
    }
}