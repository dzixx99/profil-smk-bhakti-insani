<?php include '../koneksi.php';

?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 10px;
    }

    h2 {
        font-size: 24px;
        text-align: center;
    }

    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
        transition: 0.3s;
        margin-bottom: 10px;
    }

    .button:hover {
        background-color: #0056b3;
    }

    /* Wrapper untuk tabel agar bisa di-scroll di layar kecil */
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
        /* Mencegah teks pecah di tabel */
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

    table td a {
        color: #007BFF;
        text-decoration: none;
    }

    table td a:hover {
        text-decoration: underline;
    }

    /* Responsif untuk layar kecil */
    @media screen and (max-width: 768px) {
        h2 {
            font-size: 20px;
        }

        table th,
        table td {
            font-size: 12px;
            padding: 8px;
        }

        .button {
            font-size: 14px;
            padding: 8px 15px;
        }
    }

    @media screen and (max-width: 480px) {
        h2 {
            font-size: 18px;
        }

        table th,
        table td {
            font-size: 10px;
            padding: 6px;
        }

        .button {
            font-size: 12px;
            padding: 6px 12px;
        }
    }
</style>

<div class="col-12 col-m-12">
    <h2>Data Siswa SMK Bhakti Insani</h2>
    <h2><?php $sql = "SELECT * FROM kelas";
        $result = mysqli_query($conn, $sql);
        ?></h2>
    <a href="Siswa/siswa_form.php" class="button">Tambah Data Siswa</a>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Kd</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenkel</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM siswa";
                $query = mysqli_query($conn, $sql);
                while ($siswa = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>" . $siswa['kd_siswa'] . "</td>";
                    echo "<td>" . $siswa['NIS'] . "</td>";
                    echo "<td>" . $siswa['nama_siswa'] . "</td>";
                    echo "<td>" . $siswa['sw_tmp_lahir'] . "</td>";
                    echo "<td>" . $siswa['sw_tgl_lahir'] . "</td>";
                    echo "<td>" . $siswa['jenkel'] . "</td>";
                    echo "<td>" . $siswa['sw_alamat'] . "</td>";
                    echo "<td><img src='uploads/" . $siswa['sw_foto'] . "' width='50' height='50'></td>";
                    echo "<td>";
                    echo "<a href='Siswa/siswa_form.php?kd_siswa=" . $siswa['kd_siswa'] . "' 
                    class='bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700'>Edit</a> ";

                    echo "<a href='Siswa/hapus_siswa.php?kd_siswa=" . $siswa['kd_siswa'] . "' 
                    class='bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 ml-2' 
                    onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>";

                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>