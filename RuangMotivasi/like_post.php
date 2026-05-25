<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_motivasi = $_POST['id_motivasi'] ?? '';
    $id_user = $_POST['id_user'] ?? '';

    if (empty($id_motivasi) || empty($id_user)) {
        echo json_encode(["status" => "error", "message" => "Data tidak lengkap"]);
        exit;
    }

    // Cek apakah sudah pernah like sebelumnya
    $sql_cek = "SELECT * FROM likes WHERE id_motivasi = ? AND id_user = ?";
    $stmt_cek = $mysqli->prepare($sql_cek);
    $stmt_cek->bind_param("ii", $id_motivasi, $id_user);
    $stmt_cek->execute();
    $result = $stmt_cek->get_result();

    if ($result->num_rows > 0) {
        // Jika sudah like, maka UNLIKE (Hapus)
        $sql_del = "DELETE FROM likes WHERE id_motivasi = ? AND id_user = ?";
        $stmt_del = $mysqli->prepare($sql_del);
        $stmt_del->bind_param("ii", $id_motivasi, $id_user);
        $stmt_del->execute();
        echo json_encode(["status" => "success", "message" => "Unliked"]);
    } else {
        // Jika belum, maka LIKE (Tambah)
        $sql_ins = "INSERT INTO likes (id_motivasi, id_user) VALUES (?, ?)";
        $stmt_ins = $mysqli->prepare($sql_ins);
        $stmt_ins->bind_param("ii", $id_motivasi, $id_user);
        $stmt_ins->execute();
        echo json_encode(["status" => "success", "message" => "Liked"]);
    }
}
?>