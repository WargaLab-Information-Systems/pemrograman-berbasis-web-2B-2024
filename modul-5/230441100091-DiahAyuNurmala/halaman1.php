<?php
session_start();
$username = isset($_GET['username']) ? $_GET['username'] : '';
if (!isset($_SESSION['username']) && empty($username)) {
    header("Location: login1.php");
    exit;
}
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
    <link rel="stylesheet" href="style.css">
    <style>
    .content{
    text-align: center;
    padding: 10px 0;
    box-shadow: 0 0 10px rgba(167, 161, 161, 0.3);
    position: fixed;
    width: 100%;
    top: 46px;
}
    </style>
</head>

<body>
    <nav>
        <div class="navbar">
            <button><a href="halaman1.php">Home</a></button>
            <button><a href="halaman2.php">Data Mahasiswa</a></button>
            <button><a href="logout.php">Logout</a></button>
        </div>
    </nav>
    <div class="content">
        <h1>Selamat datang, <?php echo $_SESSION["username"]; ?>!</h1>
        <h3>Welcome to our page! </h3><br>
        <h3>Hello semoga tersemogakan dan akan selamat dan sejahtera</h3>
        <h6>HAVE A NICE DAY!</h6>
    </div>
</body>

</html>