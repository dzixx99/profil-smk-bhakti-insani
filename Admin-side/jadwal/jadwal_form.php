<?php
include '../../koneksi.php';

if (isset($_POST['tambah_jadwal'])) {
    $hari = mysqli_real_escape_string($conn, $_POST['hari']);
    $jam_mulai = mysqli_real_escape_string($conn, $_POST['jam_mulai']);
    $jam_selesai = mysqli_real_escape_string($conn, $_POST['jam_selesai']);
    $kd_kelas = mysqli_real_escape_string($conn, $_POST['kd_kelas']);
    $kd_guru = mysqli_real_escape_string($conn, $_POST['kd_guru']);


    if (!empty($hari) && !empty($jam_mulai) && !empty($jam_selesai) && !empty($kd_kelas) && !empty($kd_guru))  {
        $query_insert = "INSERT INTO jadwal (hari, jam_mulai, jam_selesai, kd_kelas,kd_guru) 
                         VALUES ('$hari', '$jam_mulai', '$jam_selesai', '$kd_kelas', '$kd_guru')";

        if (mysqli_query($conn, $query_insert)) {
            header("Location: ../dashboard.php?page=DataJadwal");
            exit();
        } else {
            echo "<script>alert('Gagal menambahkan jadwal: " . mysqli_error($conn) . "');</script>";
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
    <style>
        .jadwal-container {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .jadwal-container h3 {
            text-align: center;
            color: #333;
        }
        .jadwal-container form {
            display: flex;
            flex-direction: column;
        }
        .jadwal-container label {
            font-weight: bold;
            margin-top: 10px;
        }
        .jadwal-container select,
        .jadwal-container input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }
        .jadwal-container select:focus,
        .jadwal-container input:focus {
            outline: none;
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .jadwal-container button {
            margin-top: 20px;
            padding: 10px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .jadwal-container button:hover {
            background-color: #0056b3;
        }
        /* Responsif */
        @media (max-width: 600px) {
            .jadwal-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<div class="jadwal-container">
    <h3>Tambah Jadwal</h3>
    <form method="POST">
        <label for="hari">Hari:</label>
        <select name="hari" required>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
        </select>

        <label for="jam_mulai">Jam Mulai:</label>
        <input type="time" name="jam_mulai" required>

        <label for="jam_selesai">Jam Selesai:</label>
        <input type="time" name="jam_selesai" required>

        <label for="kd_kelas">Kelas:</label>
        <select name="kd_kelas" required>
            <option value="">-- Pilih Kelas --</option>
            <?php
            $query_kelas = "SELECT * FROM kelas";
            $result_kelas = mysqli_query($conn, $query_kelas);
            while ($row = mysqli_fetch_assoc($result_kelas)) {
                echo "<option value='".$row['kd_kelas']."'>".$row['nama_kelas']."</option>";
            }
            ?>
        </select>
        <label for="kd_guru">Guru:</label>
        <select name="kd_guru" required>
            <option value="">-- Pilih Guru --</option>
            <?php
            $query_kelas = "SELECT * FROM guru";
            $result_kelas = mysqli_query($conn, $query_kelas);
            while ($row = mysqli_fetch_assoc($result_kelas)) {
                echo "<option value='".$row['kd_guru']."'>".$row['nama_guru']." - ".$row['mapel']."</option>";
            }
            ?>
        </select>

        <button type="submit" name="tambah_jadwal">Tambah Jadwal</button>
    </form>
</div>

</body>
</html>
