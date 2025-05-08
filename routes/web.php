<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

Route::resource('genres', GenreController::class);
Route::resource('albums', AlbumController::class);
Route::resource('transaksi', TransaksiController::class)->only(['index', 'create', 'store']);
Route::get('/laporan/album', [LaporanController::class, 'index'])->name('laporan.album.index');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
