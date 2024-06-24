<?php
include_once "Koneksi.php";

$id = $_POST["id"];
$nama = $_POST["Nama"];
$nim = $_POST["Nim"];
$umur = $_POST["Umur"];
$jk = $_POST["Jenis-Kelamin"];
$prodi = $_POST["Prodi"];
$jurusan = $_POST["Jurusan"];
$alamat = $_POST["Asal-Kota"];

mysqli_query($connect, "UPDATE `data_mahasiswa` SET Nama='$nama', Nim='$nim', Umur='$umur', `Jenis-Kelamin`='$jk', Prodi='$prodi', Jurusan='$jurusan', `Asal-Kota`='$alamat' WHERE id=$id");

header("Location: Index.php");
?>