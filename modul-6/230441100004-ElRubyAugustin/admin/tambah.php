<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            background-color: #fff; 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px; 
        }

        form {
            text-align: left;
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
            border-radius: 5px; 
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none; 
            color: #007bff;
            margin-top: 20px;
            display: block;
        }
    </style>
<body>
<div class="container">
    <h2>Tambah Data Mahasiswa</h2>
<br/>
<br/>
<form action="tambah_aksi.php" method = "POST">
    <table>
        <tr>
            <td>NAMA</td>
            <td><input type = "text" name = "nama"></td>
        </tr>

        <tr>
            <td>NIM</td>
            <td><input type = "number" name = "nim"></td>
        </tr>

        <tr>
            <td>UMUR</td>
            <td><input type = "number" name = "umur"></td>
        </tr>

        <tr>
            <td>GENDER</td>
            <td><input type = "text" name = "jeniskelamin"></td>
        </tr>

        <tr>
            <td>PRODI</td>
            <td><input type = "text" name = "prodi"></td>
        </tr>

        <tr>
            <td>JURUSAN</td>
            <td><input type = "text" name = "jurusan"></td>
        </tr>

        <tr>
            <td>ASAL</td>
            <td><input type = "text" name = "asalkota"></td>
        </tr>

        <tr>
            <td></td>
            <td><input type = "submit" value = "SIMPAN"></td>
        </tr>
    </table>
</form>

    </div>
</form>
</body>
</html>