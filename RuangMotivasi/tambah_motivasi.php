<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: *");

$host = "localhost";
$user = "root";
$pass = "";
$db   = "vigenesia"; 

$koneksi = mysqli_connect($host, $user, $pass, $db);

if(isset($_POST['id_user']) && isset($_POST['isi_motivasi'])){
    $id_user = $_POST['id_user']; // Ini variabel dari JS
    $isi = $_POST['isi_motivasi'];

    // GANTI menjadi 'iduser' sesuai kolom database kamu
    $query = "INSERT INTO motivasi (iduser, isi_motivasi) VALUES ('$id_user', '$isi')";
    
    if(mysqli_query($koneksi, $query)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($koneksi)]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Data tidak lengkap"]);
}
?>