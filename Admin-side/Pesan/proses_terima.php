<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_pesan = $_POST['kd_pesan'];
    $kd_admin = $_POST['kd_admin'];

    // Update data pesan, set siapa penerimanya
    $sql = "UPDATE pesan SET kd_admin = '$kd_admin' WHERE kd_pesan = '$kd_pesan'";
    if (mysqli_query($conn, $sql)) {
        // Tambahkan notifikasi ke user (opsional)
        $notif_sql = "INSERT INTO notifikasi (kd_user, pesan) VALUES ((SELECT kd_user FROM pesan WHERE kd_pesan = '$kd_pesan'), 'Pesan Anda telah diterima oleh Admin.')";
        mysqli_query($conn, $notif_sql);

        echo "<script>alert('Pesan berhasil diterima!'); window.location.href='dashboard.php?page=Pesan;</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!'); window.location.href='dashboard.php?page=Pesan';</script>";
    }
}
?>
