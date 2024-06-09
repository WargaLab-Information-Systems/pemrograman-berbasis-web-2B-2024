<?php
    $koneksi=mysqli_connect("localhost","root","","modul6");
    if(isset($_GET['nim'])){
        $nim = $_GET['nim'];

        $query = "DELETE FROM data_mhs WHERE nim='$nim'";
        $result = mysqli_query($koneksi, $query);

        if($result){
            header('Location: tampil_data.php');
            exit;
        }else{
            echo "<script>window.alert('Data Mahasiswa gagal dihapus: ". mysqli_error($koneksi). "');window.location='tampil_data.php'</script>";
        }
    }
?>