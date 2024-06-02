<?php

session_start();

if (!isset($_SESSION["username"]) || !isset($_SESSION["password"]) || $_SESSION["username"] === "" || $_SESSION["password"] === "") {
    header("Location: login.php");
    exit;
}

if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

$data = isset($_SESSION['data']) ? $_SESSION['data'] : array();
$data1 = array();
$button_name = isset($_SESSION['edit_data1_id']) ? 'edit' : 'tambah'; 
$username = isset($_POST['username']) ? $_POST['username'] : '';

// menambahkan data mahasiswa
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];
    
    // untuk tombol tambah
    $lastID = empty($data) ? 0 : end($data)['id'];
    $newData1 = array("id" => $lastID + 1, "nim" => $nim, "nama" => $nama, "jurusan" => $jurusan, "alamat" => $alamat, "angkatan" => $angkatan);
    array_push($data, $newData1);
    $_SESSION['data'] = $data; 
}
// tombol Edit
if (isset($_POST['edit_button'])) {
    $id = $_POST['id']; 
    $_SESSION['edit_data1_id'] = $id;
    header("location: home.php");
    exit;
}
// tombol simpan perubahan
if (isset($_POST['edit']) && isset($_POST['nama']) && isset($_POST['jurusan']) && isset($_POST['nim']) && isset($_POST['alamat']) && isset($_POST['angkatan'])) {
    $id = $_SESSION['edit_data1_id']; 
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];
    $data1Key = array_search($id, array_column($data, 'id'));
    if ($data1Key !== false) {
        // mengubah data mahasiswa
        $data[$data1Key]['nama'] = $nama;
        $data[$data1Key]['jurusan'] = $jurusan;
        $data[$data1Key]['nim'] = $nim;
        $data[$data1Key]['alamat'] = $alamat;
        $data[$data1Key]['angkatan'] = $angkatan;
        $_SESSION['data'] = $data; 
        $data1 = array();
    }    
    unset($_SESSION['edit_data1_id']); // hapus ID mahasiswa yang disimpan di session
}

// hapus Data Mahasiswa
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $data1Key = array_search($id, array_column($data, 'id'));
    if ($data1Key !== false) {
        unset($data[$data1Key]);
        // setel ulang nomor urut
        $data = array_values($data);
        $_SESSION['data'] = $data;
    }
}

// tentukan data mahasiswa yang akan diedit
if (isset($_SESSION['edit_data1_id'])) {
    $editID = $_SESSION['edit_data1_id'];
    foreach ($data as $s) {
        if ($s['id'] == $editID) {
            $data1 = $s;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body h3 {
            margin: 3rem 0;
        }

        .container {
            float: left;
        }

        .h1 {
            display: flex;
            background-color: lightblue;
            height: 30vh;
        }

        h1 {
            margin: auto;
            width: fit-content;
        }

        h3 {
            margin: 0;
        }

        table {
            margin: auto;
        }

        table tr td, table tr th {
            width: 10rem;
            text-align: center;
        }

        td form {
            display: inline-block;
        }
        
        .logout {
            display: inline-block;
            margin-right: 1rem;
            position: absolute;
            left: 8rem;
            top: 36rem;
        }
    </style>
</head>
<body>
    <div class="h1">
        <h1>Selamat datang <?php echo $_SESSION["username"]?></h1>
    </div>
    <h1>Data Mahasiswa</h1>
    <h3><?php echo isset($_SESSION['edit_data1_id']) ? 'Edit Mahasiswa' : 'Tambah Mahasiswa'; ?></h3>
    <form action="home.php" method="post" class="container">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo isset($data1['nama']) ? $data1['nama'] : ''; ?>" required><br>
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" value="<?php echo isset($data1['nim']) ? $data1['nim'] : ''; ?>" required><br>
        <label for="jurusan">Jurusan:</label><br>
        <input type="text" id="jurusan" name="jurusan" value="<?php echo isset($data1['jurusan']) ? $data1['jurusan'] : ''; ?>" required><br>
        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" name="alamat" value="<?php echo isset($data1['alamat']) ? $data1['alamat'] : ''; ?>" required><br>
        <label for="angkatan">Angkatan:</label><br>
        <input type="text" id="angkatan" name="angkatan" value="<?php echo isset($data1['angkatan']) ? $data1['angkatan'] : ''; ?>" required><br><br>
        <input type="submit" name="<?php echo isset($_SESSION['edit_data1_id']) ? 'edit' : 'tambah'; ?>" value="<?php echo isset($_SESSION['edit_data1_id']) ? 'Simpan Perubahan' : 'Tambah'; ?>" class="button">
    </form>
    <form method="post">
        <button name="logout" class="logout">Log Out</button>
    </form>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Angkatan</th>
            <th>Ubah</th>
        </tr>
    <?php foreach ($data as $data1) : ?>
        <tr>
            <td><?php echo $data1['nim']; ?></td>
            <td><?php echo $data1['nama']; ?></td>
            <td><?php echo $data1['jurusan']; ?></td>
            <td><?php echo $data1['alamat']; ?></td>
            <td><?php echo $data1['angkatan'];?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $data1['id']; ?>">
                    <button type="submit" name="edit_button">Edit</button>
                </form>
                <form action="?action=delete&id=<?php echo $data1['id']; ?>" method="post">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>