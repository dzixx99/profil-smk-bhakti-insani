<?php
include '../koneksi.php';

$nama_kelas = "";

// Jika user memilih kelas
if (isset($_POST['pilih_kelas'])) {
    $nama_kelas = $_POST['nama_kelas'];
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
<?php include 'head.php'; ?>
    <style>
        .container {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            width: 70%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .container .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .container select, .container button {
            padding: 10px;
            font-size: 16px;
        }
        .container button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .container button:hover {
            background-color: #0056b3;
        }
        .container table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .container th, .container td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .container th {
            background-color: #007BFF;
            color: white;
        }
        .container .input-section {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <h2>Jadwal Kelas</h2>

    <!-- Form Pilih Nama Kelas -->
    <div class="input-section">
        <h3>Pilih Kelas</h3>
        <form method="POST" class="form-container">
            <select name="nama_kelas">
                <option value="">-- Pilih Kelas --</option>
                <?php
                // Ambil daftar kelas dari database
                $query = "SELECT DISTINCT nama_kelas FROM kelas";
                $result = $conn->query($query);

                while ($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['nama_kelas']."' ".($nama_kelas == $row['nama_kelas'] ? "selected" : "").">".$row['nama_kelas']."</option>";
                }
                ?>
            </select>
            <button type="submit" name="pilih_kelas">Tampilkan</button>
        </form>
    </div>

    <?php if (!empty($nama_kelas)) : ?>
        <h3>Jadwal untuk Kelas: <?php echo $nama_kelas; ?></h3>
        <table>
            <tr>
                <th>Hari</th>
                <th>Jam</th>
                <th>Nama Guru</th>
                <th>Mapel</th>
            </tr>
            <?php
            // Query dengan INNER JOIN agar data lengkap
            $query_jadwal = "
            SELECT j.hari, j.jam_mulai, j.jam_selesai, g.nama_guru, g.mapel, k.nama_kelas
            FROM jadwal j
            INNER JOIN guru g ON j.kd_guru = g.kd_guru    
            INNER JOIN kelas k ON j.kd_kelas = k.kd_kelas
            WHERE k.nama_kelas = '$nama_kelas'";

            $result_jadwal = $conn->query($query_jadwal);

            // Cek apakah ada data jadwal
            if ($result_jadwal->num_rows > 0) {
                while ($row_jadwal = $result_jadwal->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row_jadwal['hari']."</td>
                            <td>".$row_jadwal['jam_mulai']." - ".$row_jadwal['jam_selesai']."</td>
                            <td>".$row_jadwal['nama_guru']."</td>
                            <td>".$row_jadwal['mapel']."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada jadwal untuk kelas ini.</td></tr>";
            }
            ?>
        </table>
    <?php endif; ?>
</div>

</body>
</html>
            