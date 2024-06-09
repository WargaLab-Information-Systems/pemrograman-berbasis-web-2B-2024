<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <!-- Tautkan file CSS -->
    <link rel="stylesheet" href="tampil_data.css">
</head>
<body>
    <center>
    <?php
        $koneksi=mysqli_connect("localhost","root","","modul6");
        if(!$koneksi){
            die("Koneksi gagal: ".mysqli_connect_error());
        }

        $query = "SELECT * FROM data_mhs";
        $result = mysqli_query($koneksi, $query);

        if(mysqli_num_rows($result) > 0){
            echo "<table border='1'>";
            echo "<tr><th>NIM</th><th>Nama</th><th>Umur</th><th>Jenis Kelamin</th><th>Jurusan</th><th>Asal Kota</th><th>Aksi</th></tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['nim']."</td>";
                echo "<td>".$row['nama']."</td>";
                echo "<td>".$row['umur']."</td>";
                echo "<td>".$row['jenis_kelamin']."</td>";
                echo "<td>".$row['jurusan']."</td>";
                echo "<td>".$row['asal_kota']."</td>";
                // Hapus tautan Edit
                echo "<td><a href='edit_data.php?nim=".$row['nim']."'>Edit Data</a> | <a href='hapus.php?nim=".$row['nim']."'>Hapus</a></td>";
                echo "</tr>";
            }
            
            echo "</table>";
            // Tambahkan tautan ke halaman edit_data.php
            echo "<br><a href='index.php'>Tambah Data</a>";
        }else{
            echo "Tidak ada data";
            echo "<br><a href='index.php'>Tambah Data</a>";
        }

        mysqli_close($koneksi);
    ?>
</center>    
</body>
</html>
