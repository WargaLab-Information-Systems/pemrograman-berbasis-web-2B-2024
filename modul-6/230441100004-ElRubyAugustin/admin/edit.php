<?php
include 'koneksi.php';

//menangkap data yang dikirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$umur = $_POST['umur'];
$jeniskelamin = $_POST['jeniskelamin'];
$prodi = $_POST['prodi'];
$jurusan = $_POST['jurusan'];
$asalkota = $_POST['asalkota'];

//Mengganti dengan indeks baru
mysqli_query($koneksi,"UPDATE mahasiswa SET
Nama = '$nama',
Nim = '$nim',
Umur = '$umur',
Gender = '$jeniskelamin',
Prodi = '$prodi',
Jurusan = '$jurusan',
Asal = '$asalkota'
WHERE id = '$id'
");

header("location: form.php");
?>