<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\CommentController;

Route::get('/buat-petisi', [PetitionController::class, 'create'])->middleware('auth')->name('petisi.create');
Route::post('/store-petisi', [PetitionController::class, 'store'])->middleware('auth')->name('petisi.store');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/login', 'login')->name('login');
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
Route::get('/logout', [GoogleAuthController::class, 'logout']);

Route::view('/tentang', 'tentang')->name('tentang');

Route::get('/petisi', [PetitionController::class, 'index'])->name('petisi.index');
Route::get('/petisi/{slug}', [PetitionController::class, 'show'])->name('petisi.show');
Route::post('/submitkomen', [CommentController::class, 'store']);

Route::view('/petisi/supported', 'petisi/supported')->middleware('auth');;
Route::view('/petisi/bagikan', 'petisi/bagikan')->middleware('auth');;

Route::get('/profil/{slug}', [UserController::class, 'show'])->name('profil.show');
Route::get('/profil/reg/{slug}', [UserController::class, 'reg'])->name('profil.reg');
Route::get('/profil/done/{slug}', [UserController::class, 'done'])->name('profil.done');
Route::middleware(['auth', 'check.profile.owner'])->group(function () {
    Route::get('/profil/{slug}/edit', [UserController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/{slug}/edit', [UserController::class, 'update'])->name('profil.update');
});
Route::delete('/profil/delete', [UserController::class, 'destroy'])->name('profil.delete');
Route::post('/profil/update_session_tabs', [UserController::class, 'updateSessionTabs'])->name('profil.update_session_tabs');

Route::get('/api/provinces', function () {
    $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
    return $response->json();
});
Route::get('/api/regencies/{provinceId}', function ($provinceId) {
    $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");
    return $response->json();
});

Route::view('/tinjau', 'tinjau.index')->middleware('auth');
Route::view('/tinjau/victory', 'tinjau.victory')->middleware('auth');
Route::view('/tinjau/closed', 'tinjau.closed')->middleware('auth');
