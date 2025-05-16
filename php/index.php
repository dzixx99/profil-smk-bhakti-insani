<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'head.php'; ?>
    <style>
        ::-webkit-scrollbar {
    display: none;
}


    </style>
</head>
<body >
    <?php include 'navbar.php'; ?>
    <?php include 'header.php'; ?>

    <?php include 'sambutan.php' ?>

    <div id="Fasilitas" style="height: 500px; padding-top:100px ; padding-bottom:100px ;">
    <?php include 'card.php';?> 
    </div>
    
    <?php include 'card-jurusan.php'; ?>
    <div id="Kegiatan" style="height: 500px; padding-top:100px ; padding-bottom:100px ;">
    <?php include 'berita.php'; ?>
    </div>
    <div id="Kontak" class="mt-[400px]">
    <?php include 'pesan.php';?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>