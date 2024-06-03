<?php
session_start();

// Redirect jika belum login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="home">
            <h2>Welcome</h2>
            <p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
            <a href="mahasiswa.php" class="button">Data Mahasiswa</a>
            <a href="logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>
