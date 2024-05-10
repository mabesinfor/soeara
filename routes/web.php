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

Route::view('/buat-petisi', 'buat.index')->middleware('auth');
Route::view('/telusuri-petisi', 'telusuri');
Route::view('/tentang-kami', 'tentang');

Route::middleware('role:admin')->group(function () {    
    Route::get('/dashboard', [AdminPetitionController::class, 'indexPending']);
    Route::get('/dashboard/pending', [AdminPetitionController::class, 'indexPending']);
    Route::put('/dashboard/pending/{id}/terima', [AdminPetitionController::class, 'terima']);
    Route::put('/dashboard/pending/{id}/tolak', [AdminPetitionController::class, 'tolak']);
    
    Route::resource('/dashboard/kategori', CategoryController::class);

    Route::resource('/dashboard/pengguna', UserController::class);

    Route::get('/dashboard/petisi', [AdminPetitionController::class, 'index']);
});
