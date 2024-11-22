<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Genre;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $genres = Genre::all();

        foreach ($genres as $genre) {
            for ($i = 0; $i < 5; $i++) {
                Book::create([
                    'title' => $faker->sentence(3),
                    'author' => $faker->name,
                    'genre_id' => $genre->id,
                    'publication_year' => $faker->year
                ]);
            }
        }
    }
}
