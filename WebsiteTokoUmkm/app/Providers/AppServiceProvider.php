<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- 1. Pastikan baris ini ada

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 2. Tambahkan kode ini agar semua aset otomatis menggunakan https lewat ngrok
        if (env('APP_ENV') !== 'local' || str_contains(request()->url(), 'ngrok-free.dev')) {
            URL::forceScheme('https');
        }
    }
}
