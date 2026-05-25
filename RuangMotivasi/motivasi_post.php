<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iduser = $_POST['iduser'] ?? '';
    $isi_motivasi = $_POST['isi_motivasi'] ?? '';

    // Coba Query paling sederhana dulu (Tanpa kolom tanggal)
    // Jika ini berhasil, berarti masalahnya ada di kolom 'tanggal'
    $sql = "INSERT INTO motivasi (iduser, isi_motivasi) VALUES (?, ?)";
    
    $stmt = $mysqli->prepare($sql);
    
    if (!$stmt) {
        // Ini akan mencetak pesan error yang jelas dari MySQL
        echo json_encode([
            "status" => "error", 
            "message" => "SQL Error: " . $mysqli->error
        ]);
        exit;
    }

    $stmt->bind_param("is", $iduser, $isi_motivasi);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Berhasil!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Execute error: " . $stmt->error]);
    }
    $stmt->close();
}
?>