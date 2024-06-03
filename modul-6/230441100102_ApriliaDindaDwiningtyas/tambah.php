<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$databasename = 'db_mahasiswa';
$koneksi = mysqli_connect($servername,$username,$password,$databasename);

$header = "Tambah Data";

// ketika memaksa masuk ke halaman tambah/ubah pada saat di halaman tampilan
if(!isset($_SESSION["tambah"]) && !isset($_GET["id"])) {
    header("Location: tampilan.php");
    exit;
}

// menangkap id yang dikirimkan dari halaman tampilan
if(isset($_GET["id"]) && isset($_GET["konfirmasi"]) && $_GET["konfirmasi"] === "halodariubah") {
    $header = "Ubah Data";
    $id = $_GET["id"];
    $hasil = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = '$id'"));
    $nama = $hasil["nama"];
    $nim = $hasil["nim"];
    $umur = $hasil["umur"];
    $jenis_kelamin = $hasil["jenis_kelamin"];
    $prodi = $hasil["prodi"];
    $jurusan = $hasil["jurusan"];
    $asal_kota = $hasil["asal_kota"];
}

// ketika tombol tambahkan data dipencet
if(isset($_POST["tambahkan"])) {
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $umur = $_POST["umur"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $prodi = $_POST["prodi"];
    $jurusan = $_POST["jurusan"];
    $asal_kota = $_POST["asal_kota"];
    mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES ('','$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')");
    unset($_SESSION["tambah"]);
    echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'tampilan.php';
        </script>";
} else if(isset($_POST["ubahkan"])) {
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $umur = $_POST["umur"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $prodi = $_POST["prodi"];
    $jurusan = $_POST["jurusan"];
    $asal_kota = $_POST["asal_kota"];
    mysqli_query($koneksi, "UPDATE mahasiswa SET
        nama = '$nama',
        nim = '$nim',
        umur = '$umur',
        jenis_kelamin = '$jenis_kelamin',
        prodi = '$prodi',
        jurusan = '$jurusan',
        asal_kota = '$asal_kota'
        WHERE id = '$id'
    ");
    echo "
        <script>
            alert('Data berhasil diubah');
            document.location.href = 'tampilan.php';
        </script>";
}

// unset sesi tambah jika tombol kembali dipencet
if(isset($_POST["kembali"])) {
    unset($_SESSION["tambah"]);
    header("Location: tampilan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Tambah Data</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
        }

        body {
            overflow-x: hidden;
        }

        .header {
            padding: 1rem 3rem;
            background-color: black;
            color: white;
            align-items: center;
        }

        .header h2 {
            text-align: center;
        }

        .kembali {
            position: absolute;
            background-color: transparent;
            border: 0;
            left: 2%;
            top: 1rem;
            z-index: 5;
            color: white;
            display: inline-block;
            font-size: 1rem;
            padding: 6px;
            border-radius: 1rem;
            transition: 0.2s;
            font-weight: 700;
            cursor: pointer;
        }

        .kembali:hover {
            background-color: white;
            color: black;
        }

        .form {
            width: 30%;
            margin: 4.5rem auto;
            border: 1px solid black;
            box-shadow: 1px 1px 1rem black;
            padding: 1rem 0;
            border-radius: 1rem;
        }

        label {
            width: 70%;
            font-weight: 700;
            margin: auto;
            display: block;
            margin-top: 1rem;
        }

        input {
            display: block;
            padding: 8px 1rem;
            width: 70%;
            margin: 0 auto 1.5rem;
            border: 1px solid black;
            border-radius: 8px;
            font-size: 1rem;
        }
        
        input::placeholder {
            font-weight: 700;
        }

        #submit {
            background-color: white;
            border: 0;
            color: black;
            display: block;
            font-size: 1rem;
            padding: 6px;
            transition: 0.2s;
            font-weight: 700;
            cursor: pointer;
            margin: 1rem auto 0;
            border-radius: 10px;
        }

        #submit:hover {
            background-color: black;
            color: white;
        }

        .kucing1, .kucing2 {
            position: absolute;
            z-index: -1;
        }

        .kucing1 {
            width: 30rem;
            right: -12rem;
            top: -8rem;
            transform: rotate(-135deg);
        }

        .kucing2 {
            transform: rotate(90deg);
            left: -17rem;
            top: 10rem;
        }

        .radiobtn {
            display: inline-block;
            width: 5rem;
        }

        .radiobtnfirst {
            margin-left: 2.3rem;
        }

        .nim::-webkit-inner-spin-button {
            display: none;
        }

        .umur::-webkit-inner-spin-button {
            display: none;
        }
        </style>
</head>
<body>
    <img class="kucing1" src="https://st.depositphotos.com/15809744/56222/v/450/depositphotos_562223210-stock-illustration-cute-cat-line-art-illustration.jpg" alt="kucing">
    <img class="kucing2" src="https://st.depositphotos.com/15809744/56222/v/450/depositphotos_562223210-stock-illustration-cute-cat-line-art-illustration.jpg" alt="kucing">
    <div class="header">
        <h2>Halaman <?php echo $header?></h2>
    </div>
    <form method="post">
        <button class="kembali" name="kembali">Kembali</button>
    </form>
    <form method="post" class="form">
        <label class="nama" for="nama"></label>
        <input class="nama" type="text" name="nama" value="<?php echo (isset($nama))? "$nama" : ""?>" placeholder="Nama" required>
        <label class="nim" for="nim"></label>
        <input class="nim" type="number" name="nim" value="<?php echo (isset($nim))? "$nim" : ""?>" placeholder="NIM" required maxlength="12">

        <label class="umur" for="umur"></label>
        <input class="umur" type="number" name="umur" value="<?php echo (isset($umur))? "$umur" : ""?>" placeholder="Umur" required maxlength="3">

        <label class="jenis_kelamin" for="jenis_kelamin">Jenis Kelamin</label>
        <?php if(!isset($jenis_kelamin)) :?>
        <input class="radiobtn radiobtnfirst" type="radio" id="laki-laki" value="laki-laki" name="jenis_kelamin" required>
        <label class="radiobtn" for="laki-laki">Laki-laki</label>
        <input class="radiobtn" type="radio" id="perempuan" value="perempuan" name="jenis_kelamin" required>
        <label class="radiobtn" for="perempuan">Perempuan</label>
        <?php elseif($jenis_kelamin === "laki-laki") :?>
        <input class="radiobtn radiobtnfirst" type="radio" id="laki-laki" value="laki-laki" name="jenis_kelamin" required checked>
        <label class="radiobtn" for="laki-laki">Laki-laki</label>
        <input class="radiobtn" type="radio" id="perempuan" value="perempuan" name="jenis_kelamin" required>
        <label class="radiobtn" for="perempuan">Perempuan</label>
        <?php else :?>
        <input class="radiobtn radiobtnfirst" type="radio" id="laki-laki" value="laki-laki" name="jenis_kelamin" required>
        <label class="radiobtn" for="laki-laki">Laki-laki</label>
        <input class="radiobtn" type="radio" id="perempuan" value="perempuan" name="jenis_kelamin" required checked>
        <label class="radiobtn" for="perempuan">Perempuan</label>
        <?php endif?>

        <label class="prodi" for="prodi"></label>
        <input class="prodi" type="text" name="prodi" value="<?php echo (isset($prodi))? "$prodi" : ""?>" placeholder="Prodi" required>

        <label class="jurusan" for="jurusan"></label>
        <input class="jurusan" type="text" name="jurusan" value="<?php echo (isset($jurusan))? "$jurusan" : ""?>" placeholder="Jurusan" required>

        <label class="asal_kota" for="asal_kota"></label>
        <input class="asal_kota" type="text" name="asal_kota" value="<?php echo (isset($asal_kota))? "$asal_kota" : ""?>" placeholder="Asal Kota" required>

        <button id="submit" type="submit" name="<?php echo (isset($_SESSION["tambah"]))? "tambahkan" : "ubahkan"?>"><?php echo (isset($_SESSION["tambah"]))? "Tambahkan Data" : "Ubah Data"?></button>
    </form>
    <script>
        const nama = document.getElementsByClassName('nama');
        if(nama[1].value !== "") {
            nama[0].innerHTML = "Nama : ";
        }
        const nim = document.getElementsByClassName('nim');
        if(nim[1].value !== "") {
            nim[0].innerHTML = "NIM : ";
        }
        const umur = document.getElementsByClassName('umur');
        if(umur[1].value !== "") {
            umur[0].innerHTML = "Umur : ";
        }
        const prodi = document.getElementsByClassName('prodi');
        if(prodi[1].value !== "") {
            prodi[0].innerHTML = "Prodi : ";
        }
        const jurusan = document.getElementsByClassName('jurusan');
        if(jurusan[1].value !== "") {
            jurusan[0].innerHTML = "Jurusan : ";
        }
        const asal_kota = document.getElementsByClassName('asal_kota');
        if(asal_kota[1].value !== "") {
            asal_kota[0].innerHTML = "Asal Kota : ";
        }
    </script>
</body>
</html>