<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    // DATA ASLI DARI LAPTOP LOKAL KAMU (Sudah disamakan 100%)
    $products = [
        (object)[
            'name' => 'Nasi Kotak Ayam Bakar',
            'category_name' => 'Makanan Berat',
            'description' => 'Nasi kotak lengkap dengan Ayam Bakar bumbu madu, tahu, tempe, lalapan, dan sambal terasi.',
            'price' => 25000,
            'image' => 'https://unsplash.com' // Foto nasi kotak lezat
        ],
        (object)[
            'name' => 'Paket Prasmanan Mewah',
            'category_name' => 'Makanan Berat',
            'description' => 'Paket makanan prasmanan untuk acara pernikahan/pesta termasuk nasi, olahan daging sapi, sup, dan pelengkap.',
            'price' => 45000,
            'image' => 'https://unsplash.com' // Foto prasmanan mewah
        ],
        (object)[
            'name' => 'Es Teh Manis Jumbo',
            'category_name' => 'Minuman Segar',
            'description' => 'Es teh manis segar berukuran besar, cocok untuk menemani hidangan katering.',
            'price' => 5000,
            'image' => 'https://unsplash.com' // Foto es teh segar
        ]
    ];

    // Menyusun teks HTML dan memperbaiki Link CDN CSS biar gemboknya jebol dan rapi
    $html = '
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dandi Catering & UMKM</title>
        
        <!-- LINK BOOTSTRAP CDN YANG BENAR (MEMPERBAIKI LINK REKSA SEBELUMNYA) -->
        <link href="https://jsdelivr.net" rel="stylesheet">
        
        <style>
            /* CSS Kustom Penyelamat Gaya Layout Lokal */
            body { background-color: #f8f9fa; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; }
            nav { background-color: #ffffff; padding: 15px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
            .brand { font-size: 24px; font-weight: bold; color: #333; text-decoration: none; }
            
            .banner { 
                background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url("https://unsplash.com"); 
                background-size: cover; 
                background-position: center; 
                color: white; 
                padding: 60px 20px; 
                border-radius: 12px; 
                margin-top: 20px; 
                margin-bottom: 40px; 
                text-align: center; 
            }
            
            /* MEMAKSA GRID BERJEJER KESAMPING TIGA KOTAK SEPERTI DI LOKAL */
            .grid { 
                display: grid; 
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
                gap: 30px; 
                margin-bottom: 50px;
            }
            
            .card { border: none; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); background: white; display: flex; flex-direction: column; }
            .card:hover { transform: translateY(-5px); transition: transform 0.3s; }
            .card-body { padding: 20px; display: flex; flex-direction: column; flex-grow: 1; }
            
            .badge { background-color: #0d6efd; color: white; padding: 6px 12px; border-radius: 6px; font-size: 12px; display: inline-block; margin-bottom: 10px; width: fit-content; font-weight: bold; }
            /* Khusus kategori minuman warna hijau segar */
            .badge-minuman { background-color: #198754; }
            
            .card-title { font-size: 20px; font-weight: bold; color: #222; margin-bottom: 10px; }
            .card-text { font-size: 14px; color: #666; margin-bottom: 15px; line-height: 1.6; flex-grow: 1; }
            .price { font-size: 22px; font-weight: bold; color: #dc3545; margin-bottom: 15px; }
            
            .btn-wa { background-color: #198754; color: white; border-radius: 8px; font-weight: bold; text-align: center; text-decoration: none; padding: 12px; display: block; font-size: 15px; box-shadow: 0 4px 10px rgba(25, 135, 84, 0.2); }
            .btn-wa:hover { background-color: #157347; color: white; }
            footer { text-align: center; margin-top: 60px; padding: 25px; color: #777; font-size: 14px; border-top: 1px solid #ddd; background-color: white; }
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
                    
                    // Cek warna badge berdasarkan nama kategori
                    $badgeClass = ($product->category_name == 'Minuman Segar') ? 'badge badge-minuman' : 'badge';

                    $html .= '
                    <div class="card">
                        <img src="' . $product->image . '" alt="' . $product->name . '" style="width: 100%; height: 210px; object-fit: cover;">
                        <div class="card-body">
                            <span class="' . $badgeClass . '">' . $product->category_name . '</span>
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
