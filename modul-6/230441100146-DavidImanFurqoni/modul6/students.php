<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM students WHERE id=$id");
}

$students = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <form action="">
        <a href="add_student.php" class="button" style="width: 370px; text-align: center;">Tambah Mahasiswa</a>
        <a href="home.php" class="button" style="width: 370px; text-align: center;">Kembali</a>
    </form>
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Asal Kota</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $students->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['nim']); ?></td>
            <td><?php echo htmlspecialchars($row['nama']); ?></td>
            <td><?php echo htmlspecialchars($row['umur']); ?></td>
            <td><?php echo htmlspecialchars($row['jenis_kelamin']); ?></td>
            <td><?php echo htmlspecialchars($row['prodi']); ?></td>
            <td><?php echo htmlspecialchars($row['jurusan']); ?></td>
            <td><?php echo htmlspecialchars($row['asal_kota']); ?></td>
            <td>
                <a href="edit_student.php?id=<?php echo $row['id']; ?>" class="button edit">Edit</a>
                <a href="?delete=<?php echo $row['id']; ?>" class="button delete">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
