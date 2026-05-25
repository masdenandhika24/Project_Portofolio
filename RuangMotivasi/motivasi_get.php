<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = mysqli_connect("localhost", "root", "", "vigenesia");

// Kita gunakan 'm.id' karena di tabel motivasi biasanya kolom ID bernama 'id'
// Jika di database kolomnya memang 'id_motivasi', ganti 'm.id' jadi 'm.id_motivasi'
$query = "SELECT m.*, 
          (SELECT COUNT(*) FROM likes WHERE id_motivasi = m.id) as jumlah_like,
          (SELECT COUNT(*) FROM comments WHERE id_motivasi = m.id) as jumlah_komentar 
          FROM motivasi m 
          ORDER BY m.id DESC";

$result = mysqli_query($conn, $query);

if (!$result) {
    // Jika query gagal, kita kirim status error agar JS tidak error "JSON.parse"
    echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $tgl = $row['tanggal'] ?? $row['date_created'] ?? '0000-00-00';
    $row['tanggal_final'] = (strpos($tgl, '0000') !== false || empty($tgl)) ? null : $tgl;
    $data[] = $row;
}

echo json_encode(["status" => "success", "data" => $data]);
?>