<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['Nama'];
    $nim = $_POST['NIM'];
    $umur = $_POST['Umur'];
    $jenis_kelamin = $_POST['Jenis_Kelamin'];
    $prodi = $_POST['Prodi'];
    $jurusan = $_POST['Jurusan'];
    $asal_kota = $_POST['Asal_kota'];
    mysqli_query($koneksi, "INSERT INTO mahasiswa (Nama, NIM, Umur, Jenis_kelamin, Prodi, Jurusan, Asal_kota) VALUES('$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')");
    header("location:datamhs.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            var nama = document.getElementById("Nama").value;
            var nim = document.getElementById("NIM").value;
            var umur = document.getElementById("Umur").value;
            var prodi = document.getElementById("Prodi").value;
            var jurusan = document.getElementById("Jurusan").value;
            var asal_kota = document.getElementById("Asal_kota").value;
            if (nama === "" || nim === "" || umur === "" || prodi === "" || jurusan === "" || asal_kota === "") {
                alert("Semua field harus diisi!");
                return false;
            }
        }
    </script>
</head>
<body>
    <center>
    <h2>Form Tambah Data Mahasiswa</h2>
    <form method="POST" action="" onsubmit="return validateForm()">
        <label>Nama:</label><br>
        <input type="text" id="Nama" name="Nama"><br>
        <label>NIM:</label><br>
        <input type="text" id="NIM" name="NIM"><br>
        <label>Umur:</label><br>
        <input type="text" id="Umur" name="Umur"><br>
        <label>Jenis Kelamin:</label><br>
        <input type="radio" name="Jenis_Kelamin" value="Laki-laki"> Laki-laki
        <input type="radio" name="Jenis_Kelamin" value="Perempuan"> Perempuan<br>
        <label>Prodi:</label><br>
        <input type="text" id="Prodi" name="Prodi"><br>
        <label>Jurusan:</label><br>
        <input type="text" id="Jurusan" name="Jurusan"><br>
        <label>Asal Kota:</label><br>
        <input type="text" id="Asal_kota" name="Asal_kota"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
