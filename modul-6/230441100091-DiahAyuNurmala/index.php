<?php
session_start(); 
// Ambil username dari URL jika tersedia
$username = isset($_GET['username']) ? $_GET['username'] : '';
if (!isset($_SESSION['username']) && empty($username)) {
    header("Location: login.php");
    exit;
}
if (!isset($_SESSION['username']) && !empty($username)) {
    $_SESSION['username'] = $username;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
    <h1>Selamat Datang, <?php echo $_SESSION["username"]; ?>!</h1>
    <div class="container-button">
        <button><h3><a href="datamhs.php">DATA MAHASISWA</a></h3></button>
        <button><h3><a href="logout.php?">LOGOUT</a></h3> </button>
    </div>  
    </div>
</body>
</html>
