<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];

    $sql = "INSERT INTO mahasiswa (nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota) VALUES ('$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')";
    if ($conn->query($sql) === TRUE) {
        header('Location: view.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Mahasiswa</h2>
        <form action="add.php" method="POST">
            <label>Nama:</label>
            <input type="text" name="nama" required><br>
            <label>NIM:</label>
            <input type="text" name="nim" required><br>
            <label>Umur:</label>
            <input type="number" name="umur" required><br>
            <label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select><br>
            <label>Prodi:</label>
            <input type="text" name="prodi" required><br>
            <label>Jurusan:</label>
            <input type="text" name="jurusan" required><br>
            <label>Asal Kota:</label>
            <input type="text" name="asal_kota" required><br>
            <button type="submit">Tambah</button>
        </form>
        <a href="index.php">Kembali</a>
    </div>
</body>
</html>
