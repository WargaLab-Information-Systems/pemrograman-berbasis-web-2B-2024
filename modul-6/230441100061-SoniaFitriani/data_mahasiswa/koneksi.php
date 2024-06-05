<?php
$koneksi = mysqli_connect("localhost", "root", "", "datamahasiswa");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
