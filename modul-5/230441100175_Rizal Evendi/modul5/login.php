<?php
session_start();

// Array untuk menyimpan data user
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = array();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($_SESSION['users'] as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            header('Location: home.php'); // Redirect ke halaman home setelah login berhasil
            exit;
        }
    }

    $error_message = 'Invalid username or password';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="stylelogin.css">
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
        <?php if (isset($error_message)) echo "<p style='color: red;'>$error_message</p>"; ?>
        <p>Belum punya akun? <a href="registrasi.php">Daftar di sini</a></p>
    </form>
</body>
</html>