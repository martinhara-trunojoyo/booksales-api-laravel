<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'The Great Gatsby',
            'description' => 'A novel written by American author F. Scott Fitzgerald.',
            'price' => 40000,
            'stock' => 10,
            'cover_photo' => 'The_Great_Gatsby.jpg',
            'genre_id' => 1,
            'author_id' => 1
        ]);
        Book::create([
            'title' => 'To Kill a Mockingbird',
            'description' => 'A novel by Harper Lee published in 1960.',
            'price' => 30000,
            'stock' => 5,
            'cover_photo' => 'To_Kill_a_Mockingbird.jpg',
            'genre_id' => 2,
            'author_id' => 2
        ]);
        Book::create([
            'title' => '1984',
            'description' => 'A dystopian social science fiction novel and cautionary tale.',
            'price' => 25000,
            'stock' => 8,
            'cover_photo' => '1984.jpg',
            'genre_id' => 3,
            'author_id' => 3
        ]);
        Book::create([
            'title' => 'Harry Potter and the Philosopher\'s Stone',
            'description' => 'The first book in the Harry Potter series by J.K. Rowling.',
            'price' => 50000,
            'stock' => 15,
            'cover_photo' => 'Harry_Potter_and_the_Philosopher\'s_Stone.jpg',
            'genre_id' => 4,
            'author_id' => 4
        ]);
        Book::create([
            'title' => 'The Hobbit',
            'description' => 'A fantasy novel by J.R.R. Tolkien, a prelude to The Lord of the Rings.',
            'price' => 35000,
            'stock' => 12,
            'cover_photo' => 'The_Hobbit.jpg',
            'genre_id' => 5,
            'author_id' => 5
        ]);
        Book::create([
            'title' => 'The Lord of the Rings: The Fellowship of the Ring',
            'description' => 'The first part of J.R.R. Tolkien\'s epic fantasy trilogy.',
            'price' => 60000,
            'stock' => 7,
            'cover_photo' => 'The_Lord_of_the_Rings_The_Fellowship_of_the_Ring.jpg',
            'genre_id' => 5,
            'author_id' => 5
        ]);
    }
}
