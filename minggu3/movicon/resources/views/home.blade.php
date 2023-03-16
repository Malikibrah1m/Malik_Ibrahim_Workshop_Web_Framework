{{-- <!DOCTYPE html>
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
            <h1 class="display-4">Halaman Home</h1>
            <p class="lead">Halaman ini merupakan halaman home</p>
        </div>
    </div>
</body>
</html> --}}
{{-- Directive extends menghubungkan view ke view master. Disini saya menghubungkan dengan file yang berada di folder "app/layouts/app.blade.php" --}}
@extends('layouts.app')
{{-- //Directive section mendefinisikan sebuah bagian (section) dari isi halaman web, --}}
@section('content')
    <div class="jumbotron jumbotron-fluide">
        <div class="container">
            <h1 class="display-4">Home Page</h1>
            <p class="lead">Ini Home Page</p>
        </div>
        {{-- //Nilai/value dari variabel nama dan pelajaran yang disebutkan di bawah berada di ManajemenController.php --}}
        <p>Nama : {{ $nama }}</p>
        <p>Mata Pelajaran</p>
        <ul>
            @foreach ($pelajaran as $p)
                <li>
                    {{ $p }}
                </li>
            @endforeach
        </ul>
    </div>
    
@endsection