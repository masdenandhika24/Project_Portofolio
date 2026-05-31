<?php

// Trik Pamungkas: Jika berjalan di Vercel, paksa gunakan database TiDB Cloud
if (isset($_ENV['VERCEL_JOB_ID']) || isset($_SERVER['VERCEL_URL'])) {
    $_ENV['DB_CONNECTION'] = 'mysql';
    $_SERVER['DB_CONNECTION'] = 'mysql';
    
    $_ENV['DB_HOST'] = '47.74.225.19';
    $_SERVER['DB_HOST'] = '47.74.225.19';
    
    $_ENV['DB_PORT'] = '4000';
    $_SERVER['DB_PORT'] = '4000';
    
    $_ENV['DB_DATABASE'] = 'sys';
    $_SERVER['DB_DATABASE'] = 'sys';
    
    $_ENV['DB_USERNAME'] = 'iM3uhC7u7DzZe2I.root';
    $_SERVER['DB_USERNAME'] = 'iM3uhC7u7DzZe2I.root';
    
    $_ENV['DB_PASSWORD'] = 'i43Kby9zcmJv3aJr';
    $_SERVER['DB_PASSWORD'] = 'i43Kby9zcmJv3aJr';
    
    $_ENV['MYSQL_ATTR_SSL_CA'] = 'true';
    $_SERVER['MYSQL_ATTR_SSL_CA'] = 'true';
    
    // Tetap paksa session menggunakan cookie agar tidak Read-Only
    $_ENV['SESSION_DRIVER'] = 'cookie';
    $_SERVER['SESSION_DRIVER'] = 'cookie';
}

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*

|--------------------------------------------------------------------------
| Check If Application Is Under Maintenance
|--------------------------------------------------------------------------
*/

if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
    require __DIR__.'/../storage/framework/maintenance.php';
}

/*

|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/

require __DIR__.'/../vendor/autoload.php';

/*

|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = tap($kernel->handle(
    $request = Request::capture()
))->send();

$kernel->terminate($request, $response);
