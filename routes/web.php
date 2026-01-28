<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/berita', [FrontendController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [FrontendController::class, 'beritaShow'])->name('berita.show');
Route::get('/tentang', [FrontendController::class, 'tentang'])->name('tentang');
Route::get('/visi-misi', [FrontendController::class, 'visiMisi'])->name('visi-misi');
Route::get('/statistik', [FrontendController::class, 'statistik'])->name('statistik');
Route::get('/kontak', [FrontendController::class, 'kontak'])->name('kontak');
Route::get('/galeri', [FrontendController::class, 'galeri'])->name('galeri');
Route::get('/halaman/{slug}', [FrontendController::class, 'page'])->name('page');
