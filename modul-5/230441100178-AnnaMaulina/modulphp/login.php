<?php
session_start();

include 'koneksi.php';

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_query = "SELECT * FROM user WHERE username='$username'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $error_message = "Username sudah digunakan. Silakan pilih username lain.";
    } else {
        $insert_query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        if ($conn->query($insert_query) === TRUE) {
            $_SESSION['username'] = $username; 
            header("Location: home.php");
            exit();
        } else {
            $error_message = "Terjadi kesalahan saat memasukkan data pengguna baru.";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        $error_message = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="asset/style.css">
</head>
<body>
    <h2>Login</h2>
    <div class="container-login">
        <div class="login-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username"><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br><br>
                <div class="error-message">
                    <?php if(isset($error_message)) { echo "<p>$error_message</p>"; } ?>
                </div>
                <input type="submit" value="Login" name="login">
                <input type="submit" value="Register" name="register">
            </form>
        </div>
    </div>
</body>
</html>
