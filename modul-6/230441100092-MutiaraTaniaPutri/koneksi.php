<?php
$host = "localhost";
$user = "username";
$password = "password";
$database = "Data_Mahasiswa";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>