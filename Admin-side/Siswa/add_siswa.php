<?php include '../../koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $kd_siswa = $_POST['kd_siswa'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $tmp_lahir = $_POST['sw_tmp_lahir'];
    $tgl_lahir = $_POST['sw_tgl_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $foto = $_POST['foto'];
    
    // Memperbaiki query dengan tanda kurung yang benar
    $sql = "INSERT INTO siswa VALUES('$kd_siswa','$nis', '$nama_siswa', '$tmp_lahir', '$tgl_lahir','$jk','$alamat','$foto')";
    
    try {
        // Eksekusi query
        $query = mysqli_query($conn, $sql);

        if($query){
            // Redirect ke halaman sukses jika berhasil
            header('Location: ../dashboard.php?page=DataSiswa');
        }
    } catch (mysqli_sql_exception $e) {
        // Jika terjadi duplikat entri atau error lain
        if ($e->getCode() == 1062) {
            // Error Duplicate Entry
            echo "<script>alert('Error: NIS sudah terdaftar!');window.location.href = 'Guru/siswa_form.php';</script>";
        } else {
            echo "<script>alert('Error: Terjadi kesalahan lain');window.location.href = 'Guru/siswa_form.php';</script>";
        }
    }
} else {
    die("Akses dilarang...");
}?>