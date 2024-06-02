<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
        body {
            weight: 100%;
            height: 90vh;
            background-image: url('bg.2.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background-position: center;
            background-size: cover;
            
        }
        .login-form {
            text-align: center;
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 200px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
        }
        .login-form input[type="submit"] {
            width: 100px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }
        .login-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
        }
	</style>
</head>
<body>
<div class="container">
<div class="login-form">
	<form method="post" action="cek_login.php">
		<h2>Login Cuyyy!!!</h2>
		<!-- cek pesan notifikasi -->
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "Login gagal! username dan password salah!";
			}else if($_GET['pesan'] == "logout"){
				echo "Anda telah berhasil logout";
			}else if($_GET['pesan'] == "belum_login"){
				echo "Anda harus login untuk mengakses halaman admin";
			}
		}
		?>
        <div class="login-form">
		<input type="text" name="username" placeholder="Masukkan username">
		<input type="password" name="password" placeholder="Masukkan password">
		<input type="submit" value="LOGIN">
            </div>
        </div>

        <h3 align="center"><a href="daftar.php" class="button">Register?disinii!!!!</a></h3>
	</form>
</body>
</html>
