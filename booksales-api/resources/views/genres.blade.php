<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genres Page - Martin Harahap</title>
</head>
<body>
    <h1>Welcome user !</h1>
    <h2>Selamat datang di toko BookSales </h2>
    <h2>Ini adalah daftar genre yang tersedia saat ini</h2>
    <h2>Daftar genre</h2>
    @if(isset($genres) && count($genres) > 0)
        @foreach ($genres as $item)
        <ul>
            <li>{{ $item['id'] }}</li>
            <li>{{ $item['name'] }}</li>
            <li>{{ $item['description'] }}</li>
        </ul>
        @endforeach
    @else
        <p>No books available at the moment.</p>
    @endif

    <a href="books"> <- Lihat Daftar Buku</a> <br>
    <a href="authors"> Lihat Daftar Author -> </a>

        

</body>
</html>