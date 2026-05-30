<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Rute untuk pembeli melihat katalog depan
Route::get('/', [ProductController::class, 'index']);

// Rute untuk dashboard admin yang sudah DIKUNCI (Wajib Login)
Route::get('/admin', [ProductController::class, 'adminDashboard'])->middleware('auth');
Route::post('/admin/tambah', [ProductController::class, 'store'])->middleware('auth');
Route::delete('/admin/hapus/{id}', [ProductController::class, 'destroy'])->middleware('auth');

// Tambahan otomatis rute bawaan Laravel Auth (Biarkan saja)
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
