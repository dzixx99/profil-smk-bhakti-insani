<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Bhakti Insani</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .carousel-container {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .carousel-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .carousel-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .active {
            opacity: 1;
        }

        /* Responsif ukuran teks */
        .carousel-text h1 {
            font-size: clamp(20px, 5vw, 50px);
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        .carousel-text p {
            font-size: clamp(12px, 2vw, 18px);
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        .carousel-text span {
            color: red;
        }

        /* Tombol Navigasi */
        .nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.3s;
            background: rgba(0, 0, 0, 0.5);
            font-size: 24px;
        }

        .nav-btn:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }
    </style>
</head>
<body class="bg-gray-200">
    <!-- Carousel -->
    <div class="carousel-container relative h-[300px] md:h-[450px] lg:h-[550px] md:-mt-[86px] -mt-[60px]">
        <div class="carousel-slide active brightness-50">
            <img src="../Assets/Header/header1.jpg" alt="Gambar 1" class="h-full w-full">
        </div>
        <div class="carousel-slide brightness-50">
            <img src="../Assets/Header/header2.jpg" alt="Gambar 2" class="h-full w-full">
        </div>
        <div class="carousel-slide brightness-50">
            <img src="../Assets/Header/header4.jpg" alt="Gambar 4" class="h-full w-full">
        </div>

        <!-- Teks Overlay Responsif di Kiri -->
        <div class="carousel-text absolute top-1/2 left-6 md:left-10 lg:left-20 -translate-y-1/2 text-white text-left w-[80%] max-w-lg md:max-w-2xl">
            <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold">Selamat datang di <br>website sistem informasi <br> <span>SMK Bhakti Insani</span></h1>
            <p class="text-sm md:text-lg lg:text-xl mt-2">by : Muhammad Adziqri Ramadhan</p>
        </div>
    </div>

    <script>
        const slides = document.querySelectorAll('.carousel-slide');
        let currentIndex = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
                if (i === index) slide.classList.add('active');
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(currentIndex);
        }

        setInterval(nextSlide, 4000);
    </script>

</body>
</html>
