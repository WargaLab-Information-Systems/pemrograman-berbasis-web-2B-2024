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
    <form action="">
        <a href="students.php" class="button" class="button" style="width: 370px; text-align: center;">Data Mahasiswa</a>
        <a href="logout.php" class="button" style="width: 370px; text-align: center;">Logout</a>
    </form>
</body>
</html>
