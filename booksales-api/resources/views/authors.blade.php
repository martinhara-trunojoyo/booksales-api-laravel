<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authors Page - Martin Harahap</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>BookSales</h1>
            <h2>Selamat datang di toko buku online kami</h2>
            <h2>Daftar Penulis Buku</h2>
        </div>

        <div class="content">
            @if(isset($authors) && count($authors) > 0)
                @foreach ($authors as $author)
                <div class="item">
                    <h3>{{ $author['name'] }}</h3>
                    <ul class="item-details">
                        <li><strong>Foto:</strong> {{ $author['photo'] }}</li>
                        <li><strong>Biografi:</strong> {{ $author['bio'] }}</li>
                    </ul>
                </div>
                @endforeach
            @else
                <div class="empty-state">
                    <p>Tidak ada penulis yang tersedia saat ini.</p>
                </div>
            @endif
        </div>

        <div class="navigation">
            <a href="genres" class="nav-link">Lihat Daftar Genres</a>
            <a href="books" class="nav-link">Lihat Daftar Buku</a>
        </div>
    </div>
</body>
</html>