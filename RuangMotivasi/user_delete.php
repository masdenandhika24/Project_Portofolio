<?php
header("Content-Type: application/json; charset=UTF-8");
require 'db.php'; // Pastikan koneksi mysqli disiapkan

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    try {
        $input = [];
        
        // Cek content type
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        
        if (strpos($contentType, 'application/json') !== false) {
            // Handle JSON input
            $rawInput = file_get_contents("php://input");
            
            if (empty($rawInput)) {
                echo json_encode([
                    "status" => "error", 
                    "message" => "Request body kosong"
                ]);
                exit;
            }
            
            $input = json_decode($rawInput, true);
            if ($input === null) {
                echo json_encode([
                    "status" => "error", 
                    "message" => "JSON tidak valid: " . json_last_error_msg()
                ]);
                exit;
            }
            
        } elseif (strpos($contentType, 'application/x-www-form-urlencoded') !== false || 
                  strpos($contentType, 'multipart/form-data') !== false) {
            // Handle form data
            $input = $_POST;
            
            // Jika kosong, coba ambil dari raw input
            if (empty($input)) {
                $rawInput = file_get_contents("php://input");
                parse_str($rawInput, $input);
            }
            
        } else {
            // Default: coba ambil dari raw input dan parse
            $rawInput = file_get_contents("php://input");
            if (!empty($rawInput)) {
                parse_str($rawInput, $input);
            }
        }
        
        // Debug: cek input yang diterima
        error_log("Content-Type: " . $contentType);
        error_log("Input received: " . print_r($input, true));
        
        // Cek apakah input kosong
        if (empty($input)) {
            echo json_encode([
                "status" => "error", 
                "message" => "Tidak ada data yang diterima",
                "debug_info" => [
                    "content_type" => $contentType,
                    "content_length" => $_SERVER['CONTENT_LENGTH'] ?? 'tidak ada'
                ]
            ]);
            exit;
        }

        // Cek apakah semua data wajib ada
        if (empty($input['iduser'])) {
            echo json_encode([
                "status" => "error", 
                "message" => "Data tidak lengkap. Field wajib diisi: iduser",
                "received_data" => $input,
                "missing_fields" => [
                    "iduser" => empty($input['iduser']) ? "kosong" : "ada"
                ]
            ]);
            exit;
        }

        // Pastikan iduser angka
        if (!is_numeric($input['iduser'])) {
            echo json_encode([
                "status" => "error", 
                "message" => "iduser harus berupa angka"
            ]);
            exit;
        }

        // Cek apakah user dengan iduser tersebut ada
        $checkUser = $mysqli->prepare("
            SELECT `iduser`, `nama`, `profesi`, `email`, `role_id`, `is_active` 
            FROM `user` 
            WHERE `iduser` = ?
        ");
        $checkUser->bind_param("i", $input['iduser']);
        $checkUser->execute();
        $userResult = $checkUser->get_result();
        
        if ($userResult->num_rows == 0) {
            echo json_encode([
                "status" => "error", 
                "message" => "User dengan ID " . $input['iduser'] . " tidak ditemukan"
            ]);
            $checkUser->close();
            exit;
        }
        
        $userData = $userResult->fetch_assoc();
        $checkUser->close();

        // Cek apakah user memiliki motivasi
        $checkMotivasi = $mysqli->prepare("SELECT COUNT(*) as total FROM `motivasi` WHERE `iduser` = ?");
        $checkMotivasi->bind_param("i", $input['iduser']);
        $checkMotivasi->execute();
        $motivasiResult = $checkMotivasi->get_result();
        $totalMotivasi = $motivasiResult->fetch_assoc()['total'];
        $checkMotivasi->close();

        // Siapkan variabel untuk bind_param
        $userId = (int)$input['iduser'];

        // Mulai transaction untuk memastikan data consistency
        $mysqli->begin_transaction();

        try {
            // Hapus semua motivasi user terlebih dahulu (cascade delete)
            if ($totalMotivasi > 0) {
                $deleteMotivasi = $mysqli->prepare("DELETE FROM `motivasi` WHERE `iduser` = ?");
                $deleteMotivasi->bind_param("i", $userId);
                $deleteMotivasi->execute();
                $deleteMotivasi->close();
            }

            // Hapus user
            $stmt = $mysqli->prepare("DELETE FROM `user` WHERE `iduser` = ?");
            $stmt->bind_param("i", $userId);

            if ($stmt->execute()) {
                // Cek apakah ada row yang terpengaruh
                if ($stmt->affected_rows > 0) {
                    // Commit transaction
                    $mysqli->commit();

                    echo json_encode([
                        "status" => "success", 
                        "message" => "User berhasil dihapus",
                        "data" => [
                            "iduser" => $userId,
                            "nama" => $userData['nama'],
                            "profesi" => $userData['profesi'],
                            "email" => $userData['email'],
                            "role_id" => $userData['role_id'],
                            "is_active" => $userData['is_active'],
                            "total_motivasi_dihapus" => (int)$totalMotivasi,
                            "deleted_at" => date('Y-m-d H:i:s')
                        ]
                    ]);
                } else {
                    throw new Exception("Tidak ada data user yang dihapus");
                }
            } else {
                throw new Exception("Gagal mengeksekusi query delete user: " . $stmt->error);
            }

            $stmt->close();

        } catch (Exception $e) {
            // Rollback transaction jika ada error
            $mysqli->rollback();
            throw $e;
        }

    } catch (Exception $e) {
        echo json_encode([
            "status" => "error", 
            "message" => "Gagal menghapus user: " . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        "status" => "error", 
        "message" => "Method tidak diizinkan, gunakan DELETE"
    ]);
}
