<?php
header("Content-Type: application/json; charset=UTF-8");
require 'db.php'; // Pastikan koneksi mysqli disiapkan

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
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
        if (empty($input['id']) || empty($input['isi_motivasi'])) {
            echo json_encode([
                "status" => "error", 
                "message" => "Data tidak lengkap. Field wajib diisi: id, isi_motivasi",
                "received_data" => $input,
                "missing_fields" => [
                    "id" => empty($input['id']) ? "kosong" : "ada",
                    "isi_motivasi" => empty($input['isi_motivasi']) ? "kosong" : "ada"
                ]
            ]);
            exit;
        }

        // Pastikan id angka
        if (!is_numeric($input['id'])) {
            echo json_encode([
                "status" => "error", 
                "message" => "ID harus berupa angka"
            ]);
            exit;
        }

        // Cek apakah motivasi dengan ID tersebut ada
        $checkMotivasi = $mysqli->prepare("
            SELECT m.`id`, m.`isi_motivasi`, m.`iduser`, m.`tanggal_input`, u.`nama` as nama_user 
            FROM `motivasi` m 
            LEFT JOIN `user` u ON m.`iduser` = u.`iduser` 
            WHERE m.`id` = ?
        ");
        $checkMotivasi->bind_param("i", $input['id']);
        $checkMotivasi->execute();
        $motivasiResult = $checkMotivasi->get_result();
        
        if ($motivasiResult->num_rows == 0) {
            echo json_encode([
                "status" => "error", 
                "message" => "Motivasi dengan ID " . $input['id'] . " tidak ditemukan"
            ]);
            $checkMotivasi->close();
            exit;
        }
        
        $motivasiData = $motivasiResult->fetch_assoc();
        $checkMotivasi->close();

        // Siapkan variabel untuk bind_param
        $motivasiId = (int)$input['id'];
        $isiMotivasi = htmlspecialchars(trim($input['isi_motivasi']));

        // Query update motivasi
        $stmt = $mysqli->prepare("
            UPDATE `motivasi` 
            SET `isi_motivasi` = ?, `tanggal_update` = CURRENT_TIMESTAMP 
            WHERE `id` = ?
        ");

        $stmt->bind_param("si", 
            $isiMotivasi,  // string
            $motivasiId    // integer
        );

        if ($stmt->execute()) {
            // Cek apakah ada row yang terpengaruh
            if ($stmt->affected_rows > 0) {
                // Ambil data terbaru setelah update
                $getUpdated = $mysqli->prepare("
                    SELECT m.`id`, m.`isi_motivasi`, m.`iduser`, m.`tanggal_input`, m.`tanggal_update`, u.`nama` as nama_user 
                    FROM `motivasi` m 
                    LEFT JOIN `user` u ON m.`iduser` = u.`iduser` 
                    WHERE m.`id` = ?
                ");
                $getUpdated->bind_param("i", $motivasiId);
                $getUpdated->execute();
                $updatedResult = $getUpdated->get_result();
                $updatedData = $updatedResult->fetch_assoc();
                $getUpdated->close();

                echo json_encode([
                    "status" => "success", 
                    "message" => "Motivasi berhasil diupdate",
                    "data" => [
                        "before_update" => [
                            "id" => $motivasiData['id'],
                            "isi_motivasi" => $motivasiData['isi_motivasi'],
                            "iduser" => $motivasiData['iduser'],
                            "nama_user" => $motivasiData['nama_user'],
                            "tanggal_input" => $motivasiData['tanggal_input']
                        ],
                        "after_update" => [
                            "id" => $updatedData['id'],
                            "isi_motivasi" => $updatedData['isi_motivasi'],
                            "iduser" => $updatedData['iduser'],
                            "nama_user" => $updatedData['nama_user'],
                            "tanggal_input" => $updatedData['tanggal_input'],
                            "tanggal_update" => $updatedData['tanggal_update']
                        ],
                        "updated_at" => date('Y-m-d H:i:s')
                    ]
                ]);
            } else {
                echo json_encode([
                    "status" => "error", 
                    "message" => "Tidak ada perubahan data"
                ]);
            }
        } else {
            throw new Exception("Gagal mengeksekusi query update: " . $stmt->error);
        }

        $stmt->close();

    } catch (Exception $e) {
        echo json_encode([
            "status" => "error", 
            "message" => "Gagal mengupdate motivasi: " . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        "status" => "error", 
        "message" => "Method tidak diizinkan, gunakan PUT"
    ]);
}
