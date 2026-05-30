<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Data Produk Katalog dengan LINK GAMBAR ONLINE asli agar langsung muncul di Vercel
        $products = [
            (object)[
                'id' => 1,
                'name' => 'Paket Bento Box Premium',
                'description' => 'Paket nasi bento lengkap dengan ayam teriyaki, salad segar, dan gorengan khas Jepang.',
                'price' => 35000,
                'image' => 'https://unsplash.com', // Link gambar bento sehat
                'category_name' => 'Nasi Kotak'
            ],
            (object)[
                'id' => 2,
                'name' => 'Nasi Tumpeng Mini Syukuran',
                'description' => 'Nasi tumpeng mini porsi personal dengan lauk ayam bumbu bali, mi goreng, perkedel, dan sambal.',
                'price' => 25000,
                'image' => 'https://unsplash.com', // Link gambar nasi kuning/tumpeng
                'category_name' => 'Prasmanan'
            ],
            (object)[
                'id' => 3,
                'name' => 'Snack Box Acara Rapat',
                'description' => 'Kotak kue premium isi 3 macam kue (asin & manis) ditambah air mineral gelas untuk rapat.',
                'price' => 15000,
                'image' => 'https://unsplash.com', // Link gambar kue/snack manis
                'category_name' => 'Kue & Snack'
            ]
        ];

        return view('welcome', compact('products'));
    }
}
