<?php
include 'koneksi.php';
$nama = $_POST['Nama'];
$nim = $_POST['NIM'];
$umur = $_POST['Umur'];
$jenis_kelamin = $_POST['Jenis_Kelamin'];
$prodi = $_POST['Prodi'];
$jurusan = $_POST['Jurusan'];
$asal_kota = $_POST['Asal_kota'];
 
mysqli_query($koneksi, "INSERT INTO dbmahasiswa (Nama, NIM, Umur, Jenis_kelamin, Prodi, Jurusan, Asal_kota) VALUES('$nama', '$nim' , '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')");

header("location:datamhs.php");
?>