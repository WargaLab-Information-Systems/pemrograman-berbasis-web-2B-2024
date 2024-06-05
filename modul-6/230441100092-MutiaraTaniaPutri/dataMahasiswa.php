<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table table-striped">
            <thead>
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
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM mahasiswa";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['nim'] . "</td>";
                        echo "<td>" . $row['umur'] . "</td>";
                        echo "<td>" . $row['jenis_kelamin'] . "</td>";
                        echo "<td>" . $row['prodi'] . "</td>";
                        echo "<td>" . $row['jurusan'] . "</td>";
                        echo "<td>" . $row['asal_kota'] . "</td>";
                        echo "<td>
                                  <a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a>
                                  <a href='hapus.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data mahasiswa</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>