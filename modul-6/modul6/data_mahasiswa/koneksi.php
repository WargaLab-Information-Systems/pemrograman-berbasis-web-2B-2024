<?php
$koneksi = mysqli_connect("localhost", "root", "1", "dbmahasiswa");

if (mysqli_connect_error()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
