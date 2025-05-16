<?php
include("../../koneksi.php");

if (isset($_GET['kd_kelas'])) {
    $title = "Edit";
    $url ='edit.php';
    $id = mysqli_real_escape_string($conn, $_GET['kd_kelas']); // Escape string
    $sql = "SELECT * FROM kelas WHERE kd_kelas = '$id'"; // Tambah tanda kutip
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        die("Query gagal: " . mysqli_error($conn));
    }
    $kelas = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query) < 1) {
        die("data tidak ditemukan ....");
    }
} else {
    $title = "Tambah Data";
    $url = 'add.php';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eef2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .form-container {
            background: blue;
            color: yellow;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="text-center mb-4"><?= $title ?> Kelas</h2>
        <form action="<?= $url ?>" method="POST">
            <?php if (!empty($kd_kelas)): ?>
                <input type="hidden" name="kd_kelas" value="<?= $kd_kelas ?>">
            <?php endif; ?>
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas :</label>
                <input type="text" class="form-control" name="nama_kelas" value="<?php if (isset($_GET['kd_kelas'])) {
                                                            echo $kelas['nama_kelas'];
                                                        } ?>">
            </div>
            <div class="mb-3">
                <label for="jumlah_siswa" class="form-label">Jumlah siswa :</label>
                <input type="number" class="form-control" name="jumlah_siswa" value="<?php if (isset($_GET['kd_kelas'])) {
                                                            echo $kelas['jumlah_siswa'];
                                                        } ?>">
            </div>
            <div class="mb-3">
                <label for="jumlah_siswi" class="form-label">Jumlah Siswi :</label>
                <input type="number" class="form-control" name="jumlah_siswi" value="<?php if (isset($_GET['kd_kelas'])) {
                                                            echo $kelas['jumlah_siswi'];
                                                        } ?>">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
