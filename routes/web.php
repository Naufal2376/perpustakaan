<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\FrontendController;

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
    Route::get('/data_user', [DataController::class, 'data_user'])->name('data.user');

    // data buku
    Route::get('/data_buku', [DataController::class, 'data_buku'])->name('data.buku');
    Route::get('/data_buku/tambah', [DataController::class, 'tambah_buku'])->name('tambah.buku');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});