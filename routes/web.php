<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/login', 'login')->name('login');
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
Route::get('/logout', [GoogleAuthController::class, 'logout']);

Route::view('/buat-petisi', 'buat.index')->middleware('auth');
Route::view('/buat-petisi/judul', 'buat.judul');
Route::view('/buat-petisi/foto', 'buat.foto');
Route::view('/buat-petisi/konfirmasi', 'buat.konfirmasi');

Route::view('/telusuri-petisi', 'telusuri');
Route::view('/tentang-kami', 'tentang');

Route::get('/petisi', [PetitionController::class, 'index'])->name('petisi.index');
Route::get('/petisi/{slug}', [PetitionController::class, 'show'])->name('petisi.show');

Route::view('/petisi', 'petisi/index');
Route::view('/petisi/supported', 'petisi/supported');
Route::view('/petisi/bagikan', 'petisi/bagikan');

Route::get('/profil/{slug}', [UserController::class, 'show'])->name('users.show');
Route::get('/profil/{slug}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/api/provinces', [ApiController::class, 'getProvinces']);
Route::get('/api/districts/{province_id}', [ApiController::class, 'getDistricts']);

// Route::middleware('role:admin')->group(function () {
//     Route::get('/dashboard', [AdminPetitionController::class, 'indexPending']);
//     Route::get('/dashboard/pending', [AdminPetitionController::class, 'indexPending']);
//     Route::put('/dashboard/pending/{id}/terima', [AdminPetitionController::class, 'terima']);
//     Route::put('/dashboard/pending/{id}/tolak', [AdminPetitionController::class, 'tolak']);

//     Route::resource('/dashboard/kategori', CategoryController::class);

//     Route::resource('/dashboard/pengguna', UserController::class);

//     Route::get('/dashboard/petisi', [AdminPetitionController::class, 'index']);
// });
