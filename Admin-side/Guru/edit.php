<?php
include("../../koneksi.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $kd_guru = $_POST['kd_guru'];
    $nip = $_POST['nip'];
    $nama_guru = $_POST['nama_guru'];
    $tmp_lahir = $_POST['gr_tmp_lahir'];
    $tgl_lahir = $_POST['gr_tgl_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $pendidikan = $_POST['pendidikan'];
    $mapel = $_POST['mapel'];
    $alamat = $_POST['alamat'];
    $foto = $_POST['foto'];
    $sql = "UPDATE guru SET NIP = '$nip', nama_guru = '$nama_guru', gr_tmp_lahir ='$tmp_lahir', gr_tgl_lahir = '$tgl_lahir', jenkel = '$jk', pendidikan = '$pendidikan', mapel = '$mapel', gr_alamat = '$alamat', gr_foto = '$foto' WHERE kd_guru = $kd_guru";
    $query = mysqli_query($conn,$sql) or die (mysqli_error($conn));

    if($query){
        header('Location: ../dashboard.php?page=DataGuru');
    }else{
        header('Location: ../dashboard.php?page=DataGuru');
    }
}else{
    die("Akses dilarang...");
}
?>