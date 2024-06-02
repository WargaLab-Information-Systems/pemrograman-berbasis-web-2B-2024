<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$databasename = 'db_mahasiswa';
$koneksi = mysqli_connect($servername,$username,$password,$databasename);

$result = mysqli_query($koneksi,"SELECT * FROM mahasiswa");

// alihkan ke login ketika belum set useername dan password
if(!isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
    header("Location: login.php");
    exit;
}

// ketika memaksa masuk ke halaman tampilan pada saat di halaman tambah/ubah
if(isset($_SESSION["tambah"])) {
    header("Location: tambah.php");
    exit;
}

// ketika tombol tambah dipencet
if(isset($_POST["tambah"])) {
    $_SESSION["tambah"] = $_POST["tambah"];
    header("Location: tambah.php");
    exit;
}

// ketika tombol logout dipencet
if(isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

// selalu unset sesi tambah ketika dihalaman tampilan
unset($_SESSION["tambah"]);

// konfirmasi untuk halaman hapus agar tidak mudah dibobol dihalaman lain
$ubah = "halodariubah";
$hapus = "halodarihapus";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
        }
        
        @keyframes cat {
            from {
                top: -20rem;
                transform: rotate(180deg);
                opacity: 0;
            } to {
                top: -14rem;
                transform: rotate(180deg);
                opacity: 1;
            }
        }

        .kucing1 {
            position: absolute;
            top: -14rem;
            z-index: -1;
            left: -10rem;
            transform: rotate(180deg);
            animation: cat 0.5s;
        }

        .header {
            display: flex;
            justify-content: space-between;
            padding: 1rem 3rem;
            background-color: black;
            color: white;
            align-items: center;
        }

        .navbar {
            display: flex;
        }

        .header .navbar form button {
            background-color: transparent;
            border: 0;
            color: white;
            display: inline-block;
            font-size: 1rem;
            padding: 6px;
            border-radius: 1rem;
            transition: 0.2s;
            font-weight: 700;
            cursor: pointer;
            margin-left: 1rem;
        }

        .header .navbar form button:hover {
            background-color: white;
            color: black;
        }

        h1 {
            text-align: center;
            margin-top: 2rem;
        }

        table {
            margin: 2rem auto 0;
        }

        th, td {
            padding: 10px;
            min-width: 10rem;
        }

        th:nth-child(1), td:nth-child(1) {
            min-width: 3rem;
            text-align: center;
        }

        th:nth-child(2), td:nth-child(2) {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .btn {
            text-decoration: none;
            color: black;
            font-weight: 700;
            padding: 8px;
            border-radius: 5px;
            transition: 0.2s;
        }

        .btn:nth-child(1) {
            margin-right: 1rem;
        }

        .btn:hover {
            background-color: black;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <img class="kucing1" src="https://st.depositphotos.com/15809744/56222/v/450/depositphotos_562223210-stock-illustration-cute-cat-line-art-illustration.jpg" alt="kucing">
    <div class="header">
        <h2>Selamat Datang! <?php echo $_SESSION["username"]?></h2>
        <div class="navbar">
            <form method="post">
                <button type="submit" name="tambah">Tambah Data</button>
            </form>
            <form method="post">
                <button type="submit" name="logout">Logout</button>
            </form>
        </div>
    </div>
    <h1>Data Mahasiswa</h1>
    <table border="1" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Asal Kota</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1?>
        <?php while($mhs = mysqli_fetch_assoc($result)) :?>
        <tr>
            <td><?php echo $no . "."?></td>
            <td><?php echo $mhs["nama"]?></td>
            <td><?php echo $mhs["nim"]?></td>
            <td><?php echo $mhs["umur"]?></td>
            <td><?php echo $mhs["jenis_kelamin"]?></td>
            <td><?php echo $mhs["prodi"]?></td>
            <td><?php echo $mhs["jurusan"]?></td>
            <td><?php echo $mhs["asal_kota"]?></td>
            <td>
                <!-- ketika tombol edit dipencet -->
                <a class="btn" href="tambah.php?id=<?php echo $mhs['id'];?>&konfirmasi=<?php echo $ubah?>">Edit</a>
                <!-- ketika tombol hapus dipencet -->
                <a class="btn" href="hapus.php?id=<?php echo $mhs['id'];?>&konfirmasi=<?php echo $hapus?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
            </td>
        </tr>
        <?php $no += 1?>
        <?php endwhile?>
    </table>
</body>
</html>