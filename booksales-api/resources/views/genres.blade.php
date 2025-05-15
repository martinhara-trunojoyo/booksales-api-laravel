<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genres Page - Martin Harahap</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>BookSales</h1>
            <h2>Selamat datang di toko buku online kami</h2>
            <h2>Daftar Genre Buku</h2>
        </div>

        <div class="content">
            @if(isset($genres) && count($genres) > 0)
                @foreach ($genres as $genre)
                <div class="item">
                    <h3>{{ $genre['name'] }}</h3>
                    <ul class="item-details">
                        <li><strong>Deskripsi:</strong> {{ $genre['description'] }}</li>
                    </ul>
                </div>
                @endforeach
            @else
                <div class="empty-state">
                    <p>Tidak ada genre yang tersedia saat ini.</p>
                </div>
            @endif
        </div>

        <div class="navigation">
            <a href="books" class="nav-link">Lihat Daftar Buku</a>
            <a href="authors" class="nav-link">Lihat Daftar Author</a>
        </div>
    </div>
</body>
</html>