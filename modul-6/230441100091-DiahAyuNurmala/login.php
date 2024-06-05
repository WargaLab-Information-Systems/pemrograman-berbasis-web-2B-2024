<?php
session_start();
include 'koneksi.php';
if (isset($_SESSION['status']) && $_SESSION['status'] === "login") {
    header("location: index.php");
    exit;
}
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM login WHERE username=? AND password=?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location: index.php");
        exit;
    } else {
        $salah = "Username dan Password tidak terdaftar";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>LOGIN</h1>
            <form method="post" action="">
                <input type="text" name="username" placeholder="Username" required><br><br>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <input type="submit" value="LOGIN">
                <?php if (isset($salah)) {
                    echo "<p style='color:red; text-align:center;'>$salah</p>";
                } ?>
            </form>
            <p>Belum punya akun?<a href="signup.php">Buat disini</a></p>
        </div>
    </div>
</body>

</html>