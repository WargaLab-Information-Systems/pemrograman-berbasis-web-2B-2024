<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="datamhs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>

<body>
    <div class="container">
        <h2 align="center">DATA MAHASISWA</h2>
        <div class="container-button">
            <button><a href="index.php">
                    <h3>KEMBALI</h3>
                </a></button>
            <button><a href="tambah.php">
                    <h3 align="center">Tambah Mahasiswa</h3>
                </a></button></br>
        </div>
        <table class="tabel2" align="center"> </br>
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Umur</th>
                <th>Jenis kelamin</th>
                <th>Prodi</th>
                <th>Jurusan</th>
                <th>Asal Kota</th>
                <th>Ubah</th>
            </tr>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "select * from mahasiswa");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tr align="center">
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['Nama']; ?></td>
                    <td><?php echo $d['NIM']; ?></td>
                    <td><?php echo $d['Umur']; ?></td>
                    <td><?php echo $d['Jenis_Kelamin']; ?></td>
                    <td><?php echo $d['Prodi']; ?></td>
                    <td><?php echo $d['Jurusan']; ?></td>
                    <td><?php echo $d['Asal_Kota']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $d['id']; ?>"><i class="fas fa-edit"></i></a>
                        <a href="hapus.php?id=<?php echo $d['id']; ?>"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>



</html>