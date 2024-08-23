<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\KontakController;

// Route untuk tampilan website
Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/news/{slug}', [NewsController::class, 'shownews'])->name('news.show');

Route::get('/news', [NewsController::class, 'show'])->name('news.show'); // Tampilan berita di situs web
Route::get('/', [NewsController::class, 'index'])->name('home');


// Route untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'dash'])->middleware('auth');

// Routes untuk mengelola berita di dashboard
Route::get('/dashboard/news', [NewsController::class, 'dashboard'])->name('dash.berita')->middleware('auth'); // Dashboard berita
Route::post('/dashboard/news', [NewsController::class, 'store'])->name('dash.berita.store')->middleware('auth');
Route::get('/dashboard/news/{news}/edit', [NewsController::class, 'edit'])->name('dash.berita.edit')->middleware('auth');
Route::put('/dashboard/news/{news}', [NewsController::class, 'update'])->name('dash.berita.update')->middleware('auth');
Route::delete('/dashboard/news/{news}', [NewsController::class, 'destroy'])->name('dash.berita.destroy')->middleware('auth');

// Route untuk dashboard bagian lainnya
Route::get('/dashboard/berita', [DashboardController::class, 'berita'])->middleware('auth');
Route::get('/dashboard/potensi', [DashboardController::class, 'potensi'])->middleware('auth');
Route::get('/dashboard/perangkat', [DashboardController::class, 'perangkat'])->middleware('auth');
Route::get('/dashboard/sarana', [DashboardController::class, 'sarana'])->middleware('auth');
Route::get('/dashboard/kontak', [DashboardController::class, 'kontak'])->middleware('auth');

Route::get('/potensi', [PotensiController::class, 'show']);
Route::get('/potensi', [PotensiController::class, 'index']);
Route::get('/dashboard/potensi', [PotensiController::class, 'dashboard'])->name('dash.potensi')->middleware('auth');
Route::put('/dashboard/potensi/{potensi}', [PotensiController::class, 'update'])->name('dash.potensi.update')->middleware('auth');

Route::get('/sarana', [SaranaController::class, 'show']);
Route::get('/dashboard/sarana', [SaranaController::class, 'dashboard'])->name('dash.sarana')->middleware('auth');
Route::post('/dashboard/sarana', [SaranaController::class, 'store'])->name('dash.sarana.store')->middleware('auth');
Route::get('/dashboard/sarana/{sarana}/edit', [SaranaController::class, 'edit'])->name('dash.sarana.edit')->middleware('auth');
Route::put('/dashboard/sarana/{sarana}', [SaranaController::class, 'update'])->name('dash.sarana.update')->middleware('auth');
Route::delete('/dashboard/sarana/{sarana}', [SaranaController::class, 'destroy'])->name('dash.sarana.destroy')->middleware('auth');

Route::get('/dashboard/kontak', [KontakController::class, 'edit'])->name('dash.kontak.edit');
Route::put('/dashboard/kontak/{kontak}', [KontakController::class, 'update'])->name('dash.kontak.update')->middleware('auth');