<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Http;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/login', 'login')->name('login');
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
Route::get('/logout', [GoogleAuthController::class, 'logout']);

Route::view('/buat-petisi', 'buat.index')->middleware('auth');
Route::view('/buat-petisi/judul', 'buat.judul');
Route::view('/buat-petisi/foto', 'buat.foto');
Route::view('/buat-petisi/konfirmasi', 'buat.konfirmasi');

Route::view('/tentang', 'tentang');

Route::get('/petisi', [PetitionController::class, 'index'])->name('petisi.index');
Route::get('/petisi/{slug}', [PetitionController::class, 'show'])->name('petisi.show');

Route::view('/petisi', 'petisi/index');
Route::view('/petisi/supported', 'petisi/supported');
Route::view('/petisi/bagikan', 'petisi/bagikan');


Route::get('/profil/{slug}', [UserController::class, 'show'])->name('profil.show');
Route::middleware(['auth', 'check.profile.owner'])->group(function () {
    Route::get('/profil/{slug}/edit', [UserController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/{slug}/edit', [UserController::class, 'update'])->name('profil.update');
});
Route::delete('/profil/delete', [UserController::class, 'destroy'])->name('profil.delete');

Route::get('/api/provinces', function () {
    $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
    return $response->json();
});

Route::get('/api/regencies/{provinceId}', function ($provinceId) {
    $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");
    return $response->json();
});