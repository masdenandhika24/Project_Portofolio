<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    // Data produk buatan (Bypass database agar Vercel tidak error)
    $products = [
        (object)[
            'name' => 'Paket Nasi Kotak Ayam Bakar',
            'category_name' => 'Nasi Kotak',
            'description' => 'Nasi putih, ayam bakar bumbu rujak, tahu, tempe goreng, lalapan segar, dan sambal terasi matang.',
            'price' => 25000,
            'image' => 'https://unsplash.com'
        ],
        (object)[
            'name' => 'Prasmanan Nikmat Premium',
            'category_name' => 'Prasmanan',
            'description' => 'Paket prasmanan mewah lengkap untuk acara pernikahan, hajatan, atau ulang tahun keluarga.',
            'price' => 45000,
            'image' => 'https://unsplash.com'
        ],
        (object)[
            'name' => 'Snack Box Acara Formal',
            'category_name' => 'Kue & Snack',
            'description' => 'Isi 3 macam kue premium (lemper ayam, sus buah, pastel lezat) ditambah air mineral gelas.',
            'price' => 15000,
            'image' => 'https://unsplash.com'
        ]
    ];

    // Menyusun teks HTML dari kodingan aslimu agar bisa langsung dibaca Vercel tanpa cache Blade
    $html = '
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dandi Catering & UMKM</title>
        <!-- Menggunakan Bootstrap CDN agar CSS langsung aktif online di internet -->
        <link href="https://jsdelivr.net" rel="stylesheet">
        <style>
            body { background-color: #f8f9fa; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; }
            nav { background-color: #ffffff; padding: 15px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
            .brand { font-size: 24px; font-weight: bold; color: #333; text-decoration: none; }
            .banner { background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url("https://unsplash.com"); background-size: cover; background-position: center; color: white; padding: 60px 20px; border-radius: 12px; margin-top: 20px; margin-bottom: 40px; text-align: center; }
            .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px; }
            .card { border: none; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); background: white; transition: transform 0.3s; }
            .card:hover { transform: translateY(-5px); }
            .card-body { padding: 20px; display: flex; flex-column: column; }
            .badge { background-color: #e63946; color: white; padding: 6px 12px; border-radius: 20px; font-size: 12px; display: inline-block; margin-bottom: 10px; width: fit-content; }
            .card-title { font-size: 18px; font-weight: bold; color: #222; margin-bottom: 10px; }
            .card-text { font-size: 14px; color: #666; margin-bottom: 15px; line-height: 1.5; }
            .price { font-size: 20px; font-weight: bold; color: #e63946; margin-bottom: 15px; }
            .btn-wa { background-color: #25D366; color: white; border-radius: 8px; font-weight: bold; text-align: center; text-decoration: none; padding: 10px; display: block; transition: background 0.2s; }
            .btn-wa:hover { background-color: #20ba5a; color: white; }
            footer { text-align: center; margin-top: 60px; padding: 20px; color: #777; font-size: 14px; border-top: 1px solid #ddd; }
        </style>
    </head>
    <body>

        <nav>
            <div class="container">
                <a href="#" class="brand">🍱 DandiCatering</a>
            </div>
        </nav>

        <div class="banner container">
            <h1 class="fw-bold">Selamat Datang di Katalog Online Kami</h1>
            <p class="lead">Pilih menu katering terbaik untuk acara spesial Anda. Pesanan langsung terhubung ke WhatsApp!</p>
        </div>

        <div class="container">
            <div class="grid">';
                
                foreach($products as $product) {
                    $nomor_wa = "6283893943700";
                    $pesan = "Halo Dandi Catering, saya mau pesan:\n\n"
                           . "* " . $product->name . " (Rp " . number_format($product->price, 0, ',', '.') . ")*\n\n"
                           . "Mohon info detail pembayarannya ya Kak. Terima kasih.";
                    $url_wa = "https://wa.me/" . $nomor_wa . "?text=" . urlencode($pesan);

                    $html .= '
                    <div class="card">
                        <img src="' . $product->image . '" alt="' . $product->name . '" style="width: 100%; height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <span class="badge">' . $product->category_name . '</span>
                            <h5 class="card-title">' . $product->name . '</h5>
                            <p class="card-text">' . $product->description . '</p>
                            <div class="price">Rp ' . number_format($product->price, 0, ',', '.') . '</div>
                            <a href="' . $url_wa . '" target="_blank" class="btn-wa">
                                🟢 Pesan Sekarang via WA
                            </a>
                        </div>
                    </div>';
                }

            $html .= '
            </div>
        </div>

        <footer>
            <p>&copy; 2026 DandiCatering. Portofolio Lulusan Sistem Informasi.</p>
        </footer>

    </body>
    </html>';

    return response($html);
});
