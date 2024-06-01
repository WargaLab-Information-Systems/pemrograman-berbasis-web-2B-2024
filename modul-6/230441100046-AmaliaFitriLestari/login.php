
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kotak_login">
        <p class="tulisan_login"> Silahkan login </p>
        <form action="ceklogin.php" method="post" role="form">
            <label> Username </label>
            <input type="text" name="username" class="form_login" placeholder="username" autocomplete="off">
            <label> Password </label>
            <input type="password" name="password" class="form_login" placeholder="password" autocomplete="off">
            <input type="submit" class="tombol_login" value="Login">
</body>
</html>