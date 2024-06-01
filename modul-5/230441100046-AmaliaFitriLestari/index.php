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

// Query untuk menampilkan data mahasiswa
$query = "SELECT * FROM mahasiswaa";
$result = $conn->query($query);

// Tampilkan data mahasiswa dalam tabel
?>
<table border="1">
<caption align="top"> <b> DATA MAHASISWA 
</b> </caption>
    <tr bgcolor="pink">
        <th>NIM</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Angkatan</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['nim']; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['alamat']; ?></td>
        <td><?php echo $row['angkatan']; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="hapus.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
    <a href="tambah.php">Tambah Mahasiswa</a>
    <a href="logout.php">Logout</a>
</body>
</html>