

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Berita</title>
</head>
<body>
    <h2>Tambah Berita</h2>
    <form action="upload_berita.php" method="post" enctype="multipart/form-data">
        <label>Judul Berita:</label>
        <input type="text" name="judul" required><br>

        <label>Isi Berita:</label>
        <textarea name="isi" required></textarea><br>

        <label>Gambar:</label>
        <input type="file" name="gambar" accept="image/*" required><br>
        <label>kategori:</label>
        <input type="text" name="kategori" required><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
