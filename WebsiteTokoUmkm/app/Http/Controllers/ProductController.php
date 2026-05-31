<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Menampilkan katalog untuk pembeli
    public function index()
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->get();

        return view('welcome', compact('products'));
    }

    // Menampilkan halaman dashboard admin untuk kelola barang
    public function adminDashboard()
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->get();
            
        $categories = DB::table('categories')->get();

        return view('admin_dashboard', compact('products', 'categories'));
    }

    // Fungsi menyimpan produk baru dari formulir admin
    public function store(Request $request)
    {
        // Menyimpan file gambar asli ke folder 'public/images' di laptop Anda
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        // Memasukkan data teks dan nama file gambar ke database
        DB::table('products')->insert([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imageName, // Menyimpan nama file gambarnya saja
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->back()->with('sukses', 'Produk dan foto berhasil ditambahkan!');
    }
    // Fungsi menghapus produk jualan
    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->back()->with('sukses', 'Produk berhasil dihapus!');
    }
}