<?php include '../../koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
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
    
    // Memperbaiki query dengan tanda kurung yang benar
    $sql = "INSERT INTO guru VALUES('$kd_guru','$nip', '$nama_guru', '$tmp_lahir', '$tgl_lahir','$jk','$pendidilkan','$mapel','$alamat','$foto')";
    
    try {
        // Eksekusi query
        $query = mysqli_query($conn, $sql);

        if($query){
            // Redirect ke halaman sukses jika berhasil
            header('Location: ../dashboard.php?page=DataGuru');
        }
    } catch (mysqli_sql_exception $e) {
        // Jika terjadi duplikat entri atau error lain
        if ($e->getCode() == 1062) {
            // Error Duplicate Entry
            echo "<script>alert('Error: NIS sudah terdaftar!');window.location.href = 'v_form.php';</script>";
        } else {
            echo "<script>alert('Error: Terjadi kesalahan lain');window.location.href = 'v_form.php';</script>";
        }
    }
} else {
    die("Akses dilarang...");
}?>