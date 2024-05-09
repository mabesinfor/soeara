<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;

Route::view('/', 'welcome');
Route::view('/login', 'login')->name('login');
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
Route::get('/logout', [GoogleAuthController::class, 'logout']);

Route::view('/buat', 'buat.index')->middleware('auth');
Route::view('/petisi', 'petisi.index');
Route::view('/tentang', 'tentang');

Route::view('/dashboard', 'dashboard.index')->middleware('role:admin');