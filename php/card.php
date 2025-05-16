<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Fasilitas Sarana dan Prasarana Unggulan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .slider-container {
            overflow: hidden;
            position: relative;
            width: 100%;
        }
        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
            gap: 20px; /* Memberi jarak antar card */
            width: max-content;
        }
    </style>
</head>
<body class="bg-white">
    <div class="container  md:my-20 ">
        <!-- <h1 class="text-2xl font-bold text-blue-800 pl-20">Fasilitas Sarana dan Prasarana Unggulan</h1>
        <div class="border-t-4 border-red-600 w-96 mt-1 mb-8 ml-20"></div> -->
        <div class="slider-container">
            <div class="slider" id="slider">
                <div class="card flex-shrink-0 text-center p-4 border-2 border-yellow-400 rounded-lg w-40 md:w-64">
                    <img src="../Assets/card/sekolah.png" alt="Gedung Milik Sendiri" class="mx-auto mb-2" width="100" height="100"/>
                    <p class="text-blue-800 font-semibold">Gedung Milik Sendiri</p>
                </div>
                <div class="card flex-shrink-0 text-center p-4 border-2 border-yellow-400 rounded-lg w-40 md:w-64">
                    <img src="../Assets/card/lab.png" alt="6 Laboratorium" class="mx-auto mb-2" width="100" height="100"/>
                    <p class="text-blue-800 font-semibold">6 Laboratorium</p>
                </div>
                <div class="card flex-shrink-0 text-center p-4 border-2 border-yellow-400 rounded-lg w-40 md:w-64">
                    <img src="../Assets/card/simdig.png" alt="Laboratorium SimDig" class="mx-auto mb-2" width="100" height="100"/>
                    <p class="text-blue-800 font-semibold">Laboratorium SimDig</p>
                </div>
                <div class="card flex-shrink-0 text-center p-4 border-2 border-yellow-400 rounded-lg w-40 md:w-64">
                    <img src="../Assets/card/konseling.png" alt="Ruang Konseling/BKK" class="mx-auto mb-2" width="100" height="100"/>
                    <p class="text-blue-800 font-semibold">Ruang Konseling/BKK</p>
                </div>
                <div class="card flex-shrink-0 text-center p-4 border-2 border-yellow-400 rounded-lg w-40 md:w-64">
                    <img src="../Assets/card/agama.png" alt="Ruang Ibadah" class="mx-auto mb-2" width="100" height="100"/>
                    <p class="text-blue-800 font-semibold">Ruang Ibadah</p>
                </div>
                <div class="card flex-shrink-0 text-center p-4 border-2 border-yellow-400 rounded-lg w-40 md:w-64">
                    <img src="../Assets/card/perpus.png" alt="Perpustakaan" class="mx-auto mb-2" width="100" height="100"/>
                    <p class="text-blue-800 font-semibold">Perpustakaan</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        const slider = document.getElementById("slider");
        let cards = document.querySelectorAll(".card");
        const cardWidth = 264 + 20; // Width of card + gap
        let slideIndex = 0;
        
        // Duplicate first few cards for infinite scrolling
        cards.forEach(card => {
            let clone = card.cloneNode(true);
            slider.appendChild(clone);
        });
        
        function moveSlide() {
            slideIndex++;
            slider.style.transition = "transform 0.5s ease-in-out";
            slider.style.transform = `translateX(${-slideIndex * cardWidth}px)`;
            
            if (slideIndex >= cards.length) {
                setTimeout(() => {
                    slider.style.transition = "none";
                    slideIndex = 0;
                    slider.style.transform = "translateX(0px)";
                }, 500);
            }
        }
        
        setInterval(moveSlide, 3000); // Auto slide every 3 seconds
    </script>
</body>
</html>
