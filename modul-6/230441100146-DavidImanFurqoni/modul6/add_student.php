<?php
session_start();
// if (!isset($_SESSION['username'])) {
//     header("Location: login.php");
//     exit();
// }

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];

    $sql = "INSERT INTO students (nim, nama, umur, jenis_kelamin, prodi, jurusan, asal_kota) VALUES ('$nim', '$nama', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')";
    $conn->query($sql);

    header("Location: students.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Tambah Mahasiswa</h1>
    <form method="POST" action="">
        <input type="text" name="nim" placeholder="NIM" required>
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="number" name="umur" placeholder="Umur" required>
        <select name="jenis_kelamin">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        <input type="text" name="prodi" placeholder="Prodi" required>
        <input type="text" name="jurusan" placeholder="Jurusan" required>
        <input type="text" name="asal_kota" placeholder="Asal Kota" required>
        <button type="submit">Tambah</button>

        <a href="students.php" class="button" style="width: 370px; text-align: center;">Kembali</a>
    </form>
</body>
</html>
