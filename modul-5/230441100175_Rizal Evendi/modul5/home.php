<?php
session_start();
// Cek apakah user sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
// Ambil username dari sesi
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
   <link rel="stylesheet" href="stylehome.css">
</head>
<body>
    <div >
        <h1>Selamat Datang, <?php echo strtoupper($username); ?>!</h1>
        
        <a href="logout.php">Logout</a>
        <a href="mahasiswa.php">Lihat Data Mahasiswa</a>
    </div>
</body>
</html>