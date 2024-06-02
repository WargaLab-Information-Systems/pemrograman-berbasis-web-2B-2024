<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$databasename = 'db_mahasiswa';
$koneksi = mysqli_connect($servername,$username,$password,$databasename);

// ketika tombol hapus dipencet dihalaman tampilan
if(isset($_GET["id"]) && isset($_GET["konfirmasi"]) && $_GET["konfirmasi"] === "halodarihapus") {
    $id = $_GET["id"];
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = '$id'");
    echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href = 'tampilan.php';
        </script>
    ";
} else {
    header("Location: tampilan.php");
    exit;
}
?>