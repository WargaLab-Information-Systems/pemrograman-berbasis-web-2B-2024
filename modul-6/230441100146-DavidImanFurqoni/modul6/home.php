<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        session_start(); 

        if (isset($_SESSION['username'])) {
            echo "<h1>Selamat datang, " . htmlspecialchars($_SESSION['username']) . "</h1>";
        } else {
            header("Location: login.php");
            exit();
        }
    ?>
    <a href="students.php" class="button">Data Mahasiswa</a>
    <a href="logout.php" class="button back">Logout</a>
</body>
</html>
