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
    <a href="Kelas/kelas_form.php" class="button">Tambah Data Kelas</a>
    
    <!-- Search Bar (Client-side) -->
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Cari Nama Kelas..." onkeyup="searchTable()">
    </div>

    <!-- Table -->
    <div class="table-container">
        <table id="kelasTable">
            <thead>
                <tr>
                    <th>Nama Kelas</th>
                    <th>Jumlah Siswa</th>
                    <th>Jumlah Siswi</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * FROM kelas";
                $query = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($query) > 0) {
                    while ($kelas = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>".$kelas['nama_kelas']."</td>";
                        echo "<td>".$kelas['jumlah_siswa']."</td>";
                        echo "<td>".$kelas['jumlah_siswi']."</td>";
                        echo "<td>";
                        echo "<a href='Kelas/kelas_form.php?kd_kelas=" . $kelas['kd_kelas'] . "' 
                        class='button'>Edit</a> ";

                        echo "<a href='Kelas/hapus.php?kd_kelas=" . $kelas['kd_kelas'] . "' 
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
        let td = rows[i].getElementsByTagName("td")[0]; // Kolom Nama Kelas
        if (td) {
            let txtValue = td.textContent || td.innerText;
            rows[i].style.display = txtValue.toLowerCase().includes(input) ? "" : "none";
        }
    }
}
</script>
