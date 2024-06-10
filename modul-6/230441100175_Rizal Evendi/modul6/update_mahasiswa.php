<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbarui Data Mahasiswa</title>
   <link rel="stylesheet" href="style_update.css">
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

        // Mengambil data dari form
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $umur = $_POST["umur"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $prodi = $_POST["prodi"];
        $jurusan = $_POST["jurusan"];
        $asal_kota = $_POST["asal_kota"];

        // Menyiapkan query untuk memperbarui data
        $sql = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', umur = '$umur', jenis_kelamin = '$jenis_kelamin', prodi = '$prodi', jurusan = '$jurusan', asal_kota = '$asal_kota' WHERE id = '$id'";

        // Menjalankan query
        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Data mahasiswa berhasil diperbarui.</p>";
        } else {
            echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }

        // Menutup koneksi
        $conn->close();
        ?>

        <a href="data_mahasiswa.php" class="button">Lihat Data Mahasiswa</a>
    </div>
</body>
</html>