<html>
    <head><title>Edit Data</title>
</head>
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
<body>

    <div class="container">
    <?php
    include "Koneksi.php";
    $id = $_GET['id'];
    $data = mysqli_query($connect, "SELECT * FROM `data_mahasiswa` where id=$id");
    $d=mysqli_fetch_array($data);
    ?>
    <h1>Edit Data</h1>

<form method="POST" action="EditProses.php" name="input">
    Nama : <input type="text" name="Nama" value="<?=$d['Nama']?>"> <br>
    Nim  : <input type="number" name="Nim" value="<?=$d['Nim']?>"> <br>
    Umur  : <input type="number" name="Umur" value="<?=$d['Umur']?>"> <br>
    Jenis Kelamin  : <input type="checkbox" name="Jenis-Kelamin" value="<?=$d['Jenis-Kelamin']?>">laki-laki
    <input type="checkbox" name="Jenis-Kelamin" value="<?=$d['Jenis-Kelamin']?>">perempuan <br>
    <br>
    Prodi  : <input type="text" name="Prodi" value="<?=$d['Prodi']?>"> <br>
    Jurusan  : <input type="text" name="Jurusan" value="<?=$d['Jurusan']?>"> <br>
    Alamat  : <input type="text" name="Asal-Kota" value="<?=$d['Asal-Kota']?>"> <br>
    <input type="hidden" name="id" value="<?=$d['id']?>">
    <input type="submit" value="Edit">
    <a href="Index.php">Batal</a>
</form>
</div>

</body>
</html>