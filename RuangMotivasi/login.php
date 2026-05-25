<?php
header("Content-Type: application/json; charset=UTF-8");
require 'db.php'; // Menyambungkan ke database vigenesia

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $input = [];
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        
        // Handling input (sama seperti di user_post.php milikmu)
        if (strpos($contentType, 'application/json') !== false) {
            $rawInput = file_get_contents("php://input");
            $input = json_decode($rawInput, true) ?? [];
        } else {
            $input = $_POST;
            if (empty($input)) {
                $rawInput = file_get_contents("php://input");
                parse_str($rawInput, $input);
            }
        }

        // Validasi input wajib
        if (empty($input['email']) || empty($input['password'])) {
            echo json_encode([
                "status" => "error", 
                "message" => "Data tidak lengkap. Email dan password wajib diisi"
            ]);
            exit;
        }

        $email = htmlspecialchars(trim($input['email']));
        $password = $input['password'];

        // Cek apakah user dengan email tersebut ada di database
        $stmt = $mysqli->prepare("SELECT `iduser`, `nama`, `profesi`, `password`, `role_id`, `is_active` FROM `user` WHERE `email` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Cek apakah status user aktif
            if ((int)$user['is_active'] !== 1) {
                echo json_encode([
                    "status" => "error",
                    "message" => "Akun Anda ditangguhkan atau tidak aktif"
                ]);
                exit;
            }
            
            // Verifikasi password yang diinput dengan password hash di database
            if (password_verify($password, $user['password'])) {
                // Login Berhasil
                echo json_encode([
                    "status" => "success", 
                    "message" => "Selamat datang kembali, " . $user['nama'],
                    "data" => [
                        "iduser" => $user['iduser'],
                        "nama" => $user['nama'],
                        "profesi" => $user['profesi'],
                        "role_id" => $user['role_id']
                    ]
                ]);
            } else {
                // Password salah
                echo json_encode([
                    "status" => "error", 
                    "message" => "Password yang Anda masukkan salah"
                ]);
            }
        } else {
            // Email tidak ditemukan
            echo json_encode([
                "status" => "error", 
                "message" => "Email tidak terdaftar"
            ]);
        }

        $stmt->close();

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