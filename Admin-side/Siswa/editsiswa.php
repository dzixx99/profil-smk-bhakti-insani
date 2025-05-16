<?php
include("../../koneksi.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $kd_siswa = $_POST['kd_siswa'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $tmp_lahir = $_POST['sw_tmp_lahir'];
    $tgl_lahir = $_POST['sw_tgl_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $foto = $_POST['foto'];
    $sql = "UPDATE siswa SET NIS = '$nis', nama_siswa = '$nama_siswa', sw_tmp_lahir ='$tmp_lahir', sw_tgl_lahir = '$tgl_lahir', jenkel = '$jk', sw_alamat = '$alamat', sw_foto = '$foto' WHERE kd_siswa = $kd_siswa";
    $query = mysqli_query($conn,$sql) or die (mysqli_error($conn));

    if($query){
        header('Location:../dashboard.php?page=DataSiswa');
    }else{
        header('Location:../dashboard.php?page=DataSiswa');
    }
}else{
    die("Akses dilarang...");
}
?>