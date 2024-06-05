<?php
session_start();

if(isset($_SESSION["username"])) {
    header("Location: admin.php"); // Redirect ke halaman admin jika pengguna sudah login
    exit;
}

if(isset($_POST["login"])){
    $user = $_POST["username"];
    $pass = $_POST["password"];

    // Dummy check, ganti dengan validasi login yang sesuai
    if ($user == 'Sonia Fitriani' &&  $pass == '123'){
        $_SESSION['username'] = $user; // Atur session username
        header("Location: admin.php"); // Redirect ke halaman home setelah login berhasil
        exit;
    } else{
        $salah = "<p style='color:red; text-align: center;'>Username dan Password salah</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <title>Login Page</title>
    
</head>
<body >
<section class="login d-flex">
  <div class="login-left w-50 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-6">
        <div class="header">
          <h1>Login</h1>
          <p>Welcome back! Please enter your details.</p>
        </div>
        <div class="login-form">
        <?php if(isset($salah)) { echo $salah; } ?>
          <form action="" method="post">
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" name="username" required placeholder="masukkan username" />
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password" required placeholder="Masukkan Password" />
            </div>
            <button type="submit" name="login" class="btn btn-dark btn-block">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
