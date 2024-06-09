<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = [
        ['nama' => 'Bima Surya', 'nim' => '23', 'alamat' => 'Bandung', 'angkatan' => '2023'],
        ['nama' => 'Seniora', 'nim' => '40', 'alamat' => 'Medan', 'angkatan' => '2022'],
        ['nama' => 'Alvaro', 'nim' => '78', 'alamat' => 'Surabaya', 'angkatan' => '2019'],
    ];
}

$data = $_SESSION['data'];

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $index = $_GET['index'];

    if ($action == 'update') {
        // Tampilkan form update data mahasiswa
        echo "<form action='?action=update_process&index=$index' method='POST'>";
        echo "Nama: <input type='text' name='nama' value='". $data[$index]['nama']. "'><br>";
        echo "Nim: <input type='text' name='nim' value='". $data[$index]['nim']. "'><br>";
        echo "Alamat: <input type='text' name='alamat' value='". $data[$index]['alamat']. "'><br>";
        echo "Angkatan: <input type='text' name='angkatan' value='". $data[$index]['angkatan']. "'><br>";
        echo "<button type='submit'>Update</button>";
        echo "</form>";
    } elseif ($action == 'update_process') {
        // Proses update data mahasiswa
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $alamat = $_POST['alamat'];
        $angkatan = $_POST['angkatan'];

        $data[$index] = ['nama' => $nama, 'nim' => $nim, 'alamat' => $alamat, 'angkatan' => $angkatan];

        $_SESSION['data'] = $data;

        header("Location: DataMahasiswa.php");
    } elseif ($action == 'delete') {
        // Hapus data mahasiswa
        unset($data[$index]);

        $_SESSION['data'] = $data;

        header("Location: DataMahasiswa.php");
    }
} elseif (isset($_POST['submit'])) {
    // Tambah data mahasiswa
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    $data[] = ['nama' => $nama, 'nim' => $nim, 'alamat' => $alamat, 'angkatan' => $angkatan];

    $_SESSION['data'] = $data;

    header("Location: DataMahasiswa.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="DM.css">
</head>
<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>
        <table border="1">
            <tr>
                <th>Nama</th>
                <th>Nim</th>
                <th>Alamat</th>
                <th>Angkatan</th>
                <th>Keterangan</th>
            </tr>
            <?php foreach ($data as $index => $row) {?>
                <tr>
                    <td><?= $row['nama']?></td>
                    <td><?= $row['nim']?></td>
                    <td><?= $row['alamat']?></td>
                    <td><?= $row['angkatan']?></td>
                    <td><a href="?action=update&index=<?= $index?>">Update</a> | <a href="?action=delete&index=<?= $index?>">Delete</a></td>
                </tr>
            <?php }?>
        </table>

        <h2>Tambah Data Mahasiswa</h2>
        <form action="" method="POST">
            Nama: <input type="text" name="nama" required><br>
            Nim: <input type="text" name="nim" required><br>
            Alamat: <input type="text" name="alamat" required><br>
            Angkatan: <input type="text" name="angkatan" required><br>
            <button type="submit" name="submit">Submit</button>
        </form>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>