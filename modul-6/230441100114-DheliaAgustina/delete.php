<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM mahasiswa WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header('Location: view.php');
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>
