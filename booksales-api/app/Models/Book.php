<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    private $books = [
        [
            'title' => 'The Great Gatsby',
            'description' => 'A novel written by American author F. Scott Fitzgerald.',
            'price' => 40000,
            'stock' => 10,
            'cover_photo' => 'The_Great_Gatsby.jpg',
            'genre_id' => 1,
            'author_id' => 1
        ],
        [
            'title' => 'To Kill a Mockingbird',
            'description' => 'A novel by Harper Lee published in 1960.',
            'price' => 30000,
            'stock' => 5,
            'cover_photo' => 'To_Kill_a_Mockingbird.jpg',
            'genre_id' => 2,
            'author_id' => 2
        ],
        [
            'title' => '1984',
            'description' => 'A dystopian social science fiction novel and cautionary tale.',
            'price' => 25000,
            'stock' => 8,
            'cover_photo' => '1984.jpg',
            'genre_id' => 3,
            'author_id' => 3
        ],
        ];

    public function getBooks()
    {
        return $this->books;
    }
}
