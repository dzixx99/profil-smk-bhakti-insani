<?php
session_start();
include '../koneksi.php'; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $pesan = $_POST['pesan'];
    $kd_user = isset($_SESSION['kd_user']) ? $_SESSION['kd_user'] : NULL; // Ambil kd_user jika login

    // Simpan ke database
    $query = "INSERT INTO pesan (judul, pesan, kd_user) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $judul, $pesan, $kd_user);

    if ($stmt->execute()) {
        echo "<script>alert('Pesan berhasil dikirim!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan!'); window.location='kontak.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
