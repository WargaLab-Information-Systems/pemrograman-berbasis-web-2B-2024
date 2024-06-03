<?php
session_start();

// Hapus semua variabel sesi
session_unset();

// Hapus sesi
session_destroy();

// Redirect ke halaman login setelah logout berhasil
header("Location: index.php");
exit;
?>
