<?php

/*

|--------------------------------------------------------------------------
| Custom Application untuk Vercel (Perbaikan Jalur Cache)
|--------------------------------------------------------------------------
*/
class VercelApplication extends Illuminate\Foundation\Application {
    public function bootstrapPath($path = '') {
        if (isset($_ENV['VERCEL_URL']) || isset($_SERVER['VERCEL_URL'])) {
            return '/tmp/bootstrap'.($path ? DIRECTORY_SEPARATOR.$path : '');
        }
        return parent::bootstrapPath($path);
    }
}

// Membuat folder cache yang benar di memori sementara
if (isset($_ENV['VERCEL_URL']) || isset($_SERVER['VERCEL_URL'])) {
    if (!is_dir('/tmp/bootstrap/cache')) {
        mkdir('/tmp/bootstrap/cache', 0755, true);
    }
}

$app = new VercelApplication(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*

|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
*/
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

return $app;
