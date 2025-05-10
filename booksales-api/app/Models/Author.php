<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $author = [
        [   
            'id' => 1,
            'name' => 'Martin Harahap',
            'photo' => 'Martin_Harahap.jpg',
            'bio' => 'Martin Harahap adalah seorang penulis dan editor buku terkenal di Indonesia. Ia lahir pada 15 Maret 1980 di Jakarta. Martin dikenal karena karya-karyanya yang mengangkat tema sosial dan budaya'
        ],
        [
            'id' => 2,
            'name' => 'J.K. Rowling',
            'photo' => 'JK_Rowling.jpg',
            'bio' => 'J.K. Rowling adalah seorang penulis asal Inggris yang terkenal karena seri novel Harry Potter. Ia lahir pada 31 Juli 1965 di Yate, Gloucestershire, Inggris.'
        ],
        [
            'id' => 3,
            'name' => 'George R.R. Martin',
            'photo' => 'George_RR_Martin.jpg',
            'bio' => 'George R.R. Martin adalah seorang penulis dan produser televisi asal Amerika Serikat. Ia lahir pada 20 September 1948 di Bayonne, New Jersey.'
        ],
        [
            'id' => 4,
            'name' => 'Agatha Christie',
            'photo' => 'Agatha_Christie.jpg',
            'bio' => 'Agatha Christie adalah seorang penulis novel misteri asal Inggris. Ia lahir pada 15 September 1890 di Torquay, Devon, Inggris.'
        ],
        [
            'id' => 5,
            'name' => 'Stephen King',
            'photo' => 'Stephen_King.jpg',
            'bio' => 'Stephen King adalah seorang penulis novel horor dan fiksi ilmiah asal Amerika Serikat. Ia lahir pada 21 September 1947 di Portland, Maine.'
        ],
        [
            'id' => 6,
            'name' => 'J.R.R. Tolkien',
            'photo' => 'JRRTolkien.jpg',
            'bio' => 'J.R.R. Tolkien adalah seorang penulis dan profesor asal Inggris. Ia lahir pada 3 Januari 1892 di Bloemfontein, Afrika Selatan.'
        ],
        [
            'id' => 7,
            'name' => 'Isaac Asimov',
            'photo' => 'Isaac_Asimov.jpg',
            'bio' => 'Isaac Asimov adalah seorang penulis dan profesor asal Rusia yang menjadi warga negara Amerika Serikat. Ia lahir pada 2 Januari 1920 di Petrovichi, Rusia.'
        ],
        [
            'id' => 8,
            'name' => 'Dan Brown',
            'photo' => 'Dan_Brown.jpg',
            'bio' => 'Dan Brown adalah seorang penulis thriller asal Amerika Serikat. Ia lahir pada 22 juni 1964 di Exeter, New Hampshire.'
        ]
    ];
    public function getAuthors()
    {
        return $this->author;
    }
}
