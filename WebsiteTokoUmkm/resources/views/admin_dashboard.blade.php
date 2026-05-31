<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Kelola Produk</title>
    <!-- Membaca file CSS lokal yang sama agar offline dan rapi -->
    <link href="https://jsdelivr.net" rel="stylesheet">
    <style>
        .form-box { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 30px; border: 1px solid #eee; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; font-weight: bold; margin-bottom: 5px; font-size: 14px; }
        .form-group input, .form-group textarea, .form-group select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn-submit { background: #0d6efd; color: #fff; border: none; padding: 12px 20px; border-radius: 4px; font-weight: bold; cursor: pointer; width: 100%; }
        .btn-danger { background: #dc3545; color: #fff; text-decoration: none; padding: 6px 12px; border-radius: 4px; font-size: 12px; font-weight: bold; border: none; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #eee; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: #f1f3f5; font-weight: bold; }
        .alert-sukses { background-color: #d1e7dd; color: #0f5132; padding: 15px; border-radius: 4px; margin-bottom: 20px; font-weight: bold; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
        <div class="container d-flex justify-content-between align-items-center py-2">
            <a href="#" class="brand text-decoration-none text-dark fs-4 fw-bold">⚙️ Dashboard Admin Katering</a>
            
            <div class="d-flex align-items-center gap-3">
                <a href="{{ url('/') }}" target="_blank" style="text-decoration: none; font-weight: bold; color: #0d6efd;">👁️ Lihat Katalog Live</a>
                
                <!-- Tombol Logout Merah -->
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form-dash').submit();" 
                   class="btn btn-sm btn-danger text-white px-3 fw-bold">
                   Keluar / Logout
                </a>
                <form id="logout-form-dash" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 40px; margin-bottom: 50px;">
        
        <!-- Notifikasi jika berhasil tambah/hapus barang -->
        @if(session('sukses'))
            <div class="alert-sukses">{{ session('sukses') }}</div>
        @endif

        <div class="form-box">
            <h3 style="margin-top:0; margin-bottom:20px; font-weight:bold;">➕ Tambah Menu Jualan Baru</h3>
            
            <!-- Formulir input data terhubung ke fungsi store di Laravel -->
            <form action="{{ url('/admin/tambah') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Produk / Makanan</label>
                    <input type="text" name="name" placeholder="Contoh: Nasi Goreng Gila" required>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="category_name" required>
                        <option value="Makanan Berat">Makanan Berat</option>
                        <option value="Minuman Segar">Minuman Segar</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <input type="number" name="price" placeholder="Contoh: 15000" required>
                </div>
                
                <div class="form-group">
                    <label>URL / Teks Nama Gambar</label>
                    <input type="text" name="image" value="https://unsplash.com" placeholder="Contoh: https://unsplash.com atau /images/jeruk.jpg" required>
                </div>

                <div class="form-group">
                    <label>Deskripsi Menu</label>
                    <textarea name="description" rows="3" placeholder="Jelaskan isi porsi makanan..." required></textarea>
                </div>

                <button type="submit" class="btn-submit">Simpan ke Database</button>
            </form>
        </div>

        <!-- Tabel Daftar Produk yang Ada di Database -->
        <h3 style="margin-bottom:20px; font-weight:bold;">📋 Daftar Produk Saat Ini</h3>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $prod)
                    <tr>
                        <td style="font-weight: bold;">{{ $prod->name }}</td>
                        <td><span class="badge bg-secondary">{{ $prod->category_name }}</span></td>
                        <td style="color: #dc3545; font-weight: bold;">Rp {{ number_format($prod->price, 0, ',', '.') }}</td>
                        <td><span class="text-success fw-bold">● Aktif</span></td>
                        <td>
                            <!-- Tombol Hapus Terhubung ke fungsi destroy di Laravel -->
                            <form action="{{ url('/admin/hapus/'.$prod->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">❌ Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
