<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data Mahasiswa</title>
   <link rel="stylesheet" href="style1.css">
</head>
<body>
    <h2>Form Input Data Mahasiswa</h2>
    <form action="simpan_mahasiswa.php" method="post">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" required>
        <label for="nim">NIM</label>
        <input type="text" id="nim" name="nim" required>
        <label for="umur">Umur</label>
        <input type="text" id="umur" name="umur" required>
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        <label for="prodi">Program Studi</label>
        <input type="text" id="prodi" name="prodi" required>
        <label for="jurusan">Jurusan</label>
        <input type="text" id="jurusan" name="jurusan" required>
        <label for="asal_kota">Asal Kota</label>
        <input type="text" id="asal_kota" name="asal_kota" required>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>