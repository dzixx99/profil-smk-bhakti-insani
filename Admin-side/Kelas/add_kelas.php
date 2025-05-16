<?php
include("../../koneksi.php"); // Sambungkan ke database

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama_kelas = $_POST['nama_kelas'];
    $jumlah_siswa = $_POST['jumlah_siswa'];
    $jumlah_siswi = $_POST['jumlah_siswi'];

    if (isset($_POST['kd_kelas'])) {
        // Jika ada kd_kelas, berarti UPDATE data
        $kd_kelas = mysqli_real_escape_string($conn, $_POST['kd_kelas']);
        $sql = "UPDATE kelas SET kelas='$kelas', jurusan='$jurusan', siswa=$siswa, siswi=$siswi, wali_kelas='$walas' WHERE kd_kelas='$kd_kelas'";
    } else {
        // Jika tidak ada kd_kelas, berarti INSERT data baru
        $sql = "INSERT INTO kelas(nama_kelas,jumlah_siswa,jumlah_siswi) VALUES ('$nama_kelas',  '$jumlah_siswa', '$jumlah_siswi')";
    }

    try {
        $query = mysqli_query($conn, $sql);

        if ($query) {
            header('Location: ../dashboard.php?page=DataKelas');
        } else {
            echo "<script>alert('Error: Data gagal disimpan');window.location.href = 'kelas_form.php';</script>";
        }
    } catch (mysqli_sql_exception $e) {
        echo "<script>alert('Error: Terjadi kesalahan!');window.location.href = 'kelas_form.php';</script>";
    }
} else {
    die("Akses dilarang...");
}
?>
