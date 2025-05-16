<?php
include("../../koneksi.php");
if (isset($_GET['kd_guru'])){
    $kd_guru = $_GET['kd_guru'];
    $sql = "DELETE FROM guru WHERE kd_guru = $kd_guru";
    $query = mysqli_query($conn,$sql) or die(mysqli_error($db));

    if($query){
        header('Location:../dashboard.php?page=DataGuru');
    }else{
        header('Location:../dashboard.php?page=DataGuru');
    }
}else{
    die("Akses dilarang...");
}
?>