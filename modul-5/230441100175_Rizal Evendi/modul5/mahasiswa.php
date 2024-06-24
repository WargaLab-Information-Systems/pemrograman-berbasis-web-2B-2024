<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Inisialisasi array mahasiswa jika belum ada
if (!isset($_SESSION['mahasiswa'])) {
    $_SESSION['mahasiswa'] = array();
}

// Proses CRUD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'insert') {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $angkatan = $_POST['angkatan'];
        $_SESSION['mahasiswa'][] = array('nim' => $nim, 'nama' => $nama, 'alamat' => $alamat, 'angkatan' => $angkatan);

        // Redirect ke halaman data mahasiswa setelah penambahan data berhasil
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } elseif ($action == 'update') {
        $index = $_POST['index'];
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $angkatan = $_POST['angkatan'];
        $_SESSION['mahasiswa'][$index] = array('nim' => $nim, 'nama' => $nama, 'alamat' => $alamat, 'angkatan' => $angkatan);
    } elseif ($action == 'delete') {
        $index = $_POST['index'];
        unset($_SESSION['mahasiswa'][$index]);
        $_SESSION['mahasiswa'] = array_values($_SESSION['mahasiswa']);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
  <link rel="stylesheet" href="stylemahasiswa.css">
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Angkatan</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($_SESSION['mahasiswa'] as $index => $mhs): ?>
            <tr>
                <td><?php echo $mhs['nim']; ?></td>
                <td><?php echo $mhs['nama']; ?></td>
                <td><?php echo $mhs['alamat']; ?></td>
                <td><?php echo $mhs['angkatan']; ?></td>
                <td>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: inline;">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                        <input type="text" name="nim" value="<?php echo $mhs['nim']; ?>" required>
                        <input type="text" name="nama" value="<?php echo $mhs['nama']; ?>" required>
                        <input type="text" name="alamat" value="<?php echo $mhs['alamat']; ?>" required>
                        <input type="text" name="angkatan" value="<?php echo $mhs['angkatan']; ?>" required>
                        <input type="submit" value="Update">
                    </form>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: inline;">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Tambah Data Mahasiswa</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
        <input type="hidden" name="action" value="insert">
        <input type="text" name="nim" placeholder="NIM" required>
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="alamat" placeholder="Alamat" required>
        <input type="text" name="angkatan" placeholder="Angkatan" required>
        <input type="submit" value="Tambah">
    </form>

    <a href="home.php">Kembali ke Home</a>
    <a href="logout.php">Logout</a>
</body>
</html>