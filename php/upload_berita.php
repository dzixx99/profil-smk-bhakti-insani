<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori = $_POST['kategori'];

    // Buka file gambar sebagai binary
    $gambar = file_get_contents($_FILES['gambar']['tmp_name']);

    // Query SQL dengan 4 parameter
    $sql = "INSERT INTO berita (judul, isi, gambar, kategori) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // NULL untuk parameter gambar, akan diisi dengan send_long_data()
    $stmt->bind_param("sssb", $judul, $isi, $kategori, $null);

    // Kirim data gambar sebagai BLOB
    $stmt->send_long_data(3, $gambar); // Indeks ke-3 sesuai urutan di bind_param()

    // Eksekusi query
    if ($stmt->execute()) {
        echo "Berita berhasil diunggah!";
    } else {
        echo "Gagal mengunggah berita: " . $stmt->error;
    }

    // Tutup koneksi
    $stmt->close();
    $conn->close();
}
?>
