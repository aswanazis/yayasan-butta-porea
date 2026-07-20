<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EducationalMaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');

Route::get('/program', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/program/{program:slug}', [ProgramController::class, 'show'])->name('programs.show');

Route::get('/berita', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/berita/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/galeri', [GalleryController::class, 'index'])->name('galleries.index');
Route::get('/galeri/{gallery}', [GalleryController::class, 'show'])->name('galleries.show');

Route::get('/materi', [EducationalMaterialController::class, 'index'])->name('materials.index');
Route::get('/materi/{material:slug}', [EducationalMaterialController::class, 'show'])->name('materials.show');

Route::get('/kontak', [ContactController::class, 'index'])->name('contact.index');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['id', 'en'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('lang.switch');