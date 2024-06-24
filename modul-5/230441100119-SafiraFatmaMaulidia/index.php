<?php
session_start();

// Data pengguna untuk login
$users = array(
    'Safira' => '150405',
);

// Menangani login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (array_key_exists($username, $users) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}

// Jika sudah login, redirect ke home
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Login</h2>
            <?php if (isset($error)) { ?>
                <div class="error"><?php echo $error; ?></div>
            <?php } ?>
            <form action="" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
