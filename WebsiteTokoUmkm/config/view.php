<?php

// Cek apakah berjalan di server Vercel
$isVercel = isset($_ENV['VERCEL_JOB_ID']) || isset($_SERVER['VERCEL_URL']);

return [

    /*

    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    */

    'paths' => [
        resource_path('views'),
    ],

    /*

    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------

    |
    | 💡 FIX PERMANEN VERCEL: 
    | Jika di Vercel, arahkan LANGSUNG ke root folder '/tmp'. 

    | Folder '/tmp' dijamin sudah ada dan berstatus Writable (bisa ditulis) 
    | tanpa perlu repot menjalankan fungsi mkdir() yang rawan diblokir.
    |
    */

    'compiled' => $isVercel 
        ? '/tmp' 
        : env('VIEW_COMPILED_PATH', realpath(storage_path('framework/views'))),

];
