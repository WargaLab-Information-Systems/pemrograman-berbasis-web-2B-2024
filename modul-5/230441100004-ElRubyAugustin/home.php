<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: home.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            weight: 100%;
            height: 90vh;
            background-image: url('bg.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; 
        }

        a {
            text-decoration: none;
            color: #007bff; 
            font-weight: bold;
        }

        a:hover {
            color: #0056b3; 
        }

        h2{
            font-size: 50px;
        }

        p{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <h2>WELCOME!!!</h2><br>
    <p>Hello, <?php echo $username; ?>!</p><br>
    <a href="daftarmhs.php">NEXT</a><br>
</body>
</html>

