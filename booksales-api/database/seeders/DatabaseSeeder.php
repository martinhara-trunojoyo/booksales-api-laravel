<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // GenreSeeder::class;

        $this->call([
            GenreSeeder::class,
        ]);

        // AuthorSeeder::class;
        $this->call([
            AuthorSeeder::class,
        ]);

        // BookSeeder::class;
        $this->call([
            BookSeeder::class,
        ]);

        // UserSeeder::class;
        $this->call([
            UserSeeder::class,
        ]);
    }
}
