<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$error_message = '';

$id = $_GET['id'];

$query = "SELECT * FROM mahasiswa WHERE id='$id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    $update_query = "UPDATE mahasiswa SET nim='$nim', nama='$nama', alamat='$alamat', angkatan='$angkatan' WHERE id='$id'";
    if ($conn->query($update_query) === TRUE) {
        header("Location: mahasiswa.php"); 
        exit();
    } else {
        $error_message = "Terjadi kesalahan saat memperbarui data mahasiswa.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Mahasiswa</title>
    <link rel="stylesheet" href="asset/style.css">
</head>
<body>
    <div class="container">
        <div class="form-content">
            <h2>Update Mahasiswa</h2>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="text" name="nim" value="<?php echo $row['nim']; ?>" required>
                <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>
                <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required>
                <input type="text" name="angkatan" value="<?php echo $row['angkatan']; ?>" required>
                <button type="submit" name="update">Update</button>
            </form>
        </div>
    </div>
</body>
</html>