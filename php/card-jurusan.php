<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Fasilitas Sarana dan Prasarana Unggulan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-white no-select relative">
    <div class="container mx-auto px-4">
        <h1 class="text-lg md:text-2xl font-bold text-blue-800">Program Keahlian</h1>
        <div class="border-t-4 border-red-600 w-32 md:w-52 mt-1 mb-8"></div>
        <div class="relative">
            <!-- Tombol navigasi kiri -->
            <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white p-2 md:p-3 rounded-full shadow-md z-10">
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <!-- Container scrollable -->
            <div class="flex overflow-x-auto space-x-4 scrollbar-hide scroll-smooth" id="card-container">
                <div class="relative flex-shrink-0 text-center p-2 sm:p-4">
                    <img alt="PPLG" class="mx-auto mb-2 rounded-lg w-full sm:w-[650px] h-40 sm:h-60 object-cover brightness-50" src="../Assets/card-jurusan/1.jpeg" />
                    <div class="absolute top-1/2 left-4 sm:left-8 transform -translate-y-1/2 text-white w-full px-2 sm:px-6">
                        <h1 class="font-bold text-sm sm:text-lg md:text-2xl lg:text-3xl mb-3 sm:mb-6 text-left">Pengembangan Perangkat Lunak dan Gim (PPLG)</h1>
                        <p class="text-xs sm:text-sm text-left w-[90%]">Mempelajari pemrograman dari website, android, hingga desktop.</p>
                    </div>
                </div>

                <div class="relative flex-shrink-0 text-center p-2 sm:p-4">
                    <img alt="TJKT" class="mx-auto mb-2 rounded-lg w-full sm:w-[650px] h-40 sm:h-60 object-cover brightness-50" src="../Assets/card-jurusan/tjkt.jpg" />
                    <div class="absolute top-1/2 left-4 sm:left-8 transform -translate-y-1/2 text-white w-full px-2 sm:px-6">
                        <h1 class="font-bold text-sm sm:text-lg md:text-2xl lg:text-3xl mb-3 sm:mb-6 text-left">Teknik Jaringan Komputer dan Telekomunikasi (TJKT)</h1>
                        <p class="text-xs sm:text-sm text-left w-[90%]">Mempelajari jaringan komputer, telekomunikasi, dan infrastruktur IT.</p>
                    </div>
                </div>

                <div class="relative flex-shrink-0 text-center p-2 sm:p-4">
                    <img alt="MP" class="mx-auto mb-2 rounded-lg w-full sm:w-[650px] h-40 sm:h-60 object-cover brightness-50" src="../Assets/card-jurusan/mp.jpg" />
                    <div class="absolute top-1/2 left-4 sm:left-8 transform -translate-y-1/2 text-white w-full px-2 sm:px-6">
                        <h1 class="font-bold text-sm sm:text-lg md:text-2xl lg:text-3xl mb-3 sm:mb-6 text-left">Manajemen Perkantoran (MP)</h1>
                        <p class="text-xs sm:text-sm text-left w-[90%]">Mempelajari tata kelola administrasi perkantoran.</p>
                    </div>
                </div>

                <div class="relative flex-shrink-0 text-center p-2 sm:p-4">
                    <img alt="PM" class="mx-auto mb-2 rounded-lg w-full sm:w-[650px] h-40 sm:h-60 object-cover brightness-50" src="../Assets/card-jurusan/pm.jpg" />
                    <div class="absolute top-1/2 left-4 sm:left-8 transform -translate-y-1/2 text-white w-full px-2 sm:px-6">
                        <h1 class="font-bold text-sm sm:text-lg md:text-2xl lg:text-3xl mb-3 sm:mb-6 text-left">Pemasaran (PM)</h1>
                        <p class="text-xs sm:text-sm text-left w-[90%]">Mempelajari strategi pemasaran dan bisnis digital.</p>
                    </div>
                </div>

                <div class="relative flex-shrink-0 text-center p-2 sm:p-4">
                    <img alt="DKV" class="mx-auto mb-2 rounded-lg w-full sm:w-[650px] h-40 sm:h-60 object-cover brightness-50" src="../Assets/card-jurusan/dkv.jpg" />
                    <div class="absolute top-1/2 left-4 sm:left-8 transform -translate-y-1/2 text-white w-full px-2 sm:px-6">
                        <h1 class="font-bold text-sm sm:text-lg md:text-2xl lg:text-3xl mb-3 sm:mb-6 text-left">Desain Komunikasi Visual (DKV)</h1>
                        <p class="text-xs sm:text-sm text-left w-[90%]">Mempelajari desain grafis, branding, dan multimedia.</p>
                    </div>
                </div>
            </div>

            <!-- Tombol navigasi kanan -->
            <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white p-2 md:p-3 rounded-full shadow-md z-10">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <script>
        const cardContainer = document.getElementById('card-container');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        let scrollAmount = 300;
        if (window.innerWidth > 640) {
            scrollAmount = 650;
        }

        prevBtn.addEventListener('click', () => {
            cardContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });

        nextBtn.addEventListener('click', () => {
            cardContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });

        let isDown = false;
        let startX;
        let scrollLeft;

        cardContainer.addEventListener('mousedown', (e) => {
            isDown = true;
            startX = e.pageX - cardContainer.offsetLeft;
            scrollLeft = cardContainer.scrollLeft;
        });

        cardContainer.addEventListener('mouseleave', () => {
            isDown = false;
        });

        cardContainer.addEventListener('mouseup', () => {
            isDown = false;
        });

        cardContainer.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - cardContainer.offsetLeft;
            const walk = (x - startX) * 2;
            cardContainer.scrollLeft = scrollLeft - walk;
        });

        window.addEventListener("resize", () => {
            scrollAmount = window.innerWidth > 640 ? 650 : 300;
        });
    </script>
</body>
</html>
