<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books Page - Martin Harahap</title>
</head>
<body>
    <h1>Welcome user !</h1>
    <h2>Selamat datang di toko BookSales </h2>
    <h2>Ini adalah daftar buku yang tersedia saat ini</h2>
    <h2>Daftar Buku</h2>
    @if(isset($books) && count($books) > 0)
        @foreach ($books as $item)
        <ul>
            <li>{{ $item['title'] }}</li>
            <li>{{ $item['description'] }}</li>
            <li>{{ $item['price'] }}</li>
            <li>{{ $item['stock'] }}</li>
            <li>{{ $item['cover_photo'] }}</li>
        </ul>
        @endforeach
    @else
        <p>No books available at the moment.</p>
    @endif

    <a href="genres"> Lihat Daftar Genres -></a>
    <br>
    <a href="authors"> Lihat Daftar Author -> </a>
    <br>

        

</body>
</html>