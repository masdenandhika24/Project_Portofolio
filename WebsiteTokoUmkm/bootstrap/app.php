<?php

/*

|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------

|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is

| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*

|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------

|
| Next, we need to bind some important interfaces into the container so
| that we will be able to resolve them when needed. The kernels serve

| the incoming requests to this application from both the web and CLI.
|
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

/*

|--------------------------------------------------------------------------
| Vercel Custom Patches (Bypass Mutlak Read-Only View)
|--------------------------------------------------------------------------
*/
if (isset($_ENV['VERCEL_JOB_ID']) || isset($_SERVER['VERCEL_URL'])) {
    // 1. Alihkan semua folder storage log dan session utama ke /tmp
    $app->useStoragePath('/tmp/storage');

    // 2. Buat folder views secara fisik di dalam /tmp sebelum dibaca sistem
    if (!is_dir('/tmp/storage/framework/views')) {
        mkdir('/tmp/storage/framework/views', 0755, true);
    }

    // 3. PAKSA sistem konfigurasi Laravel mengalihkan view.compiled ke /tmp (Bypass Hard Cache Vercel)
    $app->booting(function () {
        config([
            'session.driver' => 'cookie',
            'view.compiled' => '/tmp/storage/framework/views'
        ]);
    });
}

/*

|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------

|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances

| from the actual running of the application and sending responses.
|
*/

return $app;
