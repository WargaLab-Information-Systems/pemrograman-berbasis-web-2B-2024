<?php
session_start();

// Periksa apakah sesi berhasil diatur atau tidak
if (!isset($_SESSION['berhasil']) || $_SESSION['berhasil'] !== true) {
    header("Location: login1.php");
    exit;
}

$students = isset($_SESSION['students']) ? $_SESSION['students'] : array();
$student = array();
$button_name = isset($_SESSION['edit_student_id']) ? 'edit' : 'tambah';

// Tambah Data Mahasiswa
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    // Temukan ID terakhir
    $lastID = empty($students) ? 0 : end($students)['id'];
    $newStudent = array(
        "id" => $lastID + 1,
        "nim" => $nim,
        "nama" => $nama,
        "jurusan" => $jurusan,
        "alamat" => $alamat,
        "angkatan" => $angkatan
    );
    array_push($students, $newStudent);
    $_SESSION['students'] = $students;
}

// Tombol Edit ditekan
if (isset($_POST['edit_button'])) {
    $id = $_POST['id'];
    $_SESSION['edit_student_id'] = $id;
    header("Location: halaman2.php");
    exit;
}

// Tombol Simpan Perubahan ditekan
if (isset($_POST['edit']) && isset($_POST['nama']) && isset($_POST['jurusan']) && isset($_POST['nim']) && isset($_POST['alamat']) && isset($_POST['angkatan'])) {
    $id = $_SESSION['edit_student_id'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    $studentKey = array_search($id, array_column($students, 'id'));
    if ($studentKey !== false) {
        // Ubah data mahasiswa
        $students[$studentKey]['nama'] = $nama;
        $students[$studentKey]['jurusan'] = $jurusan;
        $students[$studentKey]['nim'] = $nim;
        $students[$studentKey]['alamat'] = $alamat;
        $students[$studentKey]['angkatan'] = $angkatan;
        $_SESSION['students'] = $students;
        $student = array();
    }
    unset($_SESSION['edit_student_id']); // Hapus ID mahasiswa yang disimpan di sesi
}

// Hapus Data Mahasiswa
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $studentKey = array_search($id, array_column($students, 'id'));
    if ($studentKey !== false) {
        unset($students[$studentKey]);
        // Setel ulang nomor urut
        $students = array_values($students);
        $_SESSION['students'] = $students;
    }
}

// Tentukan data mahasiswa yang akan diedit
if (isset($_SESSION['edit_student_id'])) {
    $editID = $_SESSION['edit_student_id'];
    foreach ($students as $s) {
        if ($s['id'] == $editID) {
            $student = $s;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<nav>
    <div class="navbar" style="display: flex;">
        <a href="halaman1.php">Home</a>
        <a href="halaman2.php">Data Mahasiswa</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>
<h1>Data Mahasiswa</h1>
<h2><?php echo isset($_SESSION['edit_student_id']) ? 'Edit Mahasiswa' : 'Tambah Mahasiswa'; ?></h2>
<form action="halaman2.php" method="post" class="container">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama" value="<?php echo isset($student['nama']) ? $student['nama'] : ''; ?>" required><br>
    <label for="jurusan">Jurusan:</label><br>
    <input type="text" id="jurusan" name="jurusan" value="<?php echo isset($student['jurusan']) ? $student['jurusan'] : ''; ?>" required><br>
    <label for="nim">NIM:</label><br>
    <input type="text" id="nim" name="nim" value="<?php echo isset($student['nim']) ? $student['nim'] : ''; ?>" required><br>
    <label for="alamat">Alamat:</label><br>
    <input type="text" id="alamat" name="alamat" value="<?php echo isset($student['alamat']) ? $student['alamat'] : ''; ?>" required><br>
    <label for="angkatan">Angkatan:</label><br>
    <input type="text" id="angkatan" name="angkatan" value="<?php echo isset($student['angkatan']) ? $student['angkatan'] : ''; ?>" required><br><br>
    <input type="submit" name="<?php echo isset($_SESSION['edit_student_id']) ? 'edit' : 'tambah'; ?>" value="<?php echo isset($_SESSION['edit_student_id']) ? 'Simpan Perubahan' : 'Tambah'; ?>" class="button">
    <?php if (isset($_SESSION['edit_student_id'])) : ?>
        <button class="edit"><a href="halaman2.php">Batal Edit</a></button>
    <?php endif; ?>
</form>
<table>
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Alamat</th>
        <th>Angkatan</th>
        <th>Ubah</th>
    </tr>
    <?php foreach ($students as $student) : ?>
        <tr>
            <td><?php echo $student['nim']; ?></td>
            <td><?php echo $student['nama']; ?></td>
            <td><?php echo $student['jurusan']; ?></td>
            <td><?php echo $student['alamat']; ?></td>
            <td><?php echo $student['angkatan']; ?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                    <button type="submit" name="edit_button">Edit</button>
                </form>
                <form action="?action=delete&id=<?php echo $student['id']; ?>" method="post">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
