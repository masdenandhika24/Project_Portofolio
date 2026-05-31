<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan katalog untuk pembeli (Menggunakan data Array agar bypass database cloud)
    public function index()
    {
        $products = [
            (object)[
                'id' => 1,
                'name' => 'Paket Nasi Kotak Ayam Bakar',
                'category_name' => 'Nasi Kotak',
                'price' => 25000,
                'description' => 'Nasi putih, ayam bakar bumbu rujak, tahu, tempe goreng, lalapan segar, dan sambal terasi.',
                'image' => 'https://unsplash.com'
            ],
            (object)[
                'id' => 2,
                'name' => 'Prasmanan Nikmat Premium',
                'category_name' => 'Prasmanan',
                'price' => 45000,
                'description' => 'Paket prasmanan mewah lengkap untuk acara pernikahan, hajatan, atau ulang tahun.',
                'image' => 'https://unsplash.com'
            ],
            (object)[
                'id' => 3,
                'name' => 'Snack Box Acara Formal',
                'category_name' => 'Kue & Snack',
                'price' => 15000,
                'description' => 'Isi 3 macam kue premium (lemper ayam, sus buah, pastel) ditambah air mineral gelas.',
                'image' => 'https://unsplash.com'
            ]
        ];

        return view('welcome', compact('products'));
    }

    // Menampilkan halaman dashboard admin untuk kelola barang
    public function adminDashboard()
    {
        $products = [
            (object)[
                'id' => 1,
                'name' => 'Paket Nasi Kotak Ayam Bakar',
                'category_name' => 'Nasi Kotak',
                'price' => 25000,
                'description' => 'Nasi putih, ayam bakar bumbu rujak, tahu, tempe goreng, lalapan segar, dan sambal terasi.',
                'image' => 'https://unsplash.com'
            ],
            (object)[
                'id' => 2,
                'name' => 'Prasmanan Nikmat Premium',
                'category_name' => 'Prasmanan',
                'price' => 45000,
                'description' => 'Paket prasmanan mewah lengkap untuk acara pernikahan, hajatan, atau ulang tahun.',
                'image' => 'https://unsplash.com'
            ]
        ];
            
        $categories = [
            (object)['id' => 1, 'name' => 'Nasi Kotak'],
            (object)['id' => 2, 'name' => 'Prasmanan'],
            (object)['id' => 3, 'name' => 'Kue & Snack']
        ];

        return view('admin_dashboard', compact('products', 'categories'));
    }

    // Fungsi menyimpan produk baru dari formulir admin
    public function store(Request $request)
    {
        return redirect()->back()->with('sukses', 'Mode demo aktif: Produk berhasil disimulasikan!');
    }

    // Fungsi menghapus produk jualan
    public function destroy($id)
    {
        return redirect()->back()->with('sukses', 'Mode demo aktif: Produk berhasil dihapus!');
    }
}
