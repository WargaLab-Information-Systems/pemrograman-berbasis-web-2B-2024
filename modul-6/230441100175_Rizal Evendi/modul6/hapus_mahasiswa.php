<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Mahasiswa</title>
<link rel="stylesheet" href="style_hapus.css">
</head>
<body>
    <div class="container">
        <?php
        // Koneksi ke database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "katabase";
        $conn = new mysqli($servername, $username, $password, $database);

        // Memeriksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Mengambil id mahasiswa yang akan dihapus
        $id = $_GET["id"];

        // Menyiapkan query untuk menghapus data
        $sql = "DELETE FROM mahasiswa WHERE id = '$id'";

        // Menjalankan query
        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Data mahasiswa berhasil dihapus.</p>";
        } else {
            echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }

        // Menutup koneksi
        $conn->close(); 
        ?>

        <script>
            // Redirect ke halaman data_mahasiswa.php setelah 3 detik
            setTimeout(function() {
                window.location.href = "data_mahasiswa.php";
            }, 3000);
        </script>
    </div>
</body>
</html>