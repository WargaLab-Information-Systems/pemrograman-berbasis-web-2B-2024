<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect jika belum login
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="welcome-container">
        <h2>Selamat datang <?php echo $username; ?></h2>
    </div>
</body>
</html>
