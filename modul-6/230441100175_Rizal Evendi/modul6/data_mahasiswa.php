<!-- data_mahasiswa.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
   <link rel="stylesheet" href="mahasiswa.css">
</head>
<body>
    <h2 style="text-align: center;">Data Mahasiswa</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Program Studi</th>
            <th>Jurusan</th>
            <th>Asal Kota</th>
            <th>Aksi</th>
        </tr>
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

        // Mengambil data dari database
        $sql = "SELECT * FROM mahasiswa";
        $result = $conn->query($sql);

        // Menampilkan data dalam tabel
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["nim"] . "</td>";
                echo "<td>" . $row["umur"] . "</td>";
                echo "<td>" . $row["jenis_kelamin"] . "</td>";
                echo "<td>" . $row["prodi"] . "</td>";
                echo "<td>" . $row["jurusan"] . "</td>";
                echo "<td>" . $row["asal_kota"] . "</td>";
                echo "<td>
                        <a href='ubah_mahasiswa.php?id=" . $row["id"] . "'>Ubah</a>
                        <a href='hapus_mahasiswa.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Tidak ada data mahasiswa.</td></tr>";
        }

        // Menutup koneksi
        $conn->close();
        ?>
    </table>
    <a href="form_mahasiswa.php" class="btn-tambah">Tambah Data Mahasiswa</a>

    
</body>
</html>