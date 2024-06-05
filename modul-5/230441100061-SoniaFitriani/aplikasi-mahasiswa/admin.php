<?php
session_start();

// Periksa apakah pengguna sudah login, jika belum redirect ke halaman login
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ambil nama pengguna dari session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Your custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container-fluid {
            padding: 20px;
        }
        .navbar {
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            color: #ffffff;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            margin-right: 20px;
        }
        .navbar-nav {
            margin-left: auto;
        }
        .navbar-nav .nav-item {
            margin-left: 20px;
        }
        .navbar-nav .nav-link {
            color: #ffffff;
            font-weight: bold;
            text-transform: uppercase;
        }
        .jumbotron {
            background-color: #ffffff;
            padding: 40px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .jumbotron h2 {
            color: #007bff;
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .jumbotron p {
            font-size: 16px;
            color: #495057;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Web</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_mahasiswa.php">Data Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid mt-5">
        <div class="jumbotron">
            <h2 class="text-center">Selamat Datang, <?php echo $username; ?>!</h2>
            <p>Hallo, saya adalah seorang mahasiswa di Universitas Trunojoyo Madura, Fakultas Teknik dan Program Studi Sistem Informasi. Sejak masuk ke program studi ini, saya banyak belajar tentang HTML, CSS, dan ilmu data, dll. Banyak pengalaman dan pembelajaran di tempat ini.</p>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
