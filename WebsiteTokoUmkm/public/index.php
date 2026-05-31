<?php

// Trik Pamungkas: Paksa alihkan view compiled path ke /tmp agar bebas dari Read-Only Vercel
if (isset($_ENV['VERCEL_JOB_ID']) || isset($_SERVER['VERCEL_URL'])) {
    $_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
    $_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
    
    // Pastikan foldernya terbuat otomatis
    if (!is_dir('/tmp/storage/framework/views')) {
        mkdir('/tmp/storage/framework/views', 0755, true);
    }
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

// Paksa timpa config view secara langsung sesaat setelah app dimuat
if (isset($_ENV['VERCEL_JOB_ID']) || isset($_SERVER['VERCEL_URL'])) {
    config(['view.compiled' => '/tmp/storage/framework/views']);
}

$kernel = $app->make(Kernel::class);

$response = tap($kernel->handle(
    $request = Request::capture()
))->send();

$kernel->terminate($request, $response);
