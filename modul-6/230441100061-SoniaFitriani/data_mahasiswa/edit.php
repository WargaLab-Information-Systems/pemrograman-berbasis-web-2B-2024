<!DOCTYPE html>
<html>
<head>
    <title>EDIT</title>
    <link rel="stylesheet" href="style3.css">
    <style>
        body {
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
            display: flex;
            background-image: url('UTM.jpg');
            background-position: center center;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Transparansi 80% */
            border-radius: 10px;
        }

        h2 {
            text-align: center;
        }

        form table {
            width: 100%;
        }

        form table tr td {
            padding: 10px 0;
        }

        form table tr td input[type="text"],
        form table tr td input[type="number"],
        form table tr td input[type="radio"] {
            width: calc(100% - 20px);
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        form table tr td input[type="submit"] {
            padding: 8px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        form table tr td input[type="submit"]:hover {
            background-color: #0056b3;
        }

        form table tr td a button {
            padding: 8px 20px;
            background-color: #ccc;
            color: #333;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
        }

        form table tr td a button:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>EDIT DATA MAHASISWA</h2>
        <?php
        include 'koneksi.php';
        $id = $_GET['id'];
        $data = mysqli_query($koneksi, "SELECT * FROM dtmaha WHERE id='$id'");
        $d = mysqli_fetch_array($data);

        if (!$d) {
            echo "Data tidak ditemukan.";
        } else {
        ?>
        <form method="post" action="">
            <table>
                <tr>            
                    <td>Nama</td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                        <input type="text" name="NAMA" value="<?php echo $d['NAMA']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td><input type="number" name="NIM" value="<?php echo $d['NIM']; ?>"></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td><input type="number" name="Umur" value="<?php echo $d['Umur']; ?>"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <input type="radio" name="Jenis_Kelamin" value="Laki-laki" <?php if ($d['Jenis_Kelamin'] == 'Laki-laki') echo 'checked'; ?>> Laki-laki
                        <input type="radio" name="Jenis_Kelamin" value="Perempuan" <?php if ($d['Jenis_Kelamin'] == 'Perempuan') echo 'checked'; ?>> Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td><input type="text" name="Prodi" value="<?php echo $d['Prodi']; ?>"></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td><input type="text" name="Jurusan" value="<?php echo $d['Jurusan']; ?>"></td>
                </tr>
                <tr>
                    <td>Asal Kota</td>
                    <td><input type="text" name="Asal_Kota" value="<?php echo $d['Asal_Kota']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="update" value="SIMPAN"></td>
                </tr>       
            </table>
            <a href="datamhs.php"><button type="button">KEMBALI</button></a>
        </form>
        <?php 
        }
        ?>
    </div>
</body>
</html>
