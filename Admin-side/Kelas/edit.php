<?php
include("../../koneksi.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama_kelas = $_POST['nama_kelas'];
    $jumlah_siswa = $_POST['jumlah_siswa'];
    $jumlah_siswi = $_POST['jumlah_siswi'];
    $sql = "UPDATE kelas SET nama_kelas='$nama_kelas', jumlah_siswa='$jumlah_siswa', jumlah_siswi=$jumlah_siswi WHERE kd_kelas='$kd_kelas'";
    $query = mysqli_query($conn,$sql) or die (mysqli_error($conn));

    if($query){
        header('Location: ../dashboard.php?page=DataKelas');
    }else{
        header('Location: ../dashboard.php?page=DataKelas');
    }
}else{
    die("Akses dilarang...");
}
?>