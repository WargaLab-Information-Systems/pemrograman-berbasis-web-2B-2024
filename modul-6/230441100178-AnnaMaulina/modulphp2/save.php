<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpan Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .success-message {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .error-message {
            color: #f44336;
            margin-bottom: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include 'koneksi.php';

        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $umur = $_POST['umur'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $prodi = $_POST['prodi'];
        $jurusan = $_POST['jurusan'];
        $asal_kota = $_POST['asal_kota'];

        $sql = "INSERT INTO mhs (nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota) VALUES ('$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='success-message'>Data mahasiswa berhasil disimpan <br> <a href='show.php'>Lihat Data Mahasiswa</a></div>";
        } else {
            echo "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>