<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublikController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;
// Public routes
Route::get('/', [PublikController::class, 'index'])->name('publik.index');
Route::get('/artikel/{id}', [PublikController::class, 'detail'])->name('publik.detail');
Route::get('/artikel', [PublikController::class, 'artikel'])->name('publik.artikel');
Route::get('/kategori', [PublikController::class, 'kategori'])->name('publik.kategori');
Route::get('/tentang', [PublikController::class, 'tentang'])->name('publik.tentang');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// CMS routes (perlu login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('cms/artikel', ArtikelController::class);
    Route::resource('cms/kategori', KategoriArtikelController::class);
    Route::resource('cms/penulis', PenulisController::class);
});

require __DIR__.'/auth.php';