<?php
$servername = "localhost"; // Host MySQL (biasanya localhost jika MySQL berjalan di server yang sama)
$username = "root"; // Nama pengguna MySQL
$password = ""; // Kata sandi MySQL, kosongkan jika tidak ada kata sandi
$database = "universitas"; // Nama database MySQL

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
