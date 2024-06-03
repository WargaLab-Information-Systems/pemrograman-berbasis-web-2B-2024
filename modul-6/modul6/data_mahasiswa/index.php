<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<p>Login gagal! Username dan password salah!</p>";
        } else if ($_GET['pesan'] == "login") {
            echo "<p>Anda telah berhasil login.</p>";
        }
    }
    ?>
    <center>
        <div class="container">
            <p>Silahkan login terlebih dahulu!</p>
            <form action="cek-login.php" method="POST">
                <p>Username:</p>
                <input type="text" name="username">
                <p>Password:</p>
                <input type="password" name="password"><br><br>
                <input type="submit" name="submit" value="Login">
            </form>
            <p>Belum punya akun? <a href="signup.php">Daftar di sini</a></p>
        </div>
    </center>
</body>
</html>
