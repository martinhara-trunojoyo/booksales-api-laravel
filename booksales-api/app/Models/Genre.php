<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [
        [
            'id' => 1,
            'name' => 'fiksi',
            'description' => 'Fiksi adalah karya sastra yang berasal dari imajinasi penulis.'
        ],
        [
            'id' => 2,
            'name' => 'non-fiksi',
            'description' => 'Non-fiksi adalah karya sastra yang berdasarkan fakta dan kenyataan.'
        ],
        [
            'id' => 3,
            'name' => 'fantasi',
            'description' => 'Fantasi adalah genre yang menampilkan elemen-elemen yang tidak nyata.'
        ],
        [
            'id' => 4,
            'name' => 'romantis',
            'description' => 'Romantis adalah genre yang berfokus pada hubungan cinta antara karakter.'
        ],
        [
            'id' => 5,
            'name' => 'horor',
            'description' => 'Horor adalah genre yang dirancang untuk menakut-nakuti pembaca.'
        ],
        [
            'id' => 6,
            'name' => 'thriller',
            'description' => 'Thriller adalah genre yang menegangkan dan penuh ketegangan.'
        ],
        [
            'id' => 7,
            'name' => 'misteri',
            'description' => 'Misteri adalah genre yang berfokus pada penyelidikan kasus atau kejahatan.'
        ],
        [
            'id' => 8,
            'name' => 'sci-fi',
            'description' => 'Sci-fi adalah genre yang berfokus pada ilmu pengetahuan dan teknologi masa depan.'
        ]
    ];
    public function getGenres()
    {
        return $this->genres;
    }
}
