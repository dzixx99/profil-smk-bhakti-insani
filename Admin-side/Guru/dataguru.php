<?php include '../koneksi.php'; ?>

<style>
    .kelas-container {
        background-color: #f3f4f6;
        font-family: Arial, sans-serif;
        width: 90%;
        max-width: 1000px;
        margin: 30px auto;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .kelas-container .button {
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

    .kelas-container .button:hover {
        background-color: #0056b3;
    }

    .kelas-container h2 {
        margin-bottom: 20px;
        color: #007bff;
    }

    /* Search Bar */
    .kelas-container .search-container {
        margin-bottom: 20px;
        text-align: center;
    }

    .kelas-container .search-container input {
        width: 70%;
        max-width: 400px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    /* Table */
    .kelas-container .table-container {
        width: 100%;
        overflow-x: auto;
    }

    .kelas-container table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        background: white;
    }

    .kelas-container table th, 
    .kelas-container table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
        font-size: 14px;
    }

    .kelas-container table th {
        background-color: #007bff;
        color: white;
    }

    .kelas-container table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .kelas-container table tr:hover {
        background-color: #ddd;
    }

</style>

<div class="kelas-container">
    <h2>Data kelas SMK Bhakti Insani</h2>
    <a href="Guru/v_form.php" class="button">Tambah Data Guru</a>
    
    <!-- Search Bar (Client-side) -->
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Cari Nama Kelas..." onkeyup="searchTable()">
    </div>

    <!-- Table -->
    <div class="table-container">
        <table id="kelasTable">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenkel</th>
                    <th>Pendidikan</th>
                    <th>Mapel</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * FROM guru";
                $query = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($query) > 0) {
                    while ($guru = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>".$guru['kd_guru']."</td>";
                        echo "<td>".$guru['NIP']."</td>";
                        echo "<td>".$guru['nama_guru']."</td>";
                        echo "<td>".$guru['gr_tmp_lahir']."</td>";
                        echo "<td>".$guru['gr_tgl_lahir']."</td>";
                        echo "<td>".$guru['jenkel']."</td>";
                        echo "<td>".$guru['pendidikan']."</td>";
                        echo "<td>".$guru['mapel']."</td>";
                        echo "<td>";
                        echo "<a href='Guru/v_form.php?kd_guru=" . $guru['kd_guru'] . "' 
                        class='button'>Edit</a> ";

                        echo "<a href='Guru/hapus.php?kd_guru=" . $guru['kd_guru'] . "' 
                        class='button' style='background-color: red;' 
                        onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data ditemukan</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script>
function searchTable() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let table = document.getElementById("kelasTable");
    let rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {  
        let cells = rows[i].getElementsByTagName("td");
        let found = false;

        // Loop melalui semua kolom di baris
        for (let j = 0; j < cells.length; j++) {
            let txtValue = cells[j].textContent || cells[j].innerText;
            if (txtValue.toLowerCase().includes(input)) {
                found = true;
                break;
            }
        }

        rows[i].style.display = found ? "" : "none"; // Tampilkan/sembunyikan baris
    }
}
</script>
