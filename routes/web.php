<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Data\BukuController;
use App\Http\Controllers\Data\UserController;
use App\Http\Controllers\Data\LaporanController;
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

Route::get('/', [AuthController::class, 'vlogin'])->name('vlogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'vregister'])->name('vregister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'index'])->name('dashboard');

    // data user
    Route::get('/data_user', [UserController::class, 'data_user'])->name('data.user');
    Route::get('/data_user/hapus/{id}', [UserController::class, 'hapus_user'])->name('hapus.user');

    // data buku
    Route::get('/data_buku', [BukuController::class, 'data_buku'])->name('data.buku');
    Route::get('/data_buku/tambah', [BukuController::class, 'tambah_buku'])->name('tambah.buku');
    Route::post('/data_buku/store', [BukuController::class, 'store_buku'])->name('store.buku');
    Route::get('/data_buku/hapus/{buku_id}', [BukuController::class, 'hapus_buku'])->name('hapus.buku');
    Route::get('/data_buku/edit/{buku_id}', [BukuController::class, 'edit_buku'])->name('edit.buku');
    Route::post('/data_buku/update/{buku_id}', [BukuController::class, 'update_buku'])->name('update.buku');

    // data kategori
    Route::get('/data_kategori', [KategoriController::class, 'data_kategori'])->name('data.kategori');
    Route::get('/data_kategori/tambah', [KategoriController::class, 'tambah_kategori'])->name('tambah.kategori');
    Route::post('/data_kategori/store', [KategoriController::class, 'store_kategori'])->name('store.kategori');
    Route::post('/data_kategori/hapus/{kategori_id}', [KategoriController::class, 'hapus_kategori'])->name('hapus.kategori');
    Route::get('/data_kategori/edit/{kategori_id}', [KategoriController::class, 'edit_kategori'])->name('edit.kategori');
    Route::post('/data_kategori/update/{kategori_id}', [KategoriController::class, 'update_kategori'])->name('update.kategori');

    // data laporan
    Route::get('/data_laporan', [LaporanController::class, 'data_laporan'])->name('data.laporan');

    // data peminjaman
    Route::get('/data_peminjaman', [PeminjamanController::class, 'data_peminjaman'])->name('data.peminjaman');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});