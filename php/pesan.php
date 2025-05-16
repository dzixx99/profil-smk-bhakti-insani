<?php
session_start();
$isLoggedIn = isset($_SESSION['kd_user']); // Cek apakah user login
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Membuat form berada di tengah layar */
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Menggunakan tinggi penuh viewport */
        }
    </style>
</head>
<body class="bg-gray-200">

    <div class="center-container">
        <div class="bg-white p-6 w-full max-w-lg rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-center text-blue-800 ">Kontak Kami</h1>
            <p class="text-center text-gray-600 mb-6">login terlebih dahulu</p>
            <form action="proses_pesan.php" method="POST">

                <!-- Judul -->
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700">Judul</label>
                    <input type="text" id="judul" name="judul" required 
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500"
                        placeholder="Judul">
                </div>

                <!-- Pesan -->
                <div class="mb-4">
                    <label for="pesan" class="block text-gray-700">Pesan</label>
                    <textarea id="pesan" name="pesan" required 
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500"
                        rows="4" placeholder="Tulis pesan Anda di sini..."></textarea>
                </div>

                <!-- Input Hidden untuk kd_user -->
                <?php if ($isLoggedIn): ?>
                    <input type="hidden" name="kd_user" value="<?= $_SESSION['kd_user']; ?>">
                <?php endif; ?>

                <!-- Tombol Submit -->
                <button type="submit" 
                    class="w-full bg-blue-600 text-white font-bold py-2 rounded-md hover:bg-blue-700 transition">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </div>

</body>
</html>
