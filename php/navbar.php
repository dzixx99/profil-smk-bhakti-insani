<?php
session_start();
$isLoggedIn = isset($_SESSION['kd_user']); // Cek apakah user sudah login
?>
<head>
<?php include 'head.php'; ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const links = document.querySelectorAll('nav a');

    links.forEach(link => {
        link.addEventListener("click", function(e) {
            if (this.hash !== "") {
                e.preventDefault();
                const target = document.querySelector(this.hash);
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 50, // Sesuaikan offset jika ada navbar fixed
                        behavior: "smooth"
                    });
                }
            }
        });
    });
});
</script>
</head>
<!-- Navbar Atas -->
<nav class="bg-blue-900 text-white flex flex-wrap justify-between items-center px-6 py-6">
    <div class="flex items-center space-x-3">
        <img src="../Assets/logobi.png" alt="Logo" class="w-12 h-12">
        <h2 class="text-xl font-bold text-white leading-tight">
            SMK <br class="hidden sm:block"> Bhakti Insani
        </h2>    
    </div>
    
    <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-6 text-sm">
        <div class="flex items-center space-x-2">
            <img src="../Assets/Phone.png" alt="Phone" class="w-5 h-5">
            <p>(0251) 8384869</p>
        </div>
        <div class="flex items-center space-x-2">
            <img src="../Assets/Email.png" alt="Email" class="w-5 h-5">
            <p>smkbhaktiinsani@gmail.com</p>
        </div>
    </div>
</nav>
    

<!-- Navbar Menu -->
<div class="sticky top-3 z-50">
    <nav class="bg-blue-900 text-white rounded-full max-w-6xl mx-auto mt-2 px-5 md:px-10 py-3 md:py-4 flex justify-between items-center shadow-lg">
        <ul class="flex space-x-4 md:space-x-8 text-xs md:text-sm lg:text-base">
            <li class="font-bold cursor-pointer"><a href="index.html#index">Beranda</a></li>
            <li class="relative group font-bold cursor-pointer flex items-center">
                <a href="#">Profil</a>
                <svg class="w-3 h-3 md:w-4 md:h-4 ml-1 md:ml-2 group-hover:rotate-180 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                <ul class="absolute left-0 mt-32 w-36 md:w-48 bg-blue-900 text-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 text-xs md:text-sm">
                    <li class="px-3 py-2 hover:bg-yellow-400"><a href="visi-misi.php">Visi dan Misi</a></li>
                    <li class="px-3 py-2 hover:bg-yellow-400"><a href="sejarah.php">Sejarah</a></li>
                </ul>
            </li>

            <?php if ($isLoggedIn) : ?>
                <li class="relative group font-bold cursor-pointer flex items-center">
                    <a href="#">Akademik</a>
                    <svg class="w-3 h-3 md:w-4 md:h-4 ml-1 md:ml-2 group-hover:rotate-180 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <ul class="absolute left-0 mt-32 w-36 md:w-48 bg-blue-900 text-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 text-xs md:text-sm">
                        <li class="px-3 py-2 hover:bg-yellow-400"><a href="dataGuru.php">Data Guru</a></li>
                        <li class="px-3 py-2 hover:bg-yellow-400"><a href="dataKelas.php">Data Kelas</a></li>
                        <li class="px-3 py-2 hover:bg-yellow-400"><a href="jadwal.php">Jadwal</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <li class="font-bold cursor-pointer"><a href="index.html#Fasilitas">Fasilitas</a></li>
            <li class="font-bold cursor-pointer"><a href="index.html#Kegiatan">Kegiatan</a></li>
            <li class="font-bold cursor-pointer"><a href="index.html#Kontak">Kontak Kami</a></li>
        </ul>

        <!-- Tombol Responsif -->
        <div class="flex space-x-2 md:space-x-4">
            <?php if ($isLoggedIn) : ?>
                <div class="relative group">
                    <button class="bg-yellow-300 text-blue-900 px-3 py-1 md:px-4 md:py-2 text-xs md:text-sm rounded-full font-bold hover:bg-blue-700 hover:text-white">
                    <a href="logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
                    </button>
                    <!-- <ul class="absolute right-0 mt-2 w-32 md:w-40 bg-blue-900 text-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 text-xs md:text-sm">
                        <li class="px-3 py-2 hover:bg-yellow-400">
                            
                        </li>
                    </ul> -->
                </div>
            <?php else : ?>
                <button class="border-2 border-yellow-300 text-yellow-300 px-3 py-1 md:px-4 md:py-2 text-xs md:text-sm rounded-full font-bold hover:bg-blue-700 hover:text-white">
                    <a href="../Admin-side/login.php">Masuk</a>
                </button>
                <button class="bg-yellow-300 text-blue-900 px-3 py-1 md:px-4 md:py-2 text-xs md:text-sm rounded-full font-bold hover:bg-blue-700 hover:text-white">
                    <a href="../Admin-side/regis_user.php">Daftar</a>
                </button>
            <?php endif; ?>
        </div>
    </nav>
</div>
