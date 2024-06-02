<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
require 'koneksi.php';

// Query untuk mengambil data dari tabel mahasiswa
$result = $conn->query("SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Data Mahasiswa</h1>
        <a href="koneksi.php" class="btn btn-success mb-3">Tambah Data Mahasiswa</a>
        <br>
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <br>
        <table class="table mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Prodi</th>
                    <th>Jurusan</th>
                    <th>Asal Kota</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['nama_mhs'] ?></td>
                    <td><?= $row['nim'] ?></td>
                    <td><?= $row['umur'] ?></td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['prodi'] ?></td>
                    <td><?= $row['jurusan'] ?></td>
                    <td><?= $row['asal_kota'] ?></td>
                    <td>
                        <a href="update.php?nim=<?= $row['nim'] ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?nim=<?= $row['nim'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
