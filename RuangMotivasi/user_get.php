<?php
header("Content-Type: application/json; charset=UTF-8");
require 'db.php'; // Pastikan koneksi mysqli disiapkan

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        // Ambil parameter query dari URL
        $nama = $_GET['nama'] ?? '';
        $profesi = $_GET['profesi'] ?? '';
        $email = $_GET['email'] ?? '';
        $role_id = $_GET['role_id'] ?? '';
        $is_active = $_GET['is_active'] ?? '';
        $limit = (int)($_GET['limit'] ?? 100);
        $offset = (int)($_GET['offset'] ?? 0);
        
        // Validasi limit dan offset
        if ($limit > 1000) $limit = 1000;
        if ($limit < 1) $limit = 10;
        if ($offset < 0) $offset = 0;
        
        // Build query dengan WHERE clause dinamis
        $whereConditions = [];
        $params = [];
        $types = '';
        
        if (!empty($nama)) {
            $whereConditions[] = "`nama` LIKE ?";
            $params[] = "%$nama%";
            $types .= 's';
        }
        
        if (!empty($profesi)) {
            $whereConditions[] = "`profesi` LIKE ?";
            $params[] = "%$profesi%";
            $types .= 's';
        }
        
        if (!empty($email)) {
            $whereConditions[] = "`email` LIKE ?";
            $params[] = "%$email%";
            $types .= 's';
        }
        
        if (!empty($role_id)) {
            $whereConditions[] = "`role_id` = ?";
            $params[] = (int)$role_id;
            $types .= 'i';
        }
        
        if ($is_active !== '') {
            $whereConditions[] = "`is_active` = ?";
            $params[] = (int)$is_active;
            $types .= 'i';
        }
        
        // Query dasar
        $sql = "SELECT `iduser`, `nama`, `profesi`, `email`, `role_id`, `is_active`, `tanggal_input`, `modified` FROM `user`";
        
        // Tambahkan WHERE clause jika ada kondisi
        if (!empty($whereConditions)) {
            $sql .= " WHERE " . implode(" AND ", $whereConditions);
        }
        
        // Tambahkan ORDER BY dan LIMIT
        $sql .= " ORDER BY `iduser` DESC LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;
        $types .= 'ii';
        
        // Prepare dan execute statement
        $stmt = $mysqli->prepare($sql);
        
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Ambil semua data
        $users = [];
        while ($row = $result->fetch_assoc()) {
            // Mask password untuk keamanan
            unset($row['password']);
            $users[] = $row;
        }
        
        // Hitung total records (tanpa LIMIT)
        $countSql = "SELECT COUNT(*) as total FROM `user`";
        if (!empty($whereConditions)) {
            $countSql .= " WHERE " . implode(" AND ", array_slice($whereConditions, 0, -2)); // Exclude LIMIT params
        }
        
        $countStmt = $mysqli->prepare($countSql);
        if (!empty(array_slice($params, 0, -2))) {
            $countStmt->bind_param(substr($types, 0, -2), ...array_slice($params, 0, -2));
        }
        $countStmt->execute();
        $countResult = $countStmt->get_result();
        $totalRecords = $countResult->fetch_assoc()['total'];
        
        // Response sukses
        echo json_encode([
            "status" => "success",
            "message" => "Data user berhasil diambil",
            "data" => [
                "users" => $users,
                "pagination" => [
                    "total_records" => (int)$totalRecords,
                    "current_page" => floor($offset / $limit) + 1,
                    "total_pages" => ceil($totalRecords / $limit),
                    "limit" => $limit,
                    "offset" => $offset
                ],
                "filters_applied" => [
                    "nama" => $nama ?: null,
                    "profesi" => $profesi ?: null,
                    "email" => $email ?: null,
                    "role_id" => $role_id ?: null,
                    "is_active" => $is_active !== '' ? (int)$is_active : null
                ]
            ]
        ]);
        
        $stmt->close();
        $countStmt->close();
        
    } catch (Exception $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Gagal mengambil data user: " . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Method tidak diizinkan, gunakan GET"
    ]);
}
