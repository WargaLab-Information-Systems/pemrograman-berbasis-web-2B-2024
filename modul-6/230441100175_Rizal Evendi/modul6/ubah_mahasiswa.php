<!-- ubah_mahasiswa.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Mahasiswa</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <h2 style="text-align: center;">Ubah Data Mahasiswa</h2>
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

    // Mengambil data mahasiswa yang akan diubah
    $id = $_GET["id"];
    $sql = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <form action="update_mahasiswa.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">

            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?php echo $row["nama"]; ?>" required>

            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" value="<?php echo $row["nim"]; ?>" required>

            <label for="umur">Umur</label>
            <input type="text" id="umur" name="umur" value="<?php echo $row["umur"]; ?>" required>

            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki" <?php if ($row["jenis_kelamin"] == "Laki-laki") echo "selected"; ?>>Laki-laki</option>
                <option value="Perempuan" <?php if ($row["jenis_kelamin"] == "Perempuan") echo "selected"; ?>>Perempuan</option>
            </select>

            <label for="prodi">Program Studi</label>
            <input type="text" id="prodi" name="prodi" value="<?php echo $row["prodi"]; ?>" required>

            <label for="jurusan">Jurusan</label>
            <input type="text" id="jurusan" name="jurusan" value="<?php echo $row["jurusan"]; ?>" required>

            <label for="asal_kota">Asal Kota</label>
            <input type="text" id="asal_kota" name="asal_kota" value="<?php echo $row["asal_kota"]; ?>" required>

            <input type="submit" value="Simpan Perubahan">
        </form>
        <?php
    } else {
        echo "Data mahasiswa tidak ditemukan.";
    }

    // Menutup koneksi
    $conn->close();
    ?>
</body>
</html>