<?php
// Koneksi ke database
include '../koneksi.php';
// Ambil data berita dari database
$sql = "SELECT * FROM berita ORDER BY tanggal DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Artikel dan Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body class="bg-white text-gray-900">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-blue-600">Artikel dan Berita</h1>
        <p class="text-gray-500 mb-6">Aktivitas terbaru SMKS Bhakti Insani</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <?php while ($row = $result->fetch_assoc()): ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative">
                    <img src="data:image/jpeg;base64,<?= base64_encode($row['gambar']) ?>" 
                         alt="<?= $row['judul'] ?>" class="w-full h-48 object-cover"/>
                    <div class="absolute top-0 left-0 p-4">
                        <span class="inline-block bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded">
                            <?= htmlspecialchars($row['kategori']) ?>
                        </span>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex items-center text-gray-500 text-sm mt-2">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span><?= htmlspecialchars($row['tanggal']) ?></span>
                    </div>
                    <h2 class="text-lg font-semibold mt-2 text-blue-900">
                        <?= htmlspecialchars($row['judul']) ?>
                    </h2>
                </div>
            </div>
            <?php endwhile; ?>
            
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
