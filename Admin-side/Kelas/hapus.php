<?php
include("../../koneksi.php");

if (isset($_GET['kd_kelas'])) {
    $kd_kelas = $_GET['kd_kelas'];

    // Hapus semua jadwal yang terkait dengan kelas yang akan dihapus
    $sql_delete_jadwal = "DELETE FROM jadwal WHERE kd_kelas = $kd_kelas";
    mysqli_query($conn, $sql_delete_jadwal) or die(mysqli_error($conn));

    // Setelah jadwal dihapus, hapus kelas
    $sql_delete_kelas = "DELETE FROM kelas WHERE kd_kelas = $kd_kelas";
    $query = mysqli_query($conn, $sql_delete_kelas) or die(mysqli_error($conn));

    if ($query) {
        header('Location: ../dashboard.php?page=DataKelas');
        exit;
    } else {
        header('Location: ../dashboard.php?page=DataKelas');
        exit;
    }
} else {
    die("Akses dilarang...");
}
?>
