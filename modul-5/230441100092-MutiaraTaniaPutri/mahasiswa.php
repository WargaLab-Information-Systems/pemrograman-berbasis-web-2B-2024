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
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #f8f8f8;
}

td a {
    color: #5cb85c;
}

td a:hover {
    text-decoration: underline;
}

form {
    margin: 20px 0;
}

label {
    display: inline-block;
    width: 100px;
    text-align: right;
}

input {
    margin: 5px 0;
    padding: 10px;
    width: calc(100% - 120px);
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 10px 20px;
    background-color: #5cb85c;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s;
    margin-left: 105px;
}

button:hover {
    background-color: #4cae4c;
}

a {
    text-decoration: none;
    color: #5cb85c;
    display: block;
    margin: 10px 0;
}

a:hover {
    text-decoration: underline;
}
    </style>
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