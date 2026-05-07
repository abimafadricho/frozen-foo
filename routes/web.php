<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BantuanController;

Route::get('/', fn() => redirect()->route('barang.index'));

Route::resource('barang', BarangController::class);
Route::resource('kategori', KategoriController::class);

Route::get('/bantuan', [BantuanController::class, 'index'])->name('bantuan.index');