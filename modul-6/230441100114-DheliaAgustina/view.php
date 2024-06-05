<?php
include 'db.php';

$result = $conn->query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <table>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Prodi</th>
                <th>Jurusan</th>
                <th>Asal Kota</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['nim']; ?></td>
                <td><?php echo $row['umur']; ?></td>
                <td><?php echo $row['jenis_kelamin']; ?></td>
                <td><?php echo $row['prodi']; ?></td>
                <td><?php echo $row['jurusan']; ?></td>
                <td><?php echo $row['asal_kota']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirmDelete()">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <a href="index.php">Kembali</a>
    </div>
</body>
</html>
