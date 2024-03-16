<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\User;

class UserProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create rest of the users
        User::factory(10)->create()->each(function ($user) {

            $name = explode(' ', $user->name);

            Profile::factory()->create([
                'user_id' => $user->id,
                'firstname' => $name[0],
                'lastname' => $name[1]
            ]);
        });
    }
}