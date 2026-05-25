<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_motivasi = $_POST['id'] ?? ''; 

    if (empty($id_motivasi)) {
        echo json_encode([
            "status" => "error",
            "message" => "ID motivasi tidak ditemukan!"
        ]);
        exit;
    }

    $id_motivasi = intval($id_motivasi);

    // MODUS ADMIN: Langsung hapus berdasarkan ID tanpa peduli siapa pembuatnya!
    $query_delete1 = "DELETE FROM `motivasi` WHERE `id` = $id_motivasi";
    $query_delete2 = "DELETE FROM `motivasi` WHERE `idmotivasi` = $id_motivasi";
    
    // Jalankan query pertama (kolom id)
    $mysqli->query($query_delete1);
    
    if ($mysqli->affected_rows > 0) {
        echo json_encode([
            "status" => "success",
            "message" => "Motivasi user berhasil dihapus!"
        ]);
    } else {
        // Jalankan query kedua (kolom idmotivasi) jika yang pertama tidak merubah data
        $mysqli->query($query_delete2);
        
        if ($mysqli->affected_rows > 0) {
            echo json_encode([
                "status" => "success",
                "message" => "Motivasi user berhasil dihapus!"
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Gagal menghapus. Data sudah tidak ada atau nama kolom salah."
            ]);
        }
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Method tidak diizinkan"
    ]);
}