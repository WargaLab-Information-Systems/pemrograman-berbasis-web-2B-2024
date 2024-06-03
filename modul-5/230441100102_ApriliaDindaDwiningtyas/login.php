<?php
session_start();
if (isset($_SESSION["username"]) || isset($_SESSION["password"])) {
    header("Location: home.php");
    exit;
}

if (isset($_POST["submit"])) {
    if(!isset($_POST["username"]) || $_POST["username"] === "" || !isset($_POST["password"]) || $_POST["password"] === "") {
        $_SESSION["error"] = "Anda belum memasukkan username / password!";
        header(("Location: error.php"));
        exit;
    } else {
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
        header("Location: home.php");
        exit;
    };
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <style>
        .container {
            width: 30%;
            margin: 10rem auto;
            padding: 1rem;
            border: 2px dashed;
            border-radius: 5px;
        }

        input {
            width: 90%;
            margin: auto;
            display: block;
            padding: 1rem;
            outline: none;
            border-radius: 3px;
            border: 1px solid rgba(0, 0, 0, 7);
            font-size: 1rem;
        }
        
        .button {
            width: 8rem;
            border-radius: 8px;
            background-color: black;
            color: white;
            transition: 0.2s;
        }

        .button:hover {
            transform: translateY(-0.4rem) scale(1.1);
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Log In</h1>
        <form method="post">
            <input type="text" id="username" name="username" placeholder="Username">
            <br>
            <input type="password" id="password" name="password" placeholder="Password">
            <br>
            <input type="submit" name="submit" class="button">
        </form>
    </div>
</body>
</html>