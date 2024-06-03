<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];

    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', umur='$umur', jenis_kelamin='$jenis_kelamin', prodi='$prodi', jurusan='$jurusan', asal_kota='$asal_kota' WHERE id=$id";
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
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Mahasiswa</h2>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
            <label>NIM:</label>
            <input type="text" name="nim" value="<?php echo $row['nim']; ?>" required><br>
            <label>Umur:</label>
            <input type="number" name="umur" value="<?php echo $row['umur']; ?>" required><br>
            <label>Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
            </select><br>
            <label>Prodi:</label>
            <input type="text" name="prodi" value="<?php echo $row['prodi']; ?>" required><br>
            <label>Jurusan:</label>
            <input type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>" required><br>
            <label>Asal Kota:</label>
            <input type="text" name="asal_kota" value="<?php echo $row['asal_kota']; ?>" required><br>
            <button type="submit">Update</button>
        </form>
        <a href="view.php">Kembali</a>
    </div>
</body>
</html>
