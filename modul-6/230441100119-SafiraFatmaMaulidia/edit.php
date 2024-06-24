<?php
include 'koneksi.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM mahasiswa WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Mahasiswa</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?php echo $row['nim']; ?>" required><br>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        <label for="umur">Umur:</label>
        <input type="text" id="umur" name="umur" value="<?php echo $row['umur']; ?>" required><br>
        <label for="jeniskelamin">Jenis kelamin:</label>
        <input type="text" id="jeniskelamin" name="jeniskelamin" value="<?php echo $row['jeniskelamin']; ?>" required><br>
        <label for="prodi">Prodi:</label>
        <input type="text" id="prodi" name="prodi" value="<?php echo $row['prodi']; ?>" required><br>
        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="<?php echo $row['jurusan']; ?>" required><br>
        <label for="asalkota">Asal kota:</label>
        <input type="text" id="asalkota" name="asalkota" value="<?php echo $row['asalkota']; ?>" required><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
