<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM mhs WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];

    $sql = "UPDATE mhs SET nama='$nama', nim='$nim', umur='$umur', jenis_kelamin='$jenis_kelamin', prodi='$prodi', jurusan='$jurusan', asal_kota='$asal_kota' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("location: show.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
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
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 0;
        }

        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }

        input[type="text"], input[type="submit"], select {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Mahasiswa</h2>
        <form method="post" action="">
            Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
            NIM: <input type="text" name="nim" value="<?php echo $row['nim']; ?>"><br>
            Umur: <input type="text" name="umur" value="<?php echo $row['umur']; ?>"><br>
            Jenis Kelamin:
            <select name="jenis_kelamin">
                <option value="Laki-laki" <?php if($row['jenis_kelamin'] == 'Laki-laki') echo 'selected="selected"'; ?>>Laki-laki</option>
                <option value="Perempuan" <?php if($row['jenis_kelamin'] == 'Perempuan') echo 'selected="selected"'; ?>>Perempuan</option>
            </select><br>
            Prodi: <input type="text" name="prodi" value="<?php echo $row['prodi']; ?>"><br>
            Jurusan: <input type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>"><br>
            Asal Kota: <input type="text" name="asal_kota" value="<?php echo $row['asal_kota']; ?>"><br>
            <input type="submit" value="Simpan" onclick="return confirmSimpan()">
        </form>
    </div>
    <script>
        function confirmSimpan() {
            return confirm("Apakah Anda yakin ingin menyimpan perubahan?");
        }
    </script>
</body>
</html>