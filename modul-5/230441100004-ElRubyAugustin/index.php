<?php
session_start();

// Simpan username dan password yang valid dalam variabel
$valid_username = "Veldoraaa";
$valid_password = "22";

// Periksa apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah username dan password yang dimasukkan benar
    if ($_POST['username'] == $valid_username && $_POST['password'] == $valid_password) {
        // Simpan username dalam sesi
        $_SESSION['username'] = $_POST['username'];
        
        // Masuk ke halaman home setelah login berhasil
        header("Location: home.php");1q
        exit;
    } else {
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background-image: url('bg.jpg');
            background-position: center;
            background-size: cover;
            
        }
        .login-form {
            text-align: center;
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 200px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
        }
        .login-form input[type="submit"] {
            width: 100px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }
        .login-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Login Ngabbb!!!</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="username">Username:</label><br>
                <input type="text" name="username" id="username" required><br><br>
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" required><br><br>
                <input type="submit" value="Login">
            </form>
            <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        </div>
    </div>
</body>
</html>

