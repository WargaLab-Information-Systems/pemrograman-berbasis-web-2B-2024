<?php
    include 'koneksi.php';
    $id = $_GET['id']; 
    $sql = "DELETE FROM mahasiswaa WHERE id = '$id'";
    mysqli_query($conn,$sql);
    header('Location: index.php');
    exit;
?>
