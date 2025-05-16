<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'php/head.php'; ?>
    <style>
        body {
            color: white;
            margin-bottom: 0;
        }

        hr {
            width: 90%;
            height: 3px;
            background-color: white;
            border: none;
            margin: 10px auto;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            align-items: start;
            flex-wrap: wrap;
            padding: 20px;
            background-color: #1E3A8A;
            color: white;
        }

        .footer-section {
            display: flex;
            flex-direction: column;
        }

        .social-icons a img {
            transition: transform 0.3s ease;
        }

        .social-icons a:hover img {
            transform: scale(1.2);
        }

        .footer-bottom {
            text-align: center;
            padding: 10px;
            background-color: #172554;
        }
    </style>
</head>

<body class="p-0 m-0">
    <hr>
    <!-- <footer class="footer-container flex">
        <div class="footer-section flex items-center space-x-3">
            <img src="../   Assets/logobi.png" alt="Logo" class="w-24 h-24">
            <h2 class="text-2xl font-bold text-white">SMK <br>Bhakti Insani</h2>
        </div>
        <div class="footer-section space-y-4">
            <div class="flex items-center space-x-2">
                <img src="../   Assets/maps.png" alt="Location" class="w-5 h-5">
                <p class="w-80">Jl. Bhakti Insani No.5, RT.04/RW.05, Batutulis, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16133</p>
            </div>
            <div class="flex items-center space-x-8">
                <div class="flex items-center space-x-2">
                    <img src="../   Assets/telp.png" alt="Telp" class="w-5 h-5">
                    <p>(0251) 8384869</p>
                </div>
                <div class="flex items-center space-x-2">
                    <img src="Assets/fax.png" alt="Fax" class="w-5 h-5">
                    <p>(0251) 8384869</p>
                </div>
            </div>
            <div class="flex flex-col">
                <p class="font-semibold">Media Sosial</p>
                <div class="social-icons flex space-x-4 mt-2">
                    <a href="https://www.instagram.com/smkbhaktiinsani_official" target="_blank">
                        <img src="Assets/instagram.png" alt="Instagram" class="w-6 h-6">
                    </a>
                    <a href="https://www.tiktok.com/@smk.bhakti.insani" target="_blank">
                        <img src="Assets/tiktok.png" alt="Tiktok" class="w-6 h-6">
                    </a>
                    <a href="#">
                        <img src="Assets/X.png" alt="Twitter" class="w-6 h-6">
                    </a>
                </div>
            </div>
        </div>
    </footer> -->
     <footer class="w-full h-auto bg-blue-900 flex justify-evenly p-4">
        <div class="flex items-center space-x-3">
            <img src="../Assets/logobi.png" alt="Logo" class="w-24 h-24">
            <h2 class="text-2xl font-bold text-white">SMK <br>Bhakti Insani</h2>    
        </div>
        <div class="flex flex-col items-start space-y-4">
            <div class="flex items-center space-x-2">
                <img src="../Assets/maps.png" alt="Location" class="w-5 h-5">
                <p class="w-80">Jl. Bhakti Insani No.5, RT.04/RW.05, Batutulis, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16133</p>
            </div>
            <div class="flex items-center space-x-2">
                <img src="../Assets/Email.png" alt="Email" class="w-5 h-5">
                <p>smkbhaktiinsani@gmail.com</p>
            </div>
            <div class="flex flex-col">
                <p class="font-semibold">Media Sosial</p>
                <div class="social-icons flex space-x-4 mt-2">
                    <a href="https://www.instagram.com/smkbhaktiinsani_official" target="_blank">
                        <img src="../Assets/instagram.png" alt="Instagram" class="w-6 h-6">
                    </a>
                    <a href="https://www.tiktok.com/@smk.bhakti.insani" target="_blank">
                        <img src="../Assets/tiktok.png" alt="Tiktok" class="w-6 h-6">
                    </a>
                    <a href="https://youtube.com/@smkbhaktiinsanikotabogor6788?si=Ss8je1cnMpSF5Yyw" target="_blank">
                        <img src="../Assets/yt.png" alt="Tiktok" class="w-6 h-6">
                    </a>
                    <a href="#">
                        <img src="../Assets/X.png" alt="Twitter" class="w-6 h-6">
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer-bottom">
        <p>&copy; 2024 SMK Bhakti Insani. All Rights Reserved.</p>
    </div>
</body>

</html>
