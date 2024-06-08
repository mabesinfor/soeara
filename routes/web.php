<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\SupportController;
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
Route::get('/bagikan/{slug}', [PetitionController::class, 'share'])->name('petisi.share');
Route::post('/submitkomen', [CommentController::class, 'store'])->middleware('auth');
Route::get('/bar/{slug}', [PetitionController::class, 'bar'])->name('petisi.bar')->middleware('ajax');
Route::get('/comments/{slug}', [CommentController::class, 'index'])->name('comments.index')->middleware('ajax');
Route::get('/comments/show/{slug}', [CommentController::class, 'show'])->name('comments.show')->middleware('ajax');
Route::delete('/comments/delete', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::post('/support', [SupportController::class, 'store'])->name('petisi.support')->middleware('auth');

Route::view('/petisi/supported', 'petisi/supported')->middleware('auth');;
Route::view('/petisi/bagikan', 'petisi/bagikan')->middleware('auth');;

Route::get('/profil/{slug}', [UserController::class, 'show'])->name('profil.show');
Route::get('/profil/reg/{slug}', [UserController::class, 'reg'])->name('profil.reg')->middleware('ajax');
Route::get('/profil/done/{slug}', [UserController::class, 'done'])->name('profil.done')->middleware('ajax');
Route::middleware(['auth', 'check.profile.owner'])->group(function () {
    Route::get('/profil/{slug}/edit', [UserController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/{slug}/edit', [UserController::class, 'update'])->name('profil.update');
});
Route::delete('/profil/delete', [UserController::class, 'destroy'])->name('profil.delete');
Route::post('/profil/update_session_tabs', [UserController::class, 'updateSessionTabs'])->name('profil.update_session_tabs');

Route::get('/api/provinces', function () {
    $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
    return $response->json();
})->middleware('ajax');
Route::get('/api/regencies/{provinceId}', function ($provinceId) {
    $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");
    return $response->json();
})->middleware('ajax');

Route::view('/tinjau/closed', 'tinjau.closed');
Route::view('/tinjau/victory', 'tinjau.victory');
Route::get('/tinjau/{slug}', [PetitionController::class, 'tinjau'])->name('tinjau.show')->middleware('auth');
Route::get('tinjau/comments/{slug}', [CommentController::class, 'index_tinjau'])->name('tinjau.comments.index')->middleware('ajax');
Route::get('tinjau/supporters/{slug}', [SupportController::class, 'index_tinjau'])->name('tinjau.supporters.index')->middleware('ajax');

// Route::post('/petitions/{petition}/like', [PetitionController::class, 'like'])->name('petitions.like')->middleware('auth');
// Route::delete('/petitions/{petition}/like', [PetitionController::class, 'unlike'])->name('petitions.unlike')->middleware('auth');
Route::post('/petitions/{petition}/like', [PetitionController::class, 'like'])->name('petitions.like.ajax')->middleware('auth');
Route::delete('/petitions/{petition}/unlike', [PetitionController::class, 'unlike'])->name('petitions.unlike.ajax')->middleware('auth');

Route::delete('/petitions/delete/{petition}', [PetitionController::class, 'destroy'])->middleware('ajax');
Route::post('/petitions/close/{petition}', [PetitionController::class, 'close'])->middleware('ajax');
Route::post('/petitions/open/{petition}', [PetitionController::class, 'open'])->middleware('ajax');
Route::post('/petitions/win/{petition}', [PetitionController::class, 'win'])->middleware('ajax');

Route::get('/search', [PetitionController::class, 'search'])->name('petisi.search');

Route::view('/bantuan', 'bantuan')->name('bantuan');

Route::post('/comments/{id}/like', [CommentController::class, 'like'])->name('comments.like');

Route::get('/petisi/{slug}/bagikan', [PetitionController::class, 'share'])->name('petisi.share');
Route::post('/petisi/log-share', [PetitionController::class, 'logShare'])->name('petisi.logShare')->middleware('auth');