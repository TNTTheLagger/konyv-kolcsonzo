<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rental;
use App\Models\Book;
use Faker\Factory as Faker;

class RentalSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $books = Book::all();

        foreach ($books as $book) {
            Rental::create([
                'book_id' => $book->id,
                'email' => $faker->email,
                'rental_date' => $faker->date(),
                'return_date' => null
            ]);
        }
    }
}
