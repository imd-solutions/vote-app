<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PassportTableSeeder::class);
        // $this->call(UserProfileTableSeeder::class);
        $this->call(MovieTableSeeder::class);
        // $this->call(VoteTableSeeder::class);
    }
}