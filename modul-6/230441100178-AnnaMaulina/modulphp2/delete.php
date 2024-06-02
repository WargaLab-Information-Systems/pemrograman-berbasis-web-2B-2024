<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM mhs WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("location: show.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>