<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Mahasiswa</h2>
    <form action="simpan.php" method="POST">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br>
        <label for="umur">Umur:</label>
        <input type="text" id="umur" name="umur" required><br>
        <label for="jeniskelamin">Jenis kelamin:</label>
        <input type="text" id="jeniskelamin" name="jeniskelamin" required><br>
        <label for="prodi">Prodi:</label>
        <input type="text" id="prodi" name="prodi" required><br>
        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" required><br>
        <label for="asalkota">Asal kota:</label>
        <input type="text" id="asalkota" name="asalkota" required><br>
        <button type="submit">Tambahkan</button>
    </form>
</body>
</html>
