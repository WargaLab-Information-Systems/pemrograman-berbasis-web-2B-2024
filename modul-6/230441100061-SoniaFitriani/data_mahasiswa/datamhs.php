<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="data.css">
</head>
<style>
    body {
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
    display: flex;
    background-image: url('UTM.jpg');
    background-position: center center, top left, bottom right;
    background-size: cover;
}
</style>
<body>
<div class="content">
    <h2>DATA MAHASISWA</h2>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Umur</th>
            <th>Jenis kelamin</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Asal kota</th>
            <th>Aksi</th>
        </tr>
        <?php 
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi,"select * from dtmaha");
        if (!$data) {
            // Jika terjadi kesalahan dalam eksekusi query, tampilkan pesan kesalahan
            echo "Error: " . mysqli_error($koneksi);
        } else {
            // Jika query berhasil dieksekusi, lanjutkan dengan menampilkan data
            while($d = mysqli_fetch_array($data)){
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['NAMA']; ?></td>
                <td><?php echo $d['NIM']; ?></td>
                <td><?php echo $d['Umur']; ?></td>
                <td><?php echo $d['Jenis_Kelamin']; ?></td>
                <td><?php echo $d['Prodi']; ?></td>
                <td><?php echo $d['Jurusan']; ?></td>
                <td><?php echo $d['Asal_Kota']; ?></td>
                <td>
                    <button onclick="editFunction(<?php echo $d['id']; ?>)">EDIT</button>
                    <button onclick="hapusFunction(<?php echo $d['id']; ?>)">HAPUS</button>
                </td>
            </tr>
        <?php 
            }
        }
        ?>
    </table><br>
    <button onclick="tambahFunction()">TAMBAH DATA MAHASISWA</button>
    <button><a href="logout.php">LOGOUT</a></button>

    <script>
        function editFunction(id) {
            window.location.href = "edit.php?id=" + id;
        }

        function hapusFunction(id) {
            window.location.href = "hapus.php?id=" + id;
        }

        function tambahFunction() {
            window.location.href = "tambah.php";
        }
    </script>
</body>
</html>
