<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // 1. Isi Data Kategori Contoh
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Makanan Berat',
                'slug' => 'makanan-berat',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'Minuman Segar',
                'slug' => 'minuman-segar',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // 2. Isi Data Produk Contoh
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'name' => 'Nasi Kotak Ayam Bakar',
                'description' => 'Nasi kotak lengkap dengan Ayam Bakar bumbu madu, tahu, tempe, lalapan, dan sambal terasi.',
                'price' => 25000,
                'stock' => 50,
                'image' => 'nasi-ayam-bakar.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 1,
                'name' => 'Paket Prasmanan Mewah',
                'description' => 'Paket makanan prasmanan untuk acara pernikahan/pesta termasuk nasi, olahan daging sapi, sup, dan pelengkap.',
                'price' => 45000,
                'stock' => 200,
                'image' => 'prasmanan-mewah.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 2,
                'name' => 'Es Teh Manis Jumbo',
                'description' => 'Es teh manis segar berukuran besar, cocok untuk menemani hidangan katering.',
                'price' => 5000,
                'stock' => 100,
                'image' => 'es-teh-jumbo.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}