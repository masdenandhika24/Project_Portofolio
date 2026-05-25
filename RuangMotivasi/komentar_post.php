<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$conn = mysqli_connect("localhost", "root", "", "vigenesia");

$id_motivasi = $_POST['id_motivasi'];
$id_user = $_POST['id_user'];
$isi_komentar = $_POST['isi_komentar'];

// Ganti nama tabel jadi 'comments'
$query = "INSERT INTO comments (id_motivasi, id_user, isi_komentar) VALUES ('$id_motivasi', '$id_user', '$isi_komentar')";

if(mysqli_query($conn, $query)){
    echo json_encode(["status" => "success", "message" => "Komentar terkirim!"]);
} else {
    // Menampilkan error database jika ada kesalahan nama kolom
    echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
}
?>