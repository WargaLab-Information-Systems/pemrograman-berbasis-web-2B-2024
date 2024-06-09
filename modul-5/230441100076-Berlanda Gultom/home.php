<?php
session_start();
// Periksa apakah pengguna telah login
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Jika pengguna belum login, arahkan kembali ke halaman login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
    <h1>Halo, Selamat Datang <?= $username ?></h1>

    <nav>
        <a href="home.php">Home</a>
        <a href="DataMahasiswa.php">Data Mahasiswa</a>
        <a href="logout.php">Log out</a>
    </nav>
</body>
</html>