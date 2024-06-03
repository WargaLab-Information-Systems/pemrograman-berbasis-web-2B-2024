<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Selamat datang <?php echo $_SESSION['username']; ?></h2>
        <a href="mahasiswa.php">Data Mahasiswa</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>

