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

    // Cek jika form telah di submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $angkatan = $_POST['angkatan'];

        // Query untuk mengupdate data mahasiswa
        $query = "UPDATE mahasiswaa SET nama='$nama', alamat='$alamat', angkatan='$angkatan' WHERE nim='$nim'";
        $conn->query($query);

        // Redirect ke halaman index
        header('Location: index.php');
        exit;
    }

    // Query untuk menampilkan data mahasiswa berdasarkan id
    $id = $_GET['id'];
    $query = "SELECT * FROM mahasiswaa WHERE id='$id' ";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    ?>

<h1>Edit Mahasiswa</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="nim">NIM:</label>
    <input type="text" id="nim" name="nim" value="<?php echo $row['nim']; ?>"><br><br>
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>"><br><br>
    <label for="alamat">Alamat:</label>
    <input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>"><br><br>
    <label for="angkatan">Angkatan:</label>
    <input type="text" id="angkatan" name="angkatan" value="<?php echo $row['angkatan']; ?>"><br><br>
    <input type="submit" value="kirim">
</body>
</html>