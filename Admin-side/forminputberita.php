<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label>Judul:</label>
    <input type="text" name="judul" required><br><br>

    <label>Isi:</label>
    <textarea name="isi" required></textarea><br><br>

    <label>Gambar:</label>
    <input type="file" name="gambar" required><br><br>

    <label>Kategori:</label>
    <input type="text" name="kategori" required><br><br>

    <button type="submit">Upload</button>
</form>
