<?php
include '../../koneksi.php';

if (isset($_POST['tambah_jadwal'])) {
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $kd_kelas = $_POST['kd_kelas'];
    $kd_guru = $_POST['kd_guru']; 

    if (!empty($hari) && !empty($jam_mulai) && !empty($jam_selesai) && !empty($kd_kelas) && !empty($kd_guru)) {
        $query_insert = "INSERT INTO jadwal (hari, jam_mulai, jam_selesai, kd_kelas, kd_guru) 
                         VALUES ('$hari', '$jam_mulai', '$jam_selesai', '$kd_kelas', '$kd_guru')";
        if ($conn->query($query_insert) === TRUE) {
            echo "<script>alert('Jadwal berhasil ditambahkan!'); window.location.href='jadwal.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan jadwal: ".$conn->error."');</script>";
        }
    } else {
        echo "<script>alert('Harap isi semua field!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal</title>
</head>
<body>

<h2>Tambah Jadwal Baru</h2>

<form method="POST">
    <label>Hari:</label>
    <select name="hari" required>
        <option value="Senin">Senin</option>
        <option value="Selasa">Selasa</option>
        <option value="Rabu">Rabu</option>
        <option value="Kamis">Kamis</option>
        <option value="Jumat">Jumat</option>
    </select><br><br>

    <label>Jam Mulai:</label>
    <input type="time" name="jam_mulai" required><br><br>

    <label>Jam Selesai:</label>
    <input type="time" name="jam_selesai" required><br><br>

    <label>Kelas:</label>
    <select name="kd_kelas" required>
        <?php
        $query = "SELECT kd_kelas, nama_kelas FROM kelas";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='".$row['kd_kelas']."'>".$row['nama_kelas']."</option>";
        }
        ?>
    </select><br><br>

    <label>Guru:</label>
    <select name="kd_guru" required>
        <?php
        $query = "SELECT kd_guru, nama_guru FROM guru";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='".$row['kd_guru']."'>".$row['nama_guru']."</option>";
        }
        ?>
    </select><br><br>

    <button type="submit" name="tambah_jadwal">Tambah Jadwal</button>
</form>

<a href="jadwal.php">Kembali ke Jadwal</a>

</body>
</html>
