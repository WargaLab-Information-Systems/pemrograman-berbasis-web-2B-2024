<?php
session_start();

// Redirect jika belum login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Fungsi untuk menyimpan data mahasiswa ke file JSON
function saveStudents($students) {
    file_put_contents('students.json', json_encode($students, JSON_PRETTY_PRINT));
}

// Fungsi untuk mengambil data mahasiswa dari file JSON
function getStudents() {
    if (!file_exists('students.json')) {
        return [];
    }
    return json_decode(file_get_contents('students.json'), true);
}

// Menangani CRUD mahasiswa
if (isset($_POST['action'])) {
    $students = getStudents();

    if ($_POST['action'] == 'Tambah') {
        $students[$_POST['nim']] = [
            'nama' => $_POST['nama'],
            'alamat' => $_POST['alamat'],
            'angkatan' => $_POST['angkatan']
        ];
        saveStudents($students);
    } elseif ($_POST['action'] == 'Edit') {
        $_SESSION['edit_nim'] = $_POST['nim'];
    } elseif ($_POST['action'] == 'Simpan') {
        $original_nim = $_POST['original_nim'];
        unset($students[$original_nim]);
        $students[$_POST['nim']] = [
            'nama' => $_POST['nama'],
            'alamat' => $_POST['alamat'],
            'angkatan' => $_POST['angkatan']
        ];
        saveStudents($students);
        unset($_SESSION['edit_nim']);
    } elseif ($_POST['action'] == 'Hapus') {
        unset($students[$_POST['nim']]);
        saveStudents($students);
    } elseif ($_POST['action'] == 'Batal') {
        unset($_SESSION['edit_nim']);
    }
}
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
    <div class="container">
        <div class="students">
            <h2>Data Mahasiswa</h2>
            <table>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Angkatan</th>
                    <th>Action</th>
                </tr>
                <?php $students = getStudents(); ?>
                <?php foreach ($students as $nim => $student): ?>
                <tr>
                    <td><?= $nim ?></td>
                    <td><?= $student['nama'] ?></td>
                    <td><?= $student['alamat'] ?></td>
                    <td><?= $student['angkatan'] ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="nim" value="<?= $nim ?>">
                            <input type="submit" name="action" value="Edit">
                            <input type="submit" name="action" value="Hapus">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <form method="post">
                <input type="hidden" name="original_nim" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['edit_nim'] : '' ?>">
                NIM: <input type="text" name="nim" value="<?= isset($_SESSION['edit_nim']) ? $_SESSION['edit_nim'] : '' ?>" required>
                Nama: <input type="text" name="nama" value="<?= isset($_SESSION['edit_nim']) ? $students[$_SESSION['edit_nim']]['nama'] : '' ?>" required>
                Alamat: <input type="text" name="alamat" value="<?= isset($_SESSION['edit_nim']) ? $students[$_SESSION['edit_nim']]['alamat'] : '' ?>" required>
                Angkatan: <input type="text" name="angkatan" value="<?= isset($_SESSION['edit_nim']) ? $students[$_SESSION['edit_nim']]['angkatan'] : '' ?>" required>
                <?php if (isset($_SESSION['edit_nim'])): ?>
                <input type="submit" name="action" value="Simpan">
                <input type="submit" name="action" value="Batal">
                <?php else: ?>
                <input type="submit" name="action" value="Tambah">
                <?php endif; ?>
            </form>
            <a href="home.php" class="button">Home</a>
            <a href="logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>
