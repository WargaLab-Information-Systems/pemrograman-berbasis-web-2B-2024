<?php
session_start();

$users = array(
    'RoidFawwaz' => '181204',
);


if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(array_key_exists($username, $users) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color:blue;
}
</style>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if(isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>