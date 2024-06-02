<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="asset/style.css">
</head>
<body>
    <div class="container-home">
        <div class="home-content">
        <h2>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Ini adalah halaman utama setelah login.</p>
        <p><a href="logout.php">Logout</a></p>
        <p><a href="mahasiswa.php">Mahasiswa</a></p>
        </div>
    </div>
</body>
</html>