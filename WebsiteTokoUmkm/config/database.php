<?php

use Illuminate\Support\Str;

// Cek apakah sedang berjalan di Vercel atau tidak
$isVercel = isset($_ENV['VERCEL_JOB_ID']) || isset($_SERVER['VERCEL_URL']);

return [

    /*

    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------

    | MEMILIH JALUR KONEKSI SECARA OTOMATIS TANPA MEMBACA ENV SYSTEM VERCEL
    */

    'default' => $isVercel ? 'mysql_vercel' : env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections

    |--------------------------------------------------------------------------
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        // KONEKSI KHUSUS LAPTOP LOKAL KAMU (XAMPP)
        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA') === 'true' ? true : env('MYSQL_ATTR_SSL_CA'),
                PDO::ATTR_TIMEOUT => 30,
            ]) : [],
        ],

        // KONEKSI YANG DIPAKSA KUNCI KHUSUS UNTUK SERVER VERCEL (TIDB CLOUD)
        'mysql_vercel' => [
            'driver' => 'mysql',
            'host' => 'gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com',
            'port' => '4000',
            'database' => 'db_toko_umkm',
            'username' => 'iM3uhC7u7DzZe2I.root',
            'password' => 'i43Kby9zcmJv3aJr',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? [
                PDO::MYSQL_ATTR_SSL_CA => true,
                PDO::ATTR_TIMEOUT => 30,
            ] : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table

    |--------------------------------------------------------------------------
    |
    */

    'migrations' => 'migrations',

    /*

    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    */

    'redis' => [
        'client' => env('REDIS_CLIENT', 'phpredis'),
        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],
        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],
    ],

];
