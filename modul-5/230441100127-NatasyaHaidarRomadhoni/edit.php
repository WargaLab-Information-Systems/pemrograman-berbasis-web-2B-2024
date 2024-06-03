<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect jika belum login
    exit();
}

// Koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'mahasiswa';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari form
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    // Update data ke database
    $sql = "UPDATE mahasiswa SET nama='$nama', alamat='$alamat', angkatan='$angkatan' WHERE nim='$nim'";
    if ($conn->query($sql) === TRUE) {
        header("Location: mahasiswa.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Ambil data mahasiswa berdasarkan nim
$nim = $_GET['nim'];
$sql = "SELECT * FROM mahasiswa WHERE nim='$nim'";
$result = $conn->query($sql);
$mhs = $result->fetch_assoc();
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
    <div class="container">
        <h2>Edit Mahasiswa</h2>
        <form action="" method="POST">
            <input type="hidden" name="nim" value="<?php echo $mhs['nim']; ?>"> <!-- Hidden input untuk menyimpan NIM -->
            <input type="text" name="nama" placeholder="Nama" value="<?php echo $mhs['nama']; ?>" required><br>
            <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $mhs['alamat']; ?>" required><br>
            <input type="text" name="angkatan" placeholder="Angkatan" value="<?php echo $mhs['angkatan']; ?>" required><br>
            <button type="submit">Simpan</button>
        </form>
        <a href="mahasiswa.php">Kembali</a>
    </div>
</body>
</html>

