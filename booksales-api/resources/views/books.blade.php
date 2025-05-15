<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books Page - Martin Harahap</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>BookSales</h1>
            <h2>Selamat datang di toko buku online kami</h2>
            <h2>Daftar Buku yang Tersedia</h2>
        </div>

        <div class="content">
            @if(isset($books) && count($books) > 0)
                @foreach ($books as $book)
                <div class="item">
                    <h3>{{ $book['title'] }}</h3>
                    <ul class="item-details">
                        <li><strong>Deskripsi:</strong> {{ $book['description'] }}</li>
                        <li><strong>Harga:</strong> Rp {{ number_format($book['price'], 0, ',', '.') }}</li>
                        <li><strong>Stok:</strong> {{ $book['stock'] }} unit</li>
                        <li><strong>Cover:</strong> {{ $book['cover_photo'] }}</li>
                        <li><strong>Penulis:</strong> {{ $book['author']['name'] }}</li>
                        <li><strong>Genre:</strong> {{ $book['genre']['name'] }}</li>
                    </ul>
                </div>
                @endforeach
            @else
                <div class="empty-state">
                    <p>Tidak ada buku yang tersedia saat ini.</p>
                </div>
            @endif
        </div>

        <div class="navigation">
            <a href="genres" class="nav-link">Lihat Daftar Genres</a>
            <a href="authors" class="nav-link">Lihat Daftar Author</a>
        </div>
    </div>
</body>
</html>