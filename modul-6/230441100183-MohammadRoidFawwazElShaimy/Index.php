<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:silver;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include "Koneksi.php";

        $query = "SELECT * FROM `data_mahasiswa`";
        $hasil = mysqli_query($connect, $query);

        echo "<h2>Data Mahasiswa</h2>";
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nama</th>";
        echo "<th>NIM</th>";
        echo "<th>Umur</th>";
        echo "<th>Jenis Kelamin</th>";
        echo "<th>Prodi</th>";
        echo "<th>Jurusan</th>";
        echo "<th>Asal Kota</th>";
        echo "<th>Action</th>";
        echo "</tr>";

        while ($data = mysqli_fetch_array($hasil)) {
            echo "<tr>";
            echo "<td>{$data['id']}</td>";
            echo "<td>{$data['Nama']}</td>";
            echo "<td>{$data['Nim']}</td>";
            echo "<td>{$data['Umur']}</td>";
            echo "<td>{$data['Jenis-Kelamin']}</td>";
            echo "<td>{$data['Prodi']}</td>";
            echo "<td>{$data['Jurusan']}</td>";
            echo "<td>{$data['Asal-Kota']}</td>";
            echo "<td><a href='Edit.php?id={$data['id']}'>Edit</a> | <a href='Hapus.php?id={$data['id']}'>Hapus</a></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<a href='Tambah.php'>Tambah Data</a><br>";
        ?>
    </div>
</body>
</html>