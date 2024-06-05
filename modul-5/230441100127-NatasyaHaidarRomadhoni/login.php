<?php
session_start();

// Simulasi data user
$valid_username = "admin";
$valid_password = "password";

// Cek apakah ada data yang dikirimkan dari form login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil input dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi login
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username; // Simpan username ke session
        header("Location: home.php"); // Redirect ke halaman home
        exit();
    } else {
        $error_message = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <?php if(isset($error_message)) { ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php } ?>
        </form>
    </div>
</body>
</html>
