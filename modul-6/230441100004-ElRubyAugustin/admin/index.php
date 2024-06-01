<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<style>
        body {
            weight: 100%;
            height: 90vh;
            background-image: url('bg2.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Menjadikan elemen di dalamnya berjajar ke bawah */
        }

        a {
            text-decoration: none;
            color: #007bff; 
            font-weight: bold;
        }

        a:hover {
            color: #0056b3; 
        }

        h2{
            font-size: 50px;
        }

        p{
            font-size: 20px;
        }
    </style>
<body>
	<h2>Halaman Admin</h2>
	
	<br/>
 
	<!-- cek apakah sudah login -->
	<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}
	?>
 
	<h4>Selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login.</h4>
 
	<br/>
	<br/>
    <a href="form.php">Next</a>
	<a href="logout.php">LOGOUT</a>
</body>
</html>