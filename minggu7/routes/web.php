<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendidikanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/home',HomeController::class);

Route::resource('/dashboard',DashboardController::class);

Route::resource('/pengalaman_kerja',PendidikanController::class);

Route::delete('/pengalaman_kerja/{id}', [PendidikanController::class, 'destroy'])->name('pengalaman_kerja.destroy');
