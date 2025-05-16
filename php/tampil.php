<?php
require 'vendor/autoload.php'; // Pastikan path ini sesuai dengan lokasi Composer autoload

use PhpOffice\PhpSpreadsheet\IOFactory;

$filePath = 'jadwal.xlsx'; // Sesuaikan dengan lokasi file Anda
$spreadsheet = IOFactory::load($filePath);
$sheet = $spreadsheet->getActiveSheet();
$data = $sheet->toArray();

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelajaran</title>
    <style>
        .table-container {
            width: 100%;
            overflow-x: auto;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 10px;
        }

        thead {
            background-color: #007BFF;
            color: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            font-weight: bold;
            background-color: #0056b3;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        tbody td {
            font-weight: normal;
            color: #333;
        }

        @media screen and (max-width: 768px) {
            table {
                font-size: 12px;
            }
            th, td {
                padding: 5px;
            }
        }
    </style>
</head>
<body>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <?php
                // Ambil header dari baris pertama file Excel
                if (!empty($data)) {
                    foreach ($data[0] as $header) {
                        echo "<th>$header</th>";
                    }
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Mulai dari baris kedua karena baris pertama adalah header
            for ($i = 1; $i < count($data); $i++) {
                echo "<tr>";
                foreach ($data[$i] as $cell) {
                    echo "<td>$cell</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
