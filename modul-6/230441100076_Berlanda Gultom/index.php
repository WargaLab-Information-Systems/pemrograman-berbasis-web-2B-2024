<?php
    $koneksi = mysqli_connect("localhost", "root", "", "modul6");
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    if (isset($_POST['tambah'])) {
        $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $umur = mysqli_real_escape_string($koneksi, $_POST['umur']);
        $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
        $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
        $asal_kota = mysqli_real_escape_string($koneksi, $_POST['asal_kota']);

        $query = "INSERT INTO data_mhs (nim, nama, umur, jenis_kelamin, jurusan, asal_kota) VALUES ('$nim', '$nama', '$umur', '$jenis_kelamin', '$jurusan', '$asal_kota')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Redirect ke halaman tampil_data.php
            header("Location: tampil_data.php");
            exit; // Pastikan kode setelah header() tidak dijalankan
        } else {
            echo "Data gagal ditambahkan: " . mysqli_error($koneksi);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <center>
        <h1>Tambah Data Mahasiswa</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Nim</td>
                    <td>
                        <input type="text" placeholder="Nim" name="nim" required>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="text" placeholder="Nama" name="nama" required>
                    </td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>
                        <input type="number" placeholder="Umur" maxlength="4" name="umur" required>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <input type="text" placeholder="Jenis Kelamin" name="jenis_kelamin" required>
                    </td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>
                        <input type="text" placeholder="Jurusan" name="jurusan" required>
                    </td>
                </tr>
                <tr>
                    <td>Asal Kota</td>
                    <td>
                        <input type="text" placeholder="Asal Kota" name="asal_kota" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="tambah">Tambah</button>
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <a href="tampil_data.php">Kembali ke Tampil Data</a>
    </center>
</body>
</html>
