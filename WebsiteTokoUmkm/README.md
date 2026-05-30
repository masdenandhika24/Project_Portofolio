# 🍱 DAN-DI: Aplikasi Katalog Katering & Toko UMKM Online

Aplikasi web responsif berbasis **Laravel** yang dirancang khusus untuk memodernisasi bisnis kuliner dan UMKM. Sistem ini mempermudah pelanggan dalam melihat menu paket makanan, melakukan pemesanan instan, serta memberikan akses dashboard manajemen produk bagi pemilik toko secara aman.

---

## ✨ Fitur Utama (Highlight Features)

*   **🔒 Sistem Autentikasi & Middleware**: Dashboard admin diamankan penuh menggunakan sistem login Laravel Session & Middleware, mencegah akses ilegal dari luar.
*   **📸 Manajemen Produk (CRUD)**: Admin dapat menambahkan menu baru, mengunggah foto makanan secara langsung, mengubah harga, serta menghapus data produk secara real-time.
*   **📱 Integrasi WhatsApp Gateway Instan**: Fitur checkout tanpa keranjang otomatis menyusun teks detail pesanan (Nama Paket, Harga, Jumlah) dan langsung mengalihkan pelanggan ke chat WhatsApp Web pemilik toko dalam sekali klik.
*   **⚡ Desain Responsif**: Antarmuka katalog modern yang sangat ringan dan ramah pengguna, nyaman diakses baik melalui HP maupun komputer desktop.

---

## 🛠️ Teknologi yang Digunakan (Tech Stack)

*   **Framework Inti**: Laravel (PHP)
*   **Database**: MySQL / PostgreSQL (Cloud Ready)
*   **Frontend**: HTML5, CSS3, JavaScript, & Tailwind CSS / Bootstrap
*   **Server Gateway**: WhatsApp Cloud API Link Generator

---

## 🚀 Cara Menjalankan Proyek secara Lokal (Local Setup)

Jika Anda ingin mengunduh dan menguji proyek ini di komputer Anda sendiri, ikuti langkah-langkah berikut:

1. **Kloning Repositori**:
   ```bash
   git clone https://github.com
   ```
2. **Masuk ke Direktori Proyek**:
   ```bash
   cd toko-umkm
   ```
3. **Instal Dependensi (Vendor)**:
   ```bash
   composer install
   ```
4. **Konfigurasi Environment**:
   * Salin file `.env.example` menjadi `.env`:
     ```bash
     cp .env.example .env
     ```
   * Atur nama database Anda di bagian `DB_DATABASE=nama_database_anda`.
5. **Generate Security Key**:
   ```bash
   php artisan key:generate
   ```
6. **Migrasi Database**:
   ```bash
   php artisan migrate --seed
   ```
7. **Nyalakan Server Lokal**:
   ```bash
   php artisan serve
   ```
   Akses aplikasi di browser melalui alamat `http://127.0.0.1:8000`.

---

## 👨‍💻 Pengembang (Developer)
*   **Nama**: Masden Andhika
*   **GitHub**: [@masdenandhika24](https://github.com)
*   **Tujuan Proyek**: Portofolio Pengembangan Aplikasi Web & Solusi Digital UMKM.
*
