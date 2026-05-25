<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

require 'db.php'; // Menggunakan koneksi database bawaanmu

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Tangkap data dari Form HTML
        $nama = $_POST['nama'] ?? '';
        $profesi = $_POST['profesi'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $role_id = $_POST['role_id'] ?? 2;

        if (empty($nama) || empty($email) || empty($password)) {
            echo json_encode([
                "status" => "error",
                "message" => "Data tidak lengkap! Nama, Email, dan Password wajib diisi."
            ]);
            exit;
        }

        // Amankan input
        $nama = htmlspecialchars(trim($nama));
        $profesi = htmlspecialchars(trim($profesi));
        $email = htmlspecialchars(trim($email));
        
        // Cek apakah kolom password di database kamu menggunakan hash atau teks biasa.
        // Di tugas Vigenesia kuliah, biasanya menggunakan password_hash:
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        // Kita gunakan query INSERT manual yang paling standar dan fleksibel
        // Jika di database kamu nama kolomnya sedikit berbeda, query ini akan mencoba mencocokkannya
        $query = "INSERT INTO `user` (`nama`, `profesi`, `email`, `password`, `role_id`, `is_active`) 
                  VALUES ('$nama', '$profesi', '$email', '$hashed_password', '$role_id', 1)";
                  
        if ($mysqli->query($query)) {
            echo json_encode([
                "status" => "success",
                "message" => "User baru berhasil ditambahkan! Silakan kembali dan klik Login."
            ]);
        } else {
            // Jika gagal karena nama kolom beda, kita coba query alternatif tanpa kolom is_active
            $query_alt = "INSERT INTO `user` (`nama`, `profesi`, `email`, `password`, `role_id`) 
                          VALUES ('$nama', '$profesi', '$email', '$hashed_password', '$role_id')";
            
            if ($mysqli->query($query_alt)) {
                echo json_encode([
                    "status" => "success",
                    "message" => "User baru berhasil ditambahkan (Query Alternatif)!"
                ]);
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" => "Gagal simpan ke database: " . $mysqli->error
                ]);
            }
        }

    } catch (Exception $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Terjadi kesalahan sistem: " . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Method tidak diizinkan, gunakan POST"
    ]);
}