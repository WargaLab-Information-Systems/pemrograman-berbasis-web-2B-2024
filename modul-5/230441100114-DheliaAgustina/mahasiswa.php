<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

include 'db.php';

if (isset($_POST['add'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    $sql = "INSERT INTO mahasiswa (nim, nama, alamat, angkatan) VALUES ('$nim', '$nama', '$alamat', '$angkatan')";
    $conn->query($sql);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', alamat='$alamat', angkatan='$angkatan' WHERE id='$id'";
    $conn->query($sql);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM mahasiswa WHERE id='$id'";
    $conn->query($sql);
}

$result = $conn->query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="mahasiswa.css">
</head>
<body>
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
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nim']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['angkatan']; ?></td>
                <td>
                    <a href="mahasiswa.php?edit=<?php echo $row['id']; ?>">Edit</a>
                    <a href="mahasiswa.php?delete=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <h2><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah'; ?> Mahasiswa</h2>
        <form action="mahasiswa.php" method="POST">
            <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
            <label>NIM:</label>
            <input type="text" name="nim" required><br>
            <label>Nama:</label>
            <input type="text" name="nama" required><br>
            <label>Alamat:</label>
            <input type="text" name="alamat" required><br>
            <label>Angkatan:</label>
            <input type="text" name="angkatan" required><br>
            <button type="submit" name="<?php echo isset($_GET['edit']) ? 'update' : 'add'; ?>">
                <?php echo isset($_GET['edit']) ? 'Update' : 'Add'; ?>
            </button>
        </form>

        <a href="home.php">Kembali ke Home</a>
    </div>
</body>
</html>

