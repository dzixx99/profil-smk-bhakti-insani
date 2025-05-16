
<?php include("../../koneksi.php");
if (isset($_GET['kd_siswa'])){
    $kd_siswa = $_GET['kd_siswa'];
    $sql = "DELETE FROM siswa WHERE kd_siswa = $kd_siswa";
    $query = mysqli_query($conn,$sql) or die(mysqli_error($db));

    if($query){
        header('Location:../dashboard.php?page=DataSiswa');
    }else{
        header('Location:../dashboard.php?page=DataSiswa');
    }
}else{
    die("Akses dilarang...");
}
?>