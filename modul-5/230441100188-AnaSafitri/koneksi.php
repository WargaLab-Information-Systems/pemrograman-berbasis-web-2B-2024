<?php
$servername = "localhost";
$username = "root";
$password = ""; // Password Anda mungkin berbeda
$dbname = "biodata";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM tb_data";
$result = $conn->query($sql);

if ($result === false) {
    // Jika query gagal dieksekusi
    echo "Error: " . $conn->error;
} else {
    // Jika query berhasil dieksekusi
    if ($result->num_rows > 0) {
        // Lakukan sesuatu dengan hasil query
    } else {
        echo "Tidak ada data ditemukan";
    }
}

// Tutup koneksi
$conn->close();
?>