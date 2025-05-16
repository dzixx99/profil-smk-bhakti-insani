<!DOCTYPE html>
<html lang="id">
<head>
    <?php include 'head.php'; 
    include '../koneksi.php';
    ?>
        <style>
            body {
                background-color: #f3f4f6;
                font-family: Arial, sans-serif;
            }

            .container {
                width: 90%;
                max-width: 1000px;
                margin: 30px auto;
                padding: 20px;
                background: white;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }

            h2 {
                margin-bottom: 20px;
                color: #007bff;
            }

            /* Search Bar */
            .search-container {
                margin-bottom: 20px;
                text-align: center;
            }

            .search-container input {
                width: 70%;
                max-width: 400px;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 14px;
            }

            .search-container button {
                padding: 8px 15px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .search-container button:hover {
                background-color: #0056b3;
            }

            /* Table */
            .table-container {
                width: 100%;
                overflow-x: auto;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
                background: white;
            }

            table th, table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
                font-size: 14px;
            }

            table th {
                background-color: #007bff;
                color: white;
            }

            table tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            table tr:hover {
                background-color: #ddd;
            }

            table td img {
                border-radius: 5px;
            }

            /* Responsif */
            @media screen and (max-width: 768px) {
                .container {
                    width: 95%;
                }

                .search-container input {
                    width: 80%;
                }

                table th, table td {
                    font-size: 12px;
                    padding: 5px;
                }
            }

            @media screen and (max-width: 480px) {
                .search-container input {
                    width: 90%;
                }

                table th, table td {
                    font-size: 10px;
                    padding: 4px;
                }
            }
        </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container">
    <h2>Data kelas SMK Bhakti Insani</h2>

    <!-- Search Bar -->
    <div class="search-container">
        <form method="GET">
            <input type="text" name="search" placeholder="Cari Nama Kelas" 
                   value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit">Cari</button>
        </form>
    </div>

    <!-- Table -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nama Kelas</th>
                    <th>Jumlah Siswa</th>
                    <th>Jumlah Siswi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
                
                $sql = "SELECT * FROM kelas";
                if (!empty($search)) {
                    $sql .= " WHERE nama_kelas LIKE '%$search%' ";
                }

                $query = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($query) > 0) {
                    while ($kelas = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>".$kelas['nama_kelas']."</td>";
                        echo "<td>".$kelas['jumlah_siswa']."</td>";
                        echo "<td>".$kelas['jumlah_siswi']."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Tidak ada data ditemukan</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
