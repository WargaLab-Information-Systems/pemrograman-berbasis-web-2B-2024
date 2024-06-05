<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<style>
        body {
            background-image: url('bg.jpg');
            width: 100%;
            height: 90vh;
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #ccc;
        }
        a {
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #333;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            margin-right: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }

        .logout {
            margin-top: 500px;
            padding-bottom: auto;
        }
    </style>
<body>
<h2>DATA MAHASISWA</h2>
    <br/>
    <a href="tambah.php">+ TAMBAH MAHASISWA</a>
    <br/>
    <br/>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Umur</th>
            <th>Gender</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Asal</th>
            <th>Aksi</th>
        </tr>
        <?php 
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi,"select * from mahasiswa");
        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['Nama']; ?></td>
                <td><?php echo $d['Nim']; ?></td>
                <td><?php echo $d['Umur']; ?></td>
                <td><?php echo $d['Gender']; ?></td>
                <td><?php echo $d['Prodi']; ?></td>
                <td><?php echo $d['Jurusan']; ?></td>
                <td><?php echo $d['Asal']; ?></td>
                <td>
                    <a href="data_baru.php?id=<?php echo $d['id']; ?>">EDIT</a>
                    <a href="delete.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                </td>
            </tr>
            <?php 
        }
        ?>
    </table>
    <div class = "logout">
    <a href="logout.php">LOG OUT</a>
    </div>
</body>
</html>