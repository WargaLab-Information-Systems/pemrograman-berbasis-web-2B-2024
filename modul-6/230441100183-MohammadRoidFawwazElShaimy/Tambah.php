<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
        }
        form {
            margin: 5px;
            padding: 10px;
        }
        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="radio"]{
            margin: 5px 0;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 5px;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Data</h1>
        <form action="Proses.php" method="POST" name="input">
            Nama : <input type="text" name="Nama"><br>
            Nim : <input type="number" name="Nim"><br>
            Umur : <input type="number" name="Umur"><br>
            Jenis Kelamin : 
            <input type="radio" name="Jenis-Kelamin" value="laki-laki"> Laki-laki
            <input type="radio" name="Jenis-Kelamin" value="perempuan"> Perempuan<br>
            <br>
            Prodi : <input type="text" name="Prodi"><br>
            Jurusan : <input type="text" name="Jurusan"><br>
            Alamat : <input type="text" name="Asal-Kota"><br>
            <input type="submit" value="Tambah">
            <a href="Index.php">Batal</a>
        </form>
    </div>
</body>
</html>