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

// Fungsi untuk mengambil data mahasiswa
function getMahasiswa($conn) {
    $sql = "SELECT nim, nama, alamat, angkatan FROM mahasiswa";
    $result = $conn->query($sql);

    $mahasiswa = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mahasiswa[] = $row;
        }
    }
    return $mahasiswa;
}

$mahasiswa = getMahasiswa($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <table>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Angkatan</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($mahasiswa as $mhs): ?>
                <tr>
                    <td><?php echo $mhs['nim']; ?></td>
                    <td><?php echo $mhs['nama']; ?></td>
                    <td><?php echo $mhs['alamat']; ?></td>
                    <td><?php echo $mhs['angkatan']; ?></td>
                    <td>
                        <a href="edit.php?nim=<?php echo $mhs['nim']; ?>">Edit</a>
                        <a href="delete.php?nim=<?php echo $mhs['nim']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data mahasiswa ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <a href="add.php">Tambah Mahasiswa</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
