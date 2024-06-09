<?php
session_start();

$users = array(
    "berlanda" => "123",
);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (array_key_exists($username, $users) && $users[$username] == $password) {
        $_SESSION['username'] = $username;
        header('Location: home.php');
        exit();
    } else {
        $error = "Username atau Password yang dimasukkan salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login_style.css"> 
</head>
<body>

    <div class="login-container">
        <form method="POST" action="">
            <h2>Login Page</h2>
            <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
</html>