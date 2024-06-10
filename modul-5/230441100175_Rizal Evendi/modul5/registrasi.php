<?php
session_start();

// Array untuk menyimpan data user
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = array();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek jika username sudah digunakan
    $userExists = false;
    foreach ($_SESSION['users'] as $user) {
        if ($user['username'] == $username) {
            $userExists = true;
            break;
        }
    }

    if (!$userExists) {
        $_SESSION['users'][] = array('username' => $username, 'password' => $password);
        header('Location: login.php'); // Redirect ke halaman login setelah registrasi berhasil
        exit;
    } else {
        $error_message = 'Username sudah digunakan';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.registrasi.css">
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>Registrasi</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Daftar">
        <?php if (isset($error_message)) echo "<p style='color: red;'>$error_message</p>"; ?>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </form>
</body>
</html>