<?php
include 'koneksi.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asalkota = $_POST['asalkota'];

    $sql = "INSERT INTO mahasiswa (nim, nama, umur, jeniskelamin, prodi, jurusan, asalkota) VALUES ('$nim', '$nama', '$umur', '$jeniskelamin', '$prodi', '$jurusan', '$asalkota')";
    if ($conn->query($sql) === TRUE) {
        echo "Data mahasiswa berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?> 
