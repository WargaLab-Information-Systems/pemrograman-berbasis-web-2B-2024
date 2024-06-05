<?php
session_start();

if (!isset($_SESSION["error"])) {
    if (!isset($_SESSION["username"]) || !isset($_SESSION["password"]) || $_SESSION["username"] === "" || $_SESSION["password"] === "" ) {
        header("Location: login.php");
        exit;
    } else if (isset($_SESSION["username"]) || isset($_SESSION["password"])) {
        header("Location: home.php");
        exit;
    }
}

if(isset($_POST["kembali"])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: darkred;
        }

        .container {
            padding-top: 35vh;
        }

        h2, form {
            margin: auto;
            width: fit-content;
            margin-top: 2rem;
        }
        
        h2 {
            background-color: black;
            padding: 1rem;
            border-radius: 1rem;
            color: white;
        }

        button {
            padding: 1rem;
            border-radius: 1rem;
            transition: 0.2s;
        }

        button:hover {
            cursor: pointer;
            transform: translateY(-0.4rem);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><?php echo $_SESSION["error"]?></h2>
        <form method="post">
            <button name="kembali" type="submit">Kembali ke Log In</button>
        </form>
    </div>
</body>
</html>