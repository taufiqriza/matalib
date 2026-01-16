<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/berita', [FrontendController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [FrontendController::class, 'beritaShow'])->name('berita.show');
Route::get('/tentang', [FrontendController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [FrontendController::class, 'kontak'])->name('kontak');
Route::get('/galeri', [FrontendController::class, 'galeri'])->name('galeri');
Route::get('/halaman/{slug}', [FrontendController::class, 'page'])->name('page');
