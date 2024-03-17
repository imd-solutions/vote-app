<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [
            [
                "quote" => "Dead or alive... You are coming with me!",
                "movie" => "Robocop",
                "year" =>  "1987",
                "image_url" => "https://upload.wikimedia.org/wikipedia/en/1/16/RoboCop_%281987%29_theatrical_poster.jpg",
                "rating" => 4,
                "character" => "Alex Murphy / Robocop"
            ],
            [
                "quote" => "Show me the money",
                "movie" => "Jerry McQuire",
                "year" =>  "1996",
                "image_url" => "https://upload.wikimedia.org/wikipedia/en/e/ea/Jerry_Maguire_movie_poster.jpg",
                "rating" => 4,
                "character" => "Jerry Maguire"
            ],
            [
                "quote" => "I have come here to chew bubble gum and kick ass, and I'm all out of bubble gum",
                "movie" => "THEY LIVE",
                "year" =>  "1988",
                "image_url" => "https://upload.wikimedia.org/wikipedia/en/3/3d/1988They_Live_poster300.jpg",
                "rating" => 5,
                "character" => "Nada"
            ],
            [
                "quote" => "Nobody puts baby in the corner",
                "movie" => "Dirty Dancing",
                "year" =>  "1987",
                "image_url" => "https://upload.wikimedia.org/wikipedia/en/0/00/Dirty_Dancing.jpg",
                "rating" => 3,
                "character" => "Johnny Castle"
            ]
        ];

        foreach($movies as $movie){
            Movie::create($movie);
        }
        
    }
}