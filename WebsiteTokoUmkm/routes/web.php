<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProductController;

// Rute untuk pembeli melihat katalog depan
Route::get('/', [ProductController::class, 'index']);

// Rute untuk dashboard admin yang sudah DIKUNCI (Wajib Login)
Route::get('/admin', [ProductController::class, 'adminDashboard'])->middleware('auth');
Route::post('/admin/tambah', [ProductController::class, 'store'])->middleware('auth');
Route::delete('/admin/hapus/{id}', [ProductController::class, 'destroy'])->middleware('auth');

// Tambahan otomatis rute bawaan Laravel Auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route darurat untuk membersihkan cache konfigurasi di Vercel
Route::get('/clear-vercel', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return "Semua cache di Vercel sudah bersih! Silakan kembali ke halaman utama.";
});
