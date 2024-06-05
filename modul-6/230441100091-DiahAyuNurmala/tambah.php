<?php

        include 'koneksi.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Proses form tambah data
            $nama = $_POST['Nama'];
            $nim = $_POST['NIM'];
            $umur = $_POST['Umur'];
            $jenis_kelamin = $_POST['Jenis_Kelamin'];
            $prodi = $_POST['Prodi'];
            $jurusan = $_POST['Jurusan'];
            $asal_kota = $_POST['Asal_Kota'];

            mysqli_query($koneksi, "INSERT INTO mahasiswa (Nama, NIM, Umur, Jenis_kelamin, Prodi, Jurusan, Asal_Kota) VALUES ('$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')");

            header("location:index.php");
            exit();
        }
        ?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="tambah.css">
</head>
<body>
    <div class="container">
        <h2 align="center">Form Tambah Data Mahasiswa</h2>
        <div class="container-form">
        <form method="POST" action="">
            <table align="center">
            <tr>
                <td><label for="Nama">Nama :</label></td>
                <td><input type="text" name="Nama" required></td>
            </tr>
            <tr>
                <td><label for="NIM">NIM :</label></td>
                <td><input type="text" name="NIM" required></td>
            </tr>
            <tr>
                <td><label for="Umur">Umur : </label></td>
                <td><input type="text" name="Umur" required></td>
            </tr>
            <tr>
                <td><label>Jenis Kelamin:</label></td>
                <td required>
                    <input type="radio" name="Jenis_Kelamin" value="Laki-laki"> Laki-laki
                    <input type="radio" name="Jenis_Kelamin" value="Perempuan"> Perempuan
                </td>
            </tr>
            <tr>
                <td><label for="Prodi">Prodi :</label></td>
                <td><input type="text" name="Prodi" required></td>
            </tr>
            <tr>
                <td><label for="Jurusan">Jurusan :</label></td>
                <td><input type="text" name="Jurusan" required></td>
            </tr>
            <tr>
                <td><label for="Asal_Kota">Asal Kota :</label></td>
                <td><input type="text" name="Asal_Kota" required></td>
            </tr>
            <tr>
                <td align="center"><input type="submit" value="SIMPAN" class="hover-btn"></td>
                <td colspan="2" align="center"><a href="index.php" type="cancel" class="cancel-btn">BATAL</a></td>            
            </tr>
            </table>
        </form>
        </div>
    </div>
</body>
</html>