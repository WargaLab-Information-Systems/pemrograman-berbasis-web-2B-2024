<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect jika belum login
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari form
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    // Simpan data ke database
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'mahasiswa';

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO mahasiswa (nim, nama, alamat, angkatan) VALUES ('$nim', '$nama', '$alamat', '$angkatan')";
    if ($conn->query($sql) === TRUE) {
        header("Location: mahasiswa.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Mahasiswa</h2>
        <form action="" method="POST">
            <input type="text" name="nim" placeholder="NIM" required><br>
            <input type="text" name="nama" placeholder="Nama" required><br>
            <input type="text" name="alamat" placeholder="Alamat" required><br>
            <input type="text" name="angkatan" placeholder="Angkatan" required><br>
            <button type="submit">Tambah</button>
        </form>
        <a href="mahasiswa.php">Kembali</a>
    </div>
</body>
</html>
