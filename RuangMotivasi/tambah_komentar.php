<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = mysqli_connect("localhost", "root", "", "vigenesia");

// Cek apakah data benar-benar diterima
if (!isset($_POST['id_motivasi']) || !isset($_POST['id_user'])) {
    echo json_encode(["status" => "error", "message" => "Data tidak lengkap!"]);
    exit;
}

$id_motivasi = $_POST['id_motivasi'];
$id_user = $_POST['id_user'];
$isi_komentar = $_POST['isi_komentar'];

$query = "INSERT INTO comments (id_motivasi, id_user, isi_komentar) VALUES ('$id_motivasi', '$id_user', '$isi_komentar')";

if (mysqli_query($conn, $query)) {
    echo json_encode(["status" => "success", "message" => "Komentar berhasil dikirim"]);
} else {
    echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
}
?>