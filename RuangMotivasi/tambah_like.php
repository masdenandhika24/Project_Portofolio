<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: *");

// --- Koneksi langsung tanpa include ---
$host = "localhost";
$user = "root";
$pass = "";
$db   = "vigenesia"; // GANTI dengan nama database kamu yang sebenarnya

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    echo json_encode(["status" => "error", "message" => "Koneksi database gagal"]);
    exit;
}
// -------------------------------------

$id_motivasi = $_POST['id_motivasi'];
$id_user = $_POST['id_user'];

$query = "INSERT INTO likes (id_motivasi, id_user) VALUES ('$id_motivasi', '$id_user')";

if(mysqli_query($koneksi, $query)) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => mysqli_error($koneksi)]);
}
?>