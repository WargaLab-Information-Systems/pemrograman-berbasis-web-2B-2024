<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'koneksi.php';

// Cek jika form telah di submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    // Query untuk menambahkan data mahasiswa
    $query = "INSERT INTO mahasiswaa (nim, nama, alamat, angkatan) VALUES ('$nim', '$nama', '$alamat', '$angkatan')";
    $conn->query($query);

    // Redirect ke halaman index
    header('Location: index.php');
    exit;
}
?>

<h1>Tambah Mahasiswa</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="nim">NIM:</label>
    <input type="text" id="nim" name="nim"><br><br>
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama"><br><br>
    <label for="alamat">Alamat:</label>
    <input type="text" id="alamat" name="alamat"><br><br>
    <label for="angkatan">Angkatan:</label>
    <input type="text" id="angkatan" name="angkatan"><br><br>
    <input type="submit" value="Tambah">
</form>

</body>
</html>