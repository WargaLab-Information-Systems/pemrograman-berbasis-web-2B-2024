<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$umur = $_POST['umur'];
$jeniskelamin = $_POST['jeniskelamin'];
$prodi = $_POST['prodi'];
$jurusan = $_POST['jurusan'];
$asalkota = $_POST['asalkota'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into mahasiswa values('','$nama','$nim','$umur','$jeniskelamin','$prodi','$jurusan','$asalkota')");
 
// mengalihkan halaman kembali ke index.php
header("location: form.php");
 
?>