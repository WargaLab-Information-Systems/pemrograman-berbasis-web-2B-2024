<?php
session_start();
// if (!isset($_SESSION['username'])) {
//     header("Location: login.php");
//     exit();
// }

include 'db.php';

$id = $_GET['id'];
$student = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];

    $sql = "UPDATE students SET nim='$nim', nama='$nama', umur='$umur', jenis_kelamin='$jenis_kelamin', prodi='$prodi', jurusan='$jurusan', asal_kota='$asal_kota' WHERE id=$id";
    $conn->query($sql);

    header("Location: students.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Edit Mahasiswa</h1>
    <form method="POST" action="">
        <input type="text" name="nim" value="<?php echo htmlspecialchars($student['nim']); ?>" required>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($student['nama']); ?>" required>
        <input type="number" name="umur" value="<?php echo htmlspecialchars($student['umur']); ?>" required>
        <select name="jenis_kelamin">
            <option value="Laki-laki" <?php if ($student['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
            <option value="Perempuan" <?php if ($student['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
        </select>
        <input type="text" name="prodi" value="<?php echo htmlspecialchars($student['prodi']); ?>" required>
        <input type="text" name="jurusan" value="<?php echo htmlspecialchars($student['jurusan']); ?>" required>
        <input type="text" name="asal_kota" value="<?php echo htmlspecialchars($student['asal_kota']); ?>" required>
        <button type="submit" class="button">Update</button>
    
    <a href="students.php" class="button" style="width: 370px; text-align: center;" >Kembali</a>
    </form>
</body>
</html>
