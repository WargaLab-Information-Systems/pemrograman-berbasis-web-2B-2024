<?php
session_start();
$valid_credentials = array(
    'admin' => 'password',
    'guatau' => 'apaya',
    'diah' => 'gatau'
);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isset($valid_credentials[$username]) && $valid_credentials[$username] === $password) {
        session_start();
        $_SESSION['berhasil'] = true;
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
    <link rel="stylesheet" href="style.css">
    <!-- icont -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="">
            <label>Username</label><br>
            <input type="text" name="username" required><br>
            <label>Password</label><br>
            <input type="password" name="password" required><br>
            <button type="submit" value="Login">Log in</button>
        </form>
        <div class="col">
            <p>OR</p>
            <span class=""><i class="fab fa-facebook"></i></span>
            <span class=""><i class="fab fa-twitter"></i></span>
            <span class=""><i class="fab fa-linkedin"></i></span>
        </div>
        <?php if (isset($salah)) {
            echo $salah;
        } ?>
    </div>
</body>

</html>