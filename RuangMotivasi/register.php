<?php
header("Content-Type: application/json; charset=UTF-8");
require 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST;
    // Jika data dikirim sebagai JSON
    if (empty($input)) {
        $input = json_decode(file_get_contents("php://input"), true);
    }

    $nama = htmlspecialchars(trim($input['nama'] ?? ''));
    $email = htmlspecialchars(trim($input['email'] ?? ''));
    $password = $input['password'] ?? '';

    // Validasi dasar
    if (empty($nama) || empty($email) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Semua kolom wajib diisi"]);
        exit;
    }

    // Hash password agar aman
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah email sudah terpakai
    $checkEmail = $mysqli->prepare("SELECT iduser FROM user WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    if ($checkEmail->get_result()->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Email sudah terdaftar"]);
        exit;
    }

    // Insert user baru
    // Asumsi: role_id=2 (user biasa) dan is_active=1 (aktif)
    $stmt = $mysqli->prepare("INSERT INTO user (nama, email, password, role_id, is_active) VALUES (?, ?, ?, 2, 1)");
    $stmt->bind_param("sss", $nama, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Akun berhasil dibuat! Silakan login."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal membuat akun"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Method tidak diizinkan"]);
}
?>