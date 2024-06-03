<?php
session_start(); 
// Ambil username dari URL jika tersedia
$username = isset($_GET['username']) ? $_GET['username'] : '';
// Jika tidak ada session username dan tidak ada username di URL, kembalikan ke halaman login
if (!isset($_SESSION['username']) && empty($username)) {
    header("Location: login1.php");
    exit;
}
// Jika session username belum diset, tetapi ada username di URL, atur session username
if (!isset($_SESSION['username']) && !empty($username)) {
    $_SESSION['username'] = $username;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.CSS">
</head>
<body>
    <nav>
        <div class="navbar" style="display: flex;">
            <a href="halaman1.php">Home</a>
            <a href="halaman2.php">Data Mahasiswa</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <div class="content">
        <h1>Selamat datang, <?php echo $_SESSION["username"]; ?>!</h1>
        <h3>Welcome to our page! click data mahasiswa on navbar if you want to put your biodata</h3><br>
        <h3>And if you want to leave you can click logout on navbar</h3>
        <h6>HAVE A NICE DAY!</h6>
    </div>
</body>
</html>