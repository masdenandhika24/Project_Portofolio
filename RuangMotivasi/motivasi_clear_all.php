<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

require 'db.php';

// PERINGATAN: Query ini akan menghapus SELURUH isi data di tabel motivasi!
$query = "TRUNCATE TABLE `motivasi`";

if ($mysqli->query($query)) {
    echo json_encode([
        "status" => "success",
        "message" => "Sukses besar! Seluruh linimasa motivasi telah dibersihkan sampai kosong."
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Gagal mengosongkan linimasa: " . $mysqli->error
    ]);
}