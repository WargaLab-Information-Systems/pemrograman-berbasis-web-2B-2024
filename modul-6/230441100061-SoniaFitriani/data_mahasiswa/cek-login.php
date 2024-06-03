        <?php
        session_start();
        include 'koneksi.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
            $cek = mysqli_num_rows($query);

            if ($cek > 0) {
                $_SESSION['username'] = $username;
                $_SESSION['status'] = "login";
                header("location: datamhs.php");
            } else {
                header("location: index.php?pesan=gagal");
            }
        } 
        ?>
