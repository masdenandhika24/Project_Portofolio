<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dandi Catering & UMKM</title>
    <!-- Membaca file CSS lokal di dalam laptop tanpa butuh internet -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
</head>
<body>

    <nav>
        <div class="container">
            <a href="#" class="brand">🍱 DandiCatering</a>
        </div>
    </nav>

    <div class="banner container">
        <h1>Selamat Datang di Katalog Online Kami</h1>
        <p>Pilih menu katering terbaik untuk acara spesial Anda. Pesanan langsung terhubung ke WhatsApp!</p>
    </div>

    <div class="container">
        <div class="grid">
            
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
            <?php if(str_contains($product->image, 'http')): ?>
    <!-- Jika data lama menggunakan link internet -->
    <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" style="width: 100%; height: 200px; object-fit: cover; border-radius: 6px 6px 0 0;">
<?php else: ?>
    <!-- Jika data baru menggunakan file foto asli hasil upload -->
    <img src="<?php echo e(asset('images/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" style="width: 100%; height: 200px; object-fit: cover; border-radius: 6px 6px 0 0;">
<?php endif; ?>
                <div class="card-body">
                    <span class="badge"><?php echo e($product->category_name); ?></span>
                    <h5 class="card-title"><?php echo e($product->name); ?></h5>
                    <p class="card-text"><?php echo e($product->description); ?></p>
                    <div class="price">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></div>
                    
                    <?php
    $nomor_wa = "6283893943700"; // <-- Ganti dengan nomor WA Anda sendiri (awali angka 62)
    $pesan = "Halo Dandi Catering, saya mau pesan:\n\n"
           . "* " . $product->name . " (Rp " . number_format($product->price, 0, ',', '.') . ")*\n\n"
           . "Mohon info detail pembayarannya ya Kak. Terima kasih.";
           $url_wa = "https://wa.me/" . $nomor_wa . "?text=" . urlencode($pesan);
?>

                    <a href="<?php echo e($url_wa); ?>" target="_blank" class="btn-wa">
                        🟢 Pesan Sekarang via WA
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>

    <footer>
        <p>&copy; 2026 DandiCatering. Portofolio Lulusan Sistem Informasi.</p>
    </footer>

</body>
</html><?php /**PATH C:\xampp\htdocs\toko-umkm\resources\views/welcome.blade.php ENDPATH**/ ?>