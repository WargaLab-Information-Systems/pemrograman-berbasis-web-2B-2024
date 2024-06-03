<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    echo "<h2> HALOOO SELAMAT DATANG: " . $username . "</h2><br>";
    }
    ?>
    
    <a href="index.php">Lihat Data Mahasiswa</a>
    <a href="logout.php">Logout</a>
</body>
</html>



