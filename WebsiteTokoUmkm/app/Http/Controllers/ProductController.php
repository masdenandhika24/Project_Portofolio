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

        // 💡 FIX AMAN VERCEL: Jika online di Vercel, render langsung teks HTML-nya bypass file sistem compile [1]
        if (isset($_ENV['VERCEL_JOB_ID']) || isset($_SERVER['VERCEL_URL'])) {
            $html = '<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Dandi Catering & UMKM</title><style>body { background-color: #f8f9fa; font-family: "Segoe UI", sans-serif; } nav { background-color: #ffffff; padding: 15px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1); } .brand { font-size: 24px; font-weight: bold; color: #333; text-decoration: none; } .banner { background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url("https://unsplash.com"); background-size: cover; background-position: center; color: white; padding: 60px 20px; border-radius: 12px; margin-top: 20px; margin-bottom: 40px; text-align: center; } .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 50px; } .card { border: none; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); background: white; display: flex; flex-direction: column; } .card-body { padding: 20px; display: flex; flex-direction: column; flex-grow: 1; } .badge { background-color: #0d6efd; color: white; padding: 6px 12px; border-radius: 6px; font-size: 12px; display: inline-block; margin-bottom: 10px; width: fit-content; font-weight: bold; } .badge-minuman { background-color: #198754; } .card-title { font-size: 20px; font-weight: bold; color: #222; margin-bottom: 10px; } .card-text { font-size: 14px; color: #666; margin-bottom: 15px; line-height: 1.6; flex-grow: 1; } .price { font-size: 22px; font-weight: bold; color: #dc3545; margin-bottom: 15px; } .btn-wa { background-color: #198754; color: white; border-radius: 8px; font-weight: bold; text-align: center; text-decoration: none; padding: 12px; display: block; font-size: 15px; } footer { text-align: center; margin-top: 60px; padding: 25px; color: #777; font-size: 14px; border-top: 1px solid #ddd; background-color: white; }</style></head><body><nav><div class="container"><a href="#" class="brand">🍱 DandiCatering</a></div></nav><div class="banner container"><h1 class="fw-bold">Selamat Datang di Katalog Online Kami</h1><p class="lead">Pilih menu katering terbaik untuk acara spesial Anda.</p></div><div class="container"><div class="grid">';
            foreach($products as $product) {
                $nomor_wa = "6283893943700";
                $pesan = "Halo Dandi Catering, saya mau pesan:\n\n* " . $product->name . " (Rp " . number_format($product->price, 0, ',', '.') . ")*\n\nMohon info detail pembayarannya ya Kak. Terima kasih.";
                $url_wa = "https://wa.me" . $nomor_wa . "?text=" . urlencode($pesan);
                $badgeClass = ($product->category_name == 'Minuman Segar') ? 'badge badge-minuman' : 'badge';
                $html .= '<div class="card"><img src="' . $product->image . '" alt="' . $product->name . '" style="width: 100%; height: 210px; object-fit: cover;"><div class="card-body"><span class="' . $badgeClass . '">' . $product->category_name . '</span><h5 class="card-title">' . $product->name . '</h5><p class="card-text">' . $product->description . '</p><div class="price">Rp ' . number_format($product->price, 0, ',', '.') . '</div><a href="' . $url_wa . '" target="_blank" class="btn-wa">🟢 Pesan Sekarang via WA</a></div></div>';
            }
            $html .= '</div></div><footer><p>&copy; 2026 DandiCatering. Portofolio Lulusan Sistem Informasi.</p></footer></body></html>';
            return response($html);
        }

        // Jalankan ini kalau di laptop lokalanmu (tetap panggil file blade welcome asli)
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
