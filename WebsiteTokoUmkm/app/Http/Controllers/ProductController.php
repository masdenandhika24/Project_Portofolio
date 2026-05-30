<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Data Produk Katalog Catering & UMKM Dandi langsung dikunci di memori agar anti-error database
        $products = [
            (object)[
                'id' => 1,
                'name' => 'Paket Bento Box Premium',
                'price' => 35000,
                'image' => 'bento.jpg',
                'category_name' => 'Nasi Kotak'
            ],
            (object)[
                'id' => 2,
                'name' => 'Nasi Tumpeng Mini Syukuran',
                'price' => 25000,
                'image' => 'tumpeng.jpg',
                'category_name' => 'Prasmanan'
            ],
            (object)[
                'id' => 3,
                'name' => 'Snack Box Acara Rapat',
                'price' => 15000,
                'image' => 'snack.jpg',
                'category_name' => 'Kue & Snack'
            ]
        ];

        // Langsung kirim data ke halaman utama katalog Anda tanpa menyentuh database yang terkunci
        return view('welcome', compact('products'));
    }
}
