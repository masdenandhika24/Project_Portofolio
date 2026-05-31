<?php

use Illuminate\Support\Facades\Route;

// TRIK CURANG: Tampilkan halaman katalog langsung pake HTML murni biar jebol tanpa storage!
Route::get('/', function() {
    return '
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dandi Catering & UMKM</title>
        <link href="https://jsdelivr.net" rel="stylesheet">
        <style>
            body { background-color: #f8f9fa; }
            .hero { background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url("https://unsplash.com"); background-size: cover; background-position: center; color: white; padding: 100px 0; text-align: center; }
            .card-img-top { height: 200px; object-fit: cover; }
        </style>
    </head>
    <body>
        <div class="hero">
            <h1 class="display-4 fw-bold">Dandi Catering & UMKM</h1>
            <p class="lead">Menyediakan Paket Katering Premium, Nasi Kotak, dan Snack Box Lezat</p>
        </div>
        
        <div class="container my-5">
            <h2 class="text-center mb-4 fw-bold">Daftar Menu Katalog Kami</h2>
            <div class="row g-4">
                <!-- Menu 1 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="https://unsplash.com" class="card-img-top" alt="Nasi Kotak">
                        <div class="card-body">
                            <span class="badge bg-danger mb-2">Nasi Kotak</span>
                            <h5 class="card-title fw-bold">Paket Nasi Kotak Ayam Bakar</h5>
                            <p class="card-text text-muted">Nasi putih, ayam bakar bumbu rujak, tahu, tempe goreng, lalapan segar, dan sambal terasi.</p>
                            <h4 class="text-success fw-bold">Rp 25.000</h4>
                        </div>
                    </div>
                </div>
                <!-- Menu 2 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="https://unsplash.com" class="card-img-top" alt="Prasmanan">
                        <div class="card-body">
                            <span class="badge bg-warning text-dark mb-2">Prasmanan</span>
                            <h5 class="card-title fw-bold">Prasmanan Nikmat Premium</h5>
                            <p class="card-text text-muted">Paket prasmanan mewah lengkap untuk acara pernikahan, hajatan, atau ulang tahun keluarga.</p>
                            <h4 class="text-success fw-bold">Rp 45.000</h4>
                        </div>
                    </div>
                </div>
                <!-- Menu 3 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="https://unsplash.com" class="card-img-top" alt="Snack">
                        <div class="card-body">
                            <span class="badge bg-info text-dark mb-2">Kue & Snack</span>
                            <h5 class="card-title fw-bold">Snack Box Acara Formal</h5>
                            <p class="card-text text-muted">Isi 3 macam kue premium (lemper ayam, sus buah, pastel lezat) ditambah air mineral gelas.</p>
                            <h4 class="text-success fw-bold">Rp 15.000</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>';
});
