<?php
header("Content-Type: application/json; charset=UTF-8");

try {
    require 'db.php';
    
    // Test koneksi database
    $testQuery = $mysqli->query("SELECT 1 as test");
    
    if ($testQuery && $testQuery->num_rows > 0) {
        $result = $testQuery->fetch_assoc();
        
        if ($result && $result['test'] == 1) {
            echo json_encode([
                "status" => "success",
                "message" => "Koneksi database berhasil",
                "database_info" => [
                    "host" => "localhost",
                    "database" => "vigenesia",
                    "connection_status" => "OK",
                    "mysqli_info" => $mysqli->server_info
                ]
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Koneksi database gagal"
            ]);
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Koneksi database gagal: " . $mysqli->error
        ]);
    }
    
    if ($testQuery) {
        $testQuery->free();
    }
    
} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Error: " . $e->getMessage()
    ]);
}
