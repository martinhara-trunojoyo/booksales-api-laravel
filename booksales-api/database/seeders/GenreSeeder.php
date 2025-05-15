<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Action',
            'description' => 'Genre yang berisi buku-buku yang berisi tentang peristiwa-peristiwa yang berhubungan dengan perang',
        ]);
        Genre::create([
            'name' => 'Adventure',
            'description' => 'Genre yang berisi buku-buku yang berisi tentang peristiwa-peristiwa yang berhubungan dengan petualangan',
        ]);
        Genre::create([
            'name' => 'Comedy',
            'description' => 'Genre yang berisi buku-buku yang berisi tentang peristiwa-peristiwa yang berhubungan dengan komedi',
        ]);
        Genre::create([
            'name' => 'Drama',
            'description' => 'Genre yang berisi buku-buku yang berisi tentang peristiwa-peristiwa yang berhubungan dengan drama',
        ]);
        Genre::create([
            'name' => 'Fantasy',
            'description' => 'Genre yang berisi buku-buku yang berisi tentang peristiwa-peristiwa yang berhubungan dengan fantasi',
        ]);
        
    }
}
