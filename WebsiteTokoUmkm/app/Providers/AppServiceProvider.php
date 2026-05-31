<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Jika berjalan di server Vercel, pindahkan folder storage ke /tmp
        if (isset($_ENV['VERCEL_JOB_ID']) || isset($_SERVER['VERCEL_URL'])) {
            $this->app->useStoragePath('/tmp/storage');
            
            // Buat folder yang dibutuhkan jika belum ada
            if (!is_dir('/tmp/storage/framework/views')) {
                mkdir('/tmp/storage/framework/views', 0755, true);
            }
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
