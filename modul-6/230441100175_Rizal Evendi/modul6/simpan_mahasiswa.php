<!-- simpan_mahasiswa.php -->
<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$database = "katabase"; // Ganti dengan nama database Anda
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$nama = $_POST["nama"];
$nim = $_POST["nim"];
$umur = $_POST["umur"];
$jenis_kelamin = $_POST["jenis_kelamin"];
$prodi = $_POST["prodi"];
$jurusan = $_POST["jurusan"];
$asal_kota = $_POST["asal_kota"];

// Menyiapkan query untuk menyimpan data
$sql = "INSERT INTO mahasiswa (nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota) VALUES ('$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')";

// Menjalankan query
if ($conn->query($sql) === TRUE) {
    echo "<div class='success-message'>Data mahasiswa berhasil disimpan.</div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style simpan .css">
</head>
<body>
    <a href="data_mahasiswa.php" class="btn">Lihat Data Mahasiswa</a>
</body>
</html>