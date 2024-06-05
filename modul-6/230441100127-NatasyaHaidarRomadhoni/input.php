<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];

    $sql = "INSERT INTO mahasiswa (nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota) VALUES (?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssissss", $nama, $nim, $umur, $jenis_kelamin, $prodi, $jurusan, $asal_kota);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Input Data Mahasiswa</h1>
        <form method="POST" action="">
            <label>Nama:</label><br>
            <input type="text" name="nama" required><br>
            <label>NIM:</label><br>
            <input type="text" name="nim" required><br>
            <label>Umur:</label><br>
            <input type="number" name="umur" required><br>
            <label>Jenis Kelamin:</label><br>
            <select name="jenis_kelamin" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select><br>
            <label>Prodi:</label><br>
            <input type="text" name="prodi" required><br>
            <label>Jurusan:</label><br>
            <input type="text" name="jurusan" required><br>
            <label>Asal Kota:</label><br>
            <input type="text" name="asal_kota" required><br><br>
            <button type="submit">Tambah</button>
        </form>
        <br>
        <a href="index.php">Lihat Data Mahasiswa</a>
    </div>
</body>
</html>
