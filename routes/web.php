<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Data\BukuController;
use App\Http\Controllers\Data\UserController;
use App\Http\Controllers\Data\UlasanController;
use App\Http\Controllers\Data\KategoriController;
use App\Http\Controllers\Data\PeminjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'vlogin')->name('vlogin');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'vregister')->name('vregister');
    Route::post('/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'index'])->name('dashboard');

    // data user
    Route::controller(UserController::class)->prefix('data_user')->group(function () {
        Route::get('/', 'data_user')->name('data.user');
        Route::get('/tambah', 'tambah_user')->name('tambah.user');
        Route::post('/store', 'store_user')->name('store.user');
        Route::get('/hapus/{id}', 'hapus_user')->name('hapus.user');
        Route::get('/edit/{id}', 'edit_user')->name('edit.user');
        Route::post('/update/{id}', 'update_user')->name('update.user');
    });

    // data buku
    Route::controller(BukuController::class)->prefix('data_buku')->group(function () {
        Route::get('/', 'data_buku')->name('data.buku');
        Route::get('/tambah', 'tambah_buku')->name('tambah.buku');
        Route::post('/store', 'store_buku')->name('store.buku');
        Route::get('/hapus/{buku_id}', 'hapus_buku')->name('hapus.buku');
        Route::get('/edit/{buku_id}', 'edit_buku')->name('edit.buku');
        Route::post('/update/{buku_id}', 'update_buku')->name('update.buku');
    });

    // data kategori
    Route::controller(KategoriController::class)->prefix('data_kategori')->group(function () {
        Route::get('/', 'data_kategori')->name('data.kategori');
        Route::get('/tambah', 'tambah_kategori')->name('tambah.kategori');
        Route::post('/store', 'store_kategori')->name('store.kategori');
        Route::post('/hapus/{kategori_id}', 'hapus_kategori')->name('hapus.kategori');
        Route::get('/edit/{kategori_id}', 'edit_kategori')->name('edit.kategori');
        Route::post('/update/{kategori_id}', 'update_kategori')->name('update.kategori');
    });

    // data ulasan
    Route::controller(UlasanController::class)->prefix('data_ulasan')->group(function () {
        Route::get('/', 'data_ulasan')->name('data.ulasan');
        Route::get('/tambah', 'tambah_ulasan')->name('tambah.ulasan');
        Route::post('/store', 'store_ulasan')->name('store.ulasan');
        Route::get('/edit/{ulasan_id}', 'edit_ulasan')->name('edit.ulasan');
        Route::post('/update/{ulasan_id}', 'update_ulasan')->name('update.ulasan');
        Route::post('/hapus/{ulasan_id}', 'hapus_ulasan')->name('hapus.ulasan');
    });

    // data peminjaman
    Route::controller(PeminjamanController::class)->prefix('data_peminjaman')->group(function () {
        Route::get('/', 'data_peminjaman')->name('data.peminjaman');
        Route::get('/tambah', 'tambah_peminjaman')->name('tambah.peminjaman');
        Route::post('/store', 'store_peminjaman')->name('store.peminjaman');
        Route::get('/edit/{peminjaman_id}', 'edit_peminjaman')->name('edit.peminjaman');
        Route::post('/update/{peminjaman_id}', 'update_peminjaman')->name('update.peminjaman');
        Route::post('/hapus/{peminjaman_id}', 'hapus_peminjaman')->name('hapus.peminjaman');
    });
});