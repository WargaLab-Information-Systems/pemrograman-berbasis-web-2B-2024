<?php
session_start();

// ketika memaksa masuk ke halaman login pada saat di halaman tampilan
if(isset($_SESSION["username"]) || isset($_SESSION["password"])) {
    header("Location: tampilan.php");
    exit;
};

// ketika login berhasil
if(isset($_POST["login"])) {
    $_SESSION["login"] = $_POST["login"];
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    header("Location: tampilan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
        }

        .container {
            margin: 6rem auto;
            display: flex;
            width: 70%;
            height: 70vh;
            border-radius: 10px;
            box-shadow: 2px 2px 1rem black;
            overflow: hidden;
        }

        .gambar {
            background-image: url('https://www.acehardware.co.id/files/uploads/inspirationarticle/thumb_image/2022/Oct/11/mainimagecaramenjinakkankucingwebp-770x770.webp');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            flex: 2;
            transition: 0.1s;
        }

        .gambar:hover {
            flex: 3;
        }
        
        .form {
            flex: 3;
        }

        form {
            width: 80%;
            margin: 3rem auto 0;
        }

        h1 {
            text-align: center;
            margin: 3rem 0 2rem;
        }

        input {
            padding: 12px 1rem;
            width: 70%;
            display: block;
            margin: 2.5rem auto 0;
            outline: none;
            font-size: 1rem;
            border-radius: 8px;
            border: 2px solid black;
        }

        input::placeholder {
            font-weight: 700;
        }

        button {
            display: block;
            margin: 3rem auto 0;
            padding: 8px 2rem;
            border-radius: 5px;
            background-color: black;
            color: white;
            font-weight: 700;
            transition: 0.2s;
        }

        button:hover {
            transform: translateY(-5px);
        }

        hr {
            border: 2px solid black;
            width: 80%;
            margin: auto;
            border-radius: 5rem;
        }

        p {
            width: 70%;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="gambar"></div>
        <div class="form">
            <h1>Login</h1>
            <hr>
            <form method="post">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <p id="errorUsername"></p>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <p id="errorPassword"></p>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
    <script>
        const usr = document.getElementById('username');
        const pass = document.getElementById('password');
        const eusr = document.getElementById('errorUsername');
        const epass = document.getElementById('errorPassword');
        usr.addEventListener('input', function() {
            if(usr.value.length === 0) {
                eusr.innerHTML = "Username tidak boleh kosong!";
                eusr.style.color = 'red';
                usr.style.borderColor = "red";
            } else {
                eusr.innerHTML = "";
                usr.style.borderColor = "black";
            }
        })
        pass.addEventListener('input', function() {
            if(pass.value.length === 0) {
                epass.innerHTML = "Password tidak boleh kosong!";
                epass.style.color = 'red';
                pass.style.borderColor = "red";
            } else {
                epass.innerHTML = "";
                pass.style.borderColor = "black";
            }
        })
    </script>
</body>
</html>