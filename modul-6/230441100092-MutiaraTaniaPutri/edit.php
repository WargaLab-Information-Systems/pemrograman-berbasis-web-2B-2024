<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM mahasiswa WHERE id = $