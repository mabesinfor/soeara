<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;

Route::view('/', 'welcome');
Route::view('/login', 'login');
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
Route::get('/logout', [GoogleAuthController::class, 'logout']);

Route::view('/buat', 'buat.index');
Route::view('/petisi', 'petisi.index');
Route::view('/tentang', 'tentang');