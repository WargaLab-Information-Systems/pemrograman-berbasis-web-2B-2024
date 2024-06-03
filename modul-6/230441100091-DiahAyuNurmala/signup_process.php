<?php
        include 'koneksi.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            if ($password != $confirm_password) {
                header("location: signup.php?pesan=password_tidak_cocok");
                exit;
            }
            $query = mysqli_query($koneksi, "INSERT INTO login (username, email, password) VALUES ('$username', '$email', '$password')");
            if ($query) {
                header("location: login.php?pesan=signup_sukses");
                exit;
            } else {
                header("location: signup.php?pesan=gagal");
                exit;
            }
        }
        ?>