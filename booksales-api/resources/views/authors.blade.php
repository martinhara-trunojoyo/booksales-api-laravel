<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authors Page - Martin Harahap</title>
</head>
<body>
    <h1>Welcome user !</h1>
    <h2>Selamat datang di toko BookSales </h2>
    <h2>Ini adalah daftar penulis buku yang tersedia saat ini</h2>
    <h2>Daftar Penulis Buku</h2>
    @if(isset($authors) && count($authors) > 0)
        @foreach ($authors as $item)
        <ul>
            <li>{{ $item['id'] }}</li>
            <li>{{ $item['name'] }}</li>
            <li>{{ $item['photo'] }}</li>
            <li>{{ $item['bio'] }}</li>
        </ul>
        @endforeach
    @else
        <p>No books available at the moment.</p>
    @endif

    <a href="genres"> <- Lihat Daftar Genres</a> <br>
    <a href="books"> Lihat Daftar Buku -> </a> 
        

</body>
</html>