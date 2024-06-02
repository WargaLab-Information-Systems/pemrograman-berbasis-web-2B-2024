<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
        <div class="container">
            <h2>Sign Up</h2>
            <form action="proses-signup.php" method="POST">
                <p>Username:</p>
                <input type="text" name="username">
                <p>Password:</p>
                <input type="password" name="password"><br><br>
                <input type="submit" name="submit" value="Sign Up">
            </form>
            <p>Sudah punya akun? <a href="index.php">Login di sini</a></p>
        </div>
    </center>
</body>
</html>
