<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buat', function () {
    return view('buat.index');
});

Route::get('/petisi', function () {
    return view('petisi.index');
});

Route::get('/tentang', function () {
    return view('tentang');
});