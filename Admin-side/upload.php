<?php
include '../koneksi.php'; // Ganti dengan nama database-mu

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori = $_POST['kategori'];
    $tanggal = date("Y-m-d H:i:s"); // Ambil waktu saat ini

    // Konversi gambar ke format biner
    $gambar = file_get_contents($_FILES['gambar']['tmp_name']);

    // Query untuk menyimpan data
    $stmt = $conn->prepare("INSERT INTO berita (judul, isi, gambar, tanggal, kategori) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssbss", $judul, $isi, $gambar, $tanggal, $kategori);
    
    if ($stmt->execute()) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Gagal menyimpan data.";
    }

    $stmt->close();
}
$conn->close();
?>
