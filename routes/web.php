<?php

use App\Http\Controllers\AdminPetitionController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UserController;

Route::view('/', 'welcome');
Route::view('/login', 'login')->name('login');
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
Route::get('/logout', [GoogleAuthController::class, 'logout']);

Route::view('/buat', 'buat.index')->middleware('auth');
Route::view('/petisi', 'petisi.index');
Route::view('/tentang', 'tentang');

Route::view('/dashboard', 'dashboard.index')->middleware('role:admin');

Route::middleware('role:admin')->group(function () {
    Route::view('/dashboard', 'dashboard.pending.index', [
        'title' => 'pending'
    ]);
    
    Route::get('/dashboard/pending', [AdminPetitionController::class, 'indexPending']);

    Route::resource('/dashboard/kategori', CategoryController::class);

    Route::resource('/dashboard/pengguna', UserController::class);

    Route::get('/dashboard/petisi', [AdminPetitionController::class, 'index']);
});