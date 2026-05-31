<?php

// Cek apakah berjalan di server Vercel
$isVercel = isset($_ENV['VERCEL_JOB_ID']) || isset($_SERVER['VERCEL_URL']);

// Tentukan folder penyimpanan view cache secara dinamis
$compiledPath = $isVercel ? '/tmp/storage/framework/views' : realpath(storage_path('framework/views'));

// Buat foldernya secara paksa jika berjalan di Vercel dan belum ada
if ($isVercel && !is_dir($compiledPath)) {
    mkdir($compiledPath, 0755, true);
}

return [

    /*

    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------

    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course

    | the usual Laravel view path has already been registered for you.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*

    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------

    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage

    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => $compiledPath,

];
