<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <div class="Jumbotron jumbotron-fluid">
        <div class="container">
            {{-- //yield digunakan untuk menampilkan isi dari bagian tersebut, disini untuk isi contentnya berada pada folder "views/home.blade.php" --}}
            @yield('content') 
        </div>
    </div>
</body>
</html>