<?php
include_once "Koneksi.php";
$nama =$_POST['Nama'];
$nim =$_POST['Nim'];
$umur =$_POST['Umur'];
$jk =$_POST['Jenis-Kelamin'];
$prodi =$_POST['Prodi'];
$jurusan =$_POST['Jurusan'];
$alamat =$_POST['Asal-Kota'];
$result = mysqli_query($connect, "INSERT INTO `data_mahasiswa`(Nama,Nim,Umur,`Jenis-Kelamin`,Prodi,Jurusan,`Asal-Kota`) VALUES ('$nama',
'$nim', '$umur', '$jk', '$prodi', '$jurusan', '$alamat')");
header("Location:Index.php");
?>