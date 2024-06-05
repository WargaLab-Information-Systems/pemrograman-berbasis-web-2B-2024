<?php
include 'config.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];

    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', umur='$umur', jenis_kelamin='$jenis_kelamin', prodi='$prodi', jurusan='$jurusan', asal_kota='$asal_kota' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diubah!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Edit Data Mahasiswa</h1>
        <form method="POST" action="">
            <label>Nama:</label><br>
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
            <label>NIM:</label><br>
            <input type="text" name="nim" value="<?php echo $row['nim']; ?>" required><br>
            <label>Umur:</label><br>
            <input type="number" name="umur" value="<?php echo $row['umur']; ?>" required><br>
            <label>Jenis Kelamin:</label><br>
            <select name="jenis_kelamin" required>
                <option value="L" <?php if ($row['jenis_kelamin'] == 'L') echo 'selected'; ?>>Laki-laki</option>
                <option value="P" <?php if ($row['jenis_kelamin'] == 'P') echo 'selected'; ?>>Perempuan</option>
            </select><br>
            <label>Prodi:</label><br>
            <input type="text" name="prodi" value="<?php echo $row['prodi']; ?>" required><br>
            <label>Jurusan:</label><br>
            <input type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>" required><br>
            <label>Asal Kota:</label><br>
            <input type="text" name="asal_kota" value="<?php echo $row['asal_kota']; ?>" required><br><br>
            <button type="submit">Ubah</button>
        </form>
        <br>
        <a href="index.php">Kembali</a>
    </div>
</body>
</html>