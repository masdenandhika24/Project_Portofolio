<?php
$host = "localhost";  // ganti sesuai server
$user = "root";       // user MySQL
$pass = "";           // password MySQL
$db   = "vigenesia"; // ganti dengan nama DB kamu

try {
    $mysqli = new mysqli($host, $user, $pass, $db);
    
    // Cek koneksi
    if ($mysqli->connect_error) {
        throw new Exception("Koneksi gagal: " . $mysqli->connect_error);
    }
    
    // Set charset
    $mysqli->set_charset("utf8");
    
    // Pesan sukses jika koneksi berhasil
    
    
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    exit;
}
