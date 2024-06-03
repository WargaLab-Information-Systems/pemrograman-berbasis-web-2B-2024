<?php
    session_start(); 
    $valid_credentials = array(
        'admin' => 'password',
        'shofa' => '12345',
        'manusia' => 'gatau'
    );
    // di buat fungsi submit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // lalu di cek apakah username sama password ada atau tidak
        if (isset($valid_credentials[$username]) && $valid_credentials[$username] === $password) {
            session_start();
            $_SESSION['berhasil']=true;
            header("Location: halaman1.php?username=" . urlencode($username));           
            exit;
        } else {
            $salah = "<p style='color:red; text-align: center;'>Username dan Password salah</p>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
        <h2>LOGIN</h2>
            <form method="post" action="">
            <label for="username">Username : </label><br>
            <input type="text"  name="username" required><br><br>
            <label for="password">Password : </label><br>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="Login" action="halaman1.php">
            </form>
        </div>
        <?php if(isset($salah)) { echo $salah; } ?>
    </div>
</body>
</html>