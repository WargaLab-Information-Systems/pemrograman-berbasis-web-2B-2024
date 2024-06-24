<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$error_message = '';

function getMahasiswa() {
    global $conn;
    $query = "SELECT * FROM mahasiswa";
    $result = $conn->query($query);
    return $result;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    $insert_query = "INSERT INTO mahasiswa (nim, nama, alamat, angkatan) VALUES ('$nim', '$nama', '$alamat', '$angkatan')";
    if ($conn->query($insert_query) === TRUE) {
        header("Location: mahasiswa.php");
        exit();
    } else {
        $error_message = "Terjadi kesalahan saat menambahkan data mahasiswa.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'hapus') {
    $id = $_GET['id'];

    $delete_query = "DELETE FROM mahasiswa WHERE id='$id'";
    if ($conn->query($delete_query) === TRUE) {
        header("Location: mahasiswa.php");
        exit();
    } else {
        $error_message = "Terjadi kesalahan saat menghapus data mahasiswa.";
    }
}

$mahasiswas = getMahasiswa();

if (!empty($error_message)) {
    echo "<p>$error_message</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="asset/style.css">
</head>
<body>
    <div class="container-mhs">
        <div class="mhs-cont">
            <h2>Data Mahasiswa</h2>
            <form method="post">
                <input type="text" name="nim" placeholder="NIM" required>
                <input type="text" name="nama" placeholder="Nama" required>
                <input type="text" name="alamat" placeholder="Alamat" required>
                <input type="text" name="angkatan" placeholder="Angkatan" required>
                <button type="submit" name="tambah">Tambah</button>
            </form>

            <table>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Angkatan</th>
                    <th>Aksi</th>
                </tr>
                <?php
                if ($mahasiswas->num_rows > 0) {
                    while($row = $mahasiswas->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nim'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td>" . $row['angkatan'] . "</td>";
                        echo "<td>
                                <a href='mahasiswa.php?action=hapus&id=" . $row['id'] . "'>Hapus</a> | 
                                <a href='update_mahasiswa.php?id=" . $row['id'] . "'>Update</a>
                             </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data mahasiswa.</td></tr>";
                }
                ?>
            </table>

            <div class="logout-link">
                <p><a href="logout.php">Logout</a></p>
            </div>
        </div>
    </div>
</body>
</html>
