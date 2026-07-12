<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dandi Catering & UMKM</title>
    <!-- Membaca file CSS lokal di dalam laptop tanpa butuh internet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<!-- MENGGUNAKAN LATAR BELAKANG ABU-ABU MUDA CERAH (#f4f6f9) -->
<body style="background-color: #f4f6f9; margin: 0; padding: 0;">

    <nav>
        <div class="container">
        <a href="#" class="brand" style="text-decoration: none; font-family: 'Poppins', 'Segoe UI', sans-serif; font-weight: 800; font-size: 24px; letter-spacing: -0.5px;">
    <span style="margin-right: 5px;">🍱</span>
    <span style="color: #dc3545;">Mas</span><span style="color: #198754;">Den</span>
</a>
        </div>
    </nav>

    <div class="banner container">
        <h1>Selamat Datang di Katalog Online Kami</h1>
        <p>Pilih menu katering terbaik untuk acara spesial Anda. Pesanan langsung terhubung ke WhatsApp!</p>
    </div>

    <div class="container">
        <div class="grid">
            
            @foreach($products as $product)
            <div class="card">
            @if(str_contains($product->image, 'http'))
    <!-- Jika data lama menggunakan link internet -->
    <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 6px 6px 0 0;">
@else
    <!-- Jika data baru menggunakan file foto asli hasil upload -->
    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 6px 6px 0 0;">
@endif
                <div class="card-body">
                    <span class="badge">{{ $product->category_name }}</span>
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    
                    <!-- JARAK DAN WARNA HIJAU PADA HIGHLIGHT HARGA -->
                    <div class="price" style="margin-bottom: 15px;">
                        <span style="background-color: #d1e7dd; color: #0f5132; padding: 4px 10px; border-radius: 6px; font-weight: bold;">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                    </div>
                    
                    @php
    $nomor_wa = "6283893943700"; // <-- Ganti dengan nomor WA Anda sendiri (awali angka 62)
    $pesan = "Halo Dandi Catering, saya mau pesan:\n\n"
           . "* " . $product->name . " (Rp " . number_format($product->price, 0, ',', '.') . ")*\n\n"
           . "Mohon info detail pembayarannya ya Kak. Terima kasih.";
           $url_wa = "https://wa.me" . $nomor_wa . "?text=" . urlencode($pesan);
@endphp

                    <a href="{{ $url_wa }}" target="_blank" class="btn-wa">
                        🟢 Pesan Sekarang via WA
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <footer>
        <p>&copy; 2026 DandiCatering. Portofolio Lulusan Sistem Informasi.</p>
    </footer>

</body>
</html>
