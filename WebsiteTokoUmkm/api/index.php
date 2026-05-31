<?php

// Mengaktifkan mode deteksi error secara paksa
ini_set('display_errors', 1);
error_reporting(E_ALL);

// TRIK PAMUNGKAS: Paksa sistem menghapus semua file cache yang membeku di server Vercel
if (isset($_ENV['VERCEL_JOB_ID']) || isset($_SERVER['VERCEL_URL'])) {
    // Jalankan pembersihan internal via perintah shell PHP sebelum Laravel dimuat
    @shell_exec('php ../artisan config:clear');
    @shell_exec('php ../artisan view:clear');
    @shell_exec('php ../artisan cache:clear');
    
    // Paksa timpa folder kompilasi view secara mutlak ke folder sementara /tmp
    $_ENV['VIEW_COMPILED_PATH'] = '/tmp';
    $_SERVER['VIEW_COMPILED_PATH'] = '/tmp';
}

// Mengarahkan request Vercel secara aman ke file public Laravel
require __DIR__ . '/../public/index.php';
