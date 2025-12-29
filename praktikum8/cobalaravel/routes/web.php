<?php

use App\Http\Controllers\Latihan\LatihanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    echo "<h1>Mari Belajar Framework Laravel 12</h1>";
});

Route::get('/profil', function () {
    return view('coba/profil');
});

Route::get('/latihan', [LatihanController::class, 'coba']);

Route::get('/pwl', function () {
    return view('pwl');
});
