<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect jika belum login
    exit();
}

// Koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'mahasiswa';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tangkap nim mahasiswa yang akan dihapus
$nim = $_GET['nim'];

// Hapus data mahasiswa dari database
$sql = "DELETE FROM mahasiswa WHERE nim='$nim'";
if ($conn->query($sql) === TRUE) {
    header("Location: mahasiswa.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
