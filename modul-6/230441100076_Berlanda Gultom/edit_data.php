<?php
    $koneksi = mysqli_connect("localhost", "root", "", "modul6");
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Pastikan variabel $data terdefinisi sebelum digunakan
    $data = array('nim' => '', 'nama' => '', 'umur' => '', 'jenis_kelamin' => '', 'jurusan' => '', 'asal_kota' => '');

    if (isset($_GET['nim'])) {
        $nim = $_GET['nim'];
        $query = mysqli_query($koneksi, "SELECT * FROM data_mhs WHERE nim='$nim'");
        $data = mysqli_fetch_array($query);
    }

    if (isset($_POST['update'])) {
        $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $umur = mysqli_real_escape_string($koneksi, $_POST['umur']);
        $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
        $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
        $asal_kota = mysqli_real_escape_string($koneksi, $_POST['asal_kota']);
        
        $query = "UPDATE data_mhs SET nama='$nama', umur='$umur', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan', asal_kota='$asal_kota' WHERE nim='$nim'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "Data berhasil diupdate.";
            // Redirect ke halaman tampil_data.php setelah update berhasil
            header("Location: tampil_data.php?updated=true");
            exit; // Pastikan untuk keluar dari skrip setelah mengarahkan pengguna
        } else {
            echo "Data gagal diupdate: " . mysqli_error($koneksi);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <center>
        <h1>Edit Data Mahasiswa</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td>NIM</td>
                    <!-- Hapus atribut readonly untuk memungkinkan pengeditan NIM -->
                    <td><input type="text" placeholder="NIM" name="nim" value="<?php echo $data['nim']; ?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" placeholder="Nama" name="nama" value="<?php echo $data['nama']; ?>" required></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td><input type="number" placeholder="Umur" name="umur" value="<?php echo $data['umur']; ?>" required></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><input type="text" placeholder="Jenis Kelamin" name="jenis_kelamin" value="<?php echo $data['jenis_kelamin']; ?>" required></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td><input type="text" placeholder="Jurusan" name="jurusan" value="<?php echo $data['jurusan']; ?>" required></td>
                </tr>
                <tr>
                    <td>Asal Kota</td>
                    <td><input type="text" placeholder="Asal Kota" name="asal_kota" value="<?php echo $data['asal_kota']; ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" name="update">Update</button></td>
                </tr>
            </table>
        </form>
        <br>
        <a href="tampil_data.php">Kembali ke Tampil Data</a>
    </center>
</body>
</html>
