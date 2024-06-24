<?php
include "Koneksi.php";

$id=$_GET['id'];

mysqli_query($connect, "DELETE FROM `data_mahasiswa` where id=$id ");
header("Location:Index.php");
?>