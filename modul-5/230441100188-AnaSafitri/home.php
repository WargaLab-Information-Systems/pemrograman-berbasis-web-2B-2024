<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


if (isset($_GET['login']) && $_GET['login'] == 'success') {
    echo "<p>Selamat datang, " . $_SESSION['username'] . "!</p>";
}
?>
