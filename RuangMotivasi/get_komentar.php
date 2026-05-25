<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$conn = mysqli_connect("localhost", "root", "", "vigenesia");

// Kita ambil ID-nya
$id_motivasi = isset($_GET['id_motivasi']) ? $_GET['id_motivasi'] : 0;

// Jalankan query
$query = "SELECT * FROM comments WHERE id_motivasi = '$id_motivasi' ORDER BY id ASC";
$result = mysqli_query($conn, $query);

$data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

// KIRIM DATA
echo json_encode(["status" => "success", "data" => $data, "debug_id" => $id_motivasi]);
?>