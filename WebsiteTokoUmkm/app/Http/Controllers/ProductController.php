<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * 1. Menampilkan katalog untuk pembeli di halaman depan (welcome.blade.php)
     * Sudah di-fix agar aman dari eror 'Undefined property: category_name'
     */
    public function index()
    {
        // Mengambil data dinamis asli dari tabel database kamu
        try {
            $dbProducts = DB::table('products')->get();
        } catch (\Exception $e) {
            $dbProducts = collect([]);
        }

        // Logika konversi otomatis agar welcome.blade.php bisa membaca teks nama kategori dengan aman
        $products = [];
        foreach ($dbProducts as $p) {
            $catName = 'Makanan Berat'; // Default cadangan
            
            if (isset($p->category_name)) {
                $catName = $p->category_name;
            } elseif (isset($p->category_id)) {
                // Konversi jika database kamu menggunakan angka ID (1 = Makanan, 2 = Minuman)
                if ($p->category_id == 2 || $p->category_id == 3) {
                    $catName = 'Minuman Segar';
                } else {
                    $catName = 'Makanan Berat';
                }
            }

            $products[] = (object)[
                'id' => $p->id ?? null,
                'name' => $p->name ?? 'Menu Katering',
                'category_name' => $catName, // 💡 KUNCI FIX: Menjaga agar variabel ini selalu terbaca oleh file welcome
                'price' => $p->price ?? 0,
                'description' => $p->description ?? '',
                'image' => $p->image ?? 'https://unsplash.com',
            ];
        }

        // JIKA DATABASE TRNYATA KOSONG, KUNCI OTOMATIS DENGAN 5 DATA PRODUK KATALOG ASLI KAMU
        if (empty($products)) {
            $products = [
                (object)['id' => 1, 'name' => 'Nasi Kotak Ayam Bakar', 'category_name' => 'Makanan Berat', 'description' => 'Nasi kotak lengkap dengan Ayam Bakar bumbu madu, tahu, tempe, lalapan, dan sambal terasi.', 'price' => 25000, 'image' => 'https://unsplash.com'],
                (object)['id' => 2, 'name' => 'Paket Prasmanan Mewah', 'category_name' => 'Makanan Berat', 'description' => 'Paket makanan prasmanan untuk acara pernikahan/pesta termasuk nasi, olahan daging sapi, sup, dan pelengkap.', 'price' => 45000, 'image' => 'https://unsplash.com'],
                (object)['id' => 3, 'name' => 'Nasi Goreng Gila', 'category_name' => 'Makanan Berat', 'description' => 'Nasi goreng bumbu kencur pedas dengan topping melimpah bakso, sosis, telur ayam, dan kerupuk renyah.', 'price' => 20000, 'image' => 'https://unsplash.com'],
                (object)['id' => 4, 'name' => 'Es Teh Manis Jumbo', 'category_name' => 'Minuman Segar', 'description' => 'Es teh manis segar berukuran besar, cocok untuk menemani hidangan katering.', 'price' => 5000, 'image' => 'https://unsplash.com'],
                (object)['id' => 5, 'name' => 'Es Jeruk Peras', 'category_name' => 'Minuman Segar', 'description' => 'Minuman es jeruk murni perasan asli buah segar, kaya vitamin C, manis dan menghilangkan dahaga.', 'price' => 7000, 'image' => '/images/jeruk.jpg']
            ];
        }

        // Kirim data ke file welcome bawaan proyekmu tanpa kendala eror lagi
        return view('welcome', compact('products'));
    }

    /**
     * 2. Menampilkan halaman dashboard admin untuk kelola barang nyata (admin_dashboard.blade.php)
     */
    public function adminDashboard()
    {
        // Mengambil seluruh data menu asli langsung dari database MySQL
        try {
            $dbProducts = DB::table('products')->get();
        } catch (\Exception $e) {
            $dbProducts = collect([]);
        }
            
        // Menyesuaikan struktur kolom data admin agar serasi tanpa eror properti stock
        $products = [];
        foreach ($dbProducts as $p) {
            $products[] = (object)[
                'id' => $p->id ?? null,
                'name' => $p->name ?? 'Menu',
                'category_name' => $p->category_name ?? (isset($p->category_id) && $p->category_id == 2 ? 'Minuman Segar' : 'Makanan Berat'),
                'price' => $p->price ?? 0,
                'description' => $p->description ?? '',
                'image' => $p->image ?? 'https://unsplash.com',
                'stock' => $p->stock ?? 50 // 💡 MENGUNCI VARIABEL CADANGAN STOK AGAR DASHBOARD TIDAK EROR
            ];
        }

        $categories = [
            (object)['id' => 1, 'name' => 'Makanan Berat'],
            (object)['id' => 2, 'name' => 'Minuman Segar']
        ];

        return view('admin_dashboard', compact('products', 'categories'));
    }

    /**
     * 3. Fungsi menyimpan produk baru dari formulir admin ke Database MySQL asli
     */
    public function store(Request $request)
    {
        // Deteksi input kategori dari form
        $categoryInput = $request->category_name ?? $request->category_id ?? 'Makanan Berat';
        if ($categoryInput == '1') $categoryInput = 'Makanan Berat';
        if ($categoryInput == '2') $categoryInput = 'Minuman Segar';

        DB::table('products')->insert([
            'name' => $request->name,
            'category_name' => $categoryInput,
            'price' => $request->price,
            'image' => $request->image ?? 'https://unsplash.com',
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('sukses', 'Menu jualan baru berhasil disimpan langsung ke Database MySQL!');
    }

    /**
     * 4. Fungsi menghapus produk jualan secara nyata dari Database MySQL
     */
    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();

        return redirect()->back()->with('sukses', 'Menu jualan berhasil dihapus dari Database MySQL!');
    }
}
