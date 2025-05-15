<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'F. Scott Fitzgerald',
            'photo' => 'f_scott_fitzgerald.jpg',
            'bio' => 'An American novelist and short story writer, widely regarded as one of the greatest American writers of the 20th century.'
        ]);
        Author::create([
            'name' => 'Harper Lee',
            'photo' => 'harper_lee.jpg',
            'bio' => 'An American novelist best known for her 1960 novel To Kill a Mockingbird, which won the Pulitzer Prize.'
        ]);
        Author::create([
            'name' => 'George Orwell',
            'photo' => 'george_orwell.jpg',
            'bio' => 'An English novelist, essayist, journalist, and critic, known for his works such as 1984 and Animal Farm.'
        ]);
        Author::create([
            'name' => 'J.K. Rowling',
            'photo' => 'jk_rowling.jpg',
            'bio' => 'A British author, best known for writing the Harry Potter fantasy series.'
        ]);
        Author::create([
            'name' => 'J.R.R. Tolkien',
            'photo' => 'jrr_tolkien.jpg',
            'bio' => 'An English writer, best known for The Hobbit and The Lord of the Rings.'
        ]);
    }
}
