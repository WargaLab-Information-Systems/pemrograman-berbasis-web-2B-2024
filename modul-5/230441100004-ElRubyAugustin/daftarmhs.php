<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

// Inisialisasi array data jika belum ada
if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = array();
}

// Fungsi untuk menambahkan data ke dalam array
function tambahData($nama, $nim, $alamat, $angkatan) {
    $data = array(
        'nama' => $nama,
        'nim' => $nim,  
        'alamat' => $alamat,
        'angkatan' => $angkatan
    );
    $_SESSION['data'][] = $data;
}

// Fungsi untuk memperbarui data dalam array berdasarkan indeks
function updateData($index, $nama, $nim, $alamat, $angkatan) {
    $_SESSION['data'][$index] = array(
        'nama' => $nama,
        'nim' => $nim,
        'alamat' => $alamat,
        'angkatan' => $angkatan
    );
    // Kosongkan nilai input setelah proses update selesai
    $_SESSION['dataToUpdate'] = array('nama' => '', 'nim' => '', 'alamat' => '', 'angkatan' => '');
    // Redirect kembali ke halaman utama
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Fungsi untuk menghapus data dalam array berdasarkan indeks
function hapusData($index) {
    if(isset($_SESSION['data'][$index])) {
        unset($_SESSION['data'][$index]);
    }
}

// Tambahkan data jika tombol Submit ditekan
if (isset($_POST['submit'])) {
    tambahData($_POST['nama'], $_POST['nim'], $_POST['alamat'], $_POST['angkatan']);
}

// Perbarui data jika tombol Update ditekan
if (isset($_POST['update'])) {
    updateData($_POST['index'], $_POST['nama'], $_POST['nim'], $_POST['alamat'], $_POST['angkatan']);
}

// Hapus data jika tombol Delete ditekan
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['index'])) {
    hapusData($_GET['index']);
}

// Ambil data dari session
$data = isset($_SESSION['data']) ? $_SESSION['data'] : array();

// Jika aksi adalah update, dan indeks valid disediakan
if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['index']) && isset($data[$_GET['index']])) {
    $index = $_GET['index'];
    // Ambil data yang akan diupdate
    $dataToUpdate = $data[$index];
} else {
    // Jika tidak ada aksi update, atur dataToUpdate menjadi kosong
    $dataToUpdate = isset($_SESSION['dataToUpdate']) ? $_SESSION['dataToUpdate'] : array('nama' => '', 'nim' => '', 'alamat' => '', 'angkatan' => '');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malassssss</title>
    <link rel="stylesheet" href="tabel.css">
</head>
<style>
        body {
            weight: 100%;
            height: 90vh;
            background-image: url('bg.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8); /* Ubah kelebaran sesuai kebutuhan */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
            color: #007bff; 
            font-weight: bold;
        }
        
        a:hover {
            color: #0056b3;
        }

        .center {
            text-align: center;
        }
    
        label {
        display: inline-block;
        width: 100px;
        text-align: right;
        margin-right: 10px;
        }

        .form-group button {
            margin-left: 110px;
        }
    </style>

<body>
    <div class="container">
    <h2>Tambah Data Mahasiswa</h2>

    <form action="" method="POST">
    <input type="hidden" name="index" value="<?php echo isset($index) ? $index : ''; ?>">
    <label for="nama">Nama:</label> <input type="text" id="nama" name="nama" value="<?php echo isset($dataToUpdate['nama']) ? $dataToUpdate['nama'] : ''; ?>" required><br>
    <label for="nim">Nim:</label> <input type="text" id="nim" name="nim" value="<?php echo isset($dataToUpdate['nim']) ? $dataToUpdate['nim'] : ''; ?>" required><br>
    <label for="alamat">Alamat:</label> <input type="text" id="alamat" name="alamat" value="<?php echo isset($dataToUpdate['alamat']) ? $dataToUpdate['alamat'] : ''; ?>" required><br>
    <label for="angkatan">Angkatan:</label> <input type="text" id="angkatan" name="angkatan" value="<?php echo isset($dataToUpdate['angkatan']) ? $dataToUpdate['angkatan'] : ''; ?>" required><br>
    <?php if (isset($_GET['action']) && $_GET['action'] == 'update'): ?>
        <button type="submit" name="update">Update</button>
    <?php else: ?>
        <div class="form-group">
        <button type="submit" name="submit">Submit</button>
    <?php endif; ?>
    </div>
</form>

    <h2 class="center">Data Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Nim</th>
            <th>Alamat</th>
            <th>Angkatan</th>
            <th>Keterangan</th>
        </tr>
        <?php
        // Tampilkan data dari array
        foreach ($data as $index => $row) {
            echo "<tr>";
            echo "<td>".$row['nama']."</td>";
            echo "<td>".$row['nim']."</td>";
            echo "<td>".$row['alamat']."</td>";
            echo "<td>".$row['angkatan']."</td>";
            echo "<td><a href='?action=update&index=$index'>Update</a> | <a href='?action=delete&index=$index'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a href="home.php">Home</a><br>
    <a href="logout.php">Log Out</a><br>
    </div>
</body>
</html>