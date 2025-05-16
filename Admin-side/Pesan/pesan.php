<?php include '../koneksi.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
    }

    h2 {
        font-size: 24px;
        text-align: center;
    }

    .table-container {
        width: 100%;
        overflow-x: auto;
        
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 5px;
        text-align: left;
        font-size: 12px;
    }

    table th {
        background-color: #007BFF;
        color: white;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #ddd;
    }
</style>

<div class="col-12 col-m-12">
    <h2>Data Pesan SMK Bhakti Insani</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $kd_pesan = $_POST['kd_pesan'];
        $kd_admin = $_POST['kd_admin'];

        $updateQuery = "UPDATE pesan SET kd_admin='$kd_admin', status='diterima' WHERE kd_pesan='$kd_pesan'";
        
        if (mysqli_query($conn, $updateQuery)) {
            echo "<script>alert('Pesan berhasil diterima!');</script>";
        } else {
            echo "<script>alert('Gagal memperbarui pesan: " . mysqli_error($conn) . "');</script>";
        }
    }
    ?>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Kd</th>
                    <th>Pengirim</th>
                    <th>Email</th>
                    <th>Judul</th>
                    <th>Isi Pesan</th>
                    <th>Penerima</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan pesan yang belum diterima
                $sql = "SELECT p.kd_pesan, p.judul, p.pesan, u.nama, u.email 
                        FROM pesan p
                        INNER JOIN user u ON p.kd_user = u.kd_user 
                        WHERE p.status = 'belum_diterima'";
                $query = mysqli_query($conn, $sql);

                while ($pesan = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>{$pesan['kd_pesan']}</td>";
                    echo "<td>{$pesan['nama']}</td>";
                    echo "<td>{$pesan['email']}</td>";
                    echo "<td>{$pesan['judul']}</td>";
                    echo "<td>{$pesan['pesan']}</td>";
                    echo "<td>";
                    echo "<form method='POST'>";
                    echo "<input type='hidden' name='kd_pesan' value='{$pesan['kd_pesan']}'>";
                    echo '<select name="kd_admin" required>';
                    echo '<option value="">-- Pilih Admin --</option>';
                    
                    $adminQuery = "SELECT kd_admin, nama FROM admin";
                    $adminResult = mysqli_query($conn, $adminQuery);
                    while ($row = mysqli_fetch_assoc($adminResult)) {
                        echo "<option value='{$row['kd_admin']}'>{$row['nama']}</option>";
                    }

                    echo '</select>';
                    echo "</td>";
                    echo "<td><button type='submit'>Pesan Diterima</button></td>";
                    echo "</form>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <h2 style="margin-top: 20px;">Pesan yang Sudah Diterima</h2>
    <div class="table-container" >
        <table>
            <thead>
                <tr>
                    <th>Kd</th>
                    <th>Pengirim</th>
                    <th>Email</th>
                    <th>Judul</th>
                    <th>Isi Pesan</th>
                    <th>Diterima Oleh</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan pesan yang sudah diterima
                $sqlAccepted = "SELECT p.kd_pesan, p.judul, p.pesan, u.nama, u.email, a.nama as admin_nama
                               FROM pesan p
                               INNER JOIN user u ON p.kd_user = u.kd_user
                               INNER JOIN admin a ON p.kd_admin = a.kd_admin
                               WHERE p.status = 'diterima'";
                $queryAccepted = mysqli_query($conn, $sqlAccepted);

                while ($pesan = mysqli_fetch_array($queryAccepted)) {
                    echo "<tr>";
                    echo "<td>{$pesan['kd_pesan']}</td>";
                    echo "<td>{$pesan['nama']}</td>";
                    echo "<td>{$pesan['email']}</td>";
                    echo "<td>{$pesan['judul']}</td>";
                    echo "<td>{$pesan['pesan']}</td>";
                    echo "<td>{$pesan['admin_nama']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
