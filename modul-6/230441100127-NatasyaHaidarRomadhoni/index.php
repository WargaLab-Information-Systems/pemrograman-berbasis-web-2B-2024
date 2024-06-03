<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Data Mahasiswa</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Prodi</th>
                <th>Jurusan</th>
                <th>Asal Kota</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM mahasiswa";
            $result = mysqli_query($conn, $query); 
            // memeriksa apakah ada baris data yang dikembalikan oleh query.
            if (mysqli_num_rows($result) > 0) { 
                // mengambil setiap baris data sebagai array 
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['umur']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['prodi']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['jurusan']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['asal_kota']) . "</td>";
                    echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this?\")'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No data available</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="input.php">Tambah Data Baru</a>
</div>
</body>
</html>
