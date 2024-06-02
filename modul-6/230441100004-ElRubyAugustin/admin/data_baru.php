<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
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

        .container {
            margin-top: 50px;
            width: 50%; 
            margin-left: auto;
            margin-right: auto; 
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 20px; 
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
        }

        h2, h3 {
            margin-bottom: 20px; 
        }

        table {
            width: 100%; 
        }

        td {
            padding: 10px; 
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 20px);
            padding: 8px; 
            margin-bottom: 10px; 
        }

        input[type="submit"] {
            background-color: #007bff; 
            color: #fff;
            padding: 10px 20px; 
            border: none;
            cursor: pointer;
            border-radius: 20px; 
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
<body>
    <div class =  "container">
    <h2>TAMBAHKAN DATA BARU</h2>
    <br/>

    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi,"select * from mahasiswa where id = '$id'");
    while($d = mysqli_fetch_array($data)){
    ?>
    <form method="post" action="edit.php">
        <table>
            <tr>
                <td>NAMA</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $d['id'];?>">
                    <input type="text" name="nama" value="<?php echo $d['Nama'];?>">
                </td>
            </tr>

            <tr>
                <td>NIM</td>
                <td><input type="number" name="nim" value="<?php echo $d['Nim'];?>"></td>
            </tr>

            <tr>
                <td>Umur</td>
                <td><input type="number" name="umur" value="<?php echo $d['Umur'];?>"></td>
            </tr>

            <tr>
                <td>GENDER</td>
                <td><input type="text" name="jeniskelamin" value="<?php echo $d['Gender'];?>"></td>
            </tr>

            <tr>
                <td>PRODI</td>
                <td><input type="text" name="prodi" value="<?php echo $d['Prodi'];?>"></td>
            </tr>

            <tr>
                <td>JURUSAN</td>
                <td><input type="text" name="jurusan" value="<?php echo $d['Jurusan'];?>"></td>
            </tr>

            <tr>
                <td>ASAL</td>
                <td><input type="text" name="asalkota" value="<?php echo $d['Asal'];?>"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="SUBMIT"></td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>
    </div>
</body>
</html>
