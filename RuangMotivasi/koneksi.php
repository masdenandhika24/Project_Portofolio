<?php
// Gunakan ini untuk semua file PHP kamu nantinya
$conn = mysqli_connect("localhost", "root", "", "vigenesia");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>