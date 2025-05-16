<!DOCTYPE html>
<html lang="id">
<head>
    <?php include '../php/head.php'; ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f4f4f4;
            display: flex;
        }

        /* Navbar */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #00369C;
            color: white;
            padding: 15px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1100;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
        }

        .navbar .logo img {
            height: 50px;
            margin-right: 10px;
        }

        .navbar .text {
            font-size: 18px;
            font-weight: bold;
        }

        .navbar .info {
            font-size: 14px;
            display: flex;
            gap: 15px;
        }

        .navbar .info div {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .navbar .info img {
            height: 20px;
        }

        /* Sidebar */
        #sidebar {
            width: 250px;
            height: 100vh;
            background: #00369C;
            color: white;
            position: fixed;
            left: -250px;
            top: 60px;
            transition: left 0.5s ease-in-out;
            padding-top: 20px;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        #sidebar.open {
            left: 0;
        }

        #sidebar h2 {
            text-align: center;
            padding-bottom: 20px;
            font-weight: bold;
        }

        #sidebar a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }

        #sidebar a:hover {
            background: #34495e;
        }

        #closeSidebar {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 25px;
            cursor: pointer;
        }

        /* Main Content */
        #content-area {
            width: 100%;
            min-height: 100vh;
            transition: margin-left 0.5s ease-in-out, width 0.5s ease-in-out;
            padding: 80px 20px 20px 20px;
        }

        .content-expanded {
            margin-left: 250px;
            width: calc(100% - 250px);
        }

        #toggleSidebar {
            font-size: 20px;
            cursor: pointer;
            background: #2c3e50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: 0.3s;
            display: inline-block;
            margin-top: 10px;
        }

        #toggleSidebar:hover {
            background: #34495e;
        }

        .content {
            flex-grow: 1;
        }

        .content .card {
            background-color: #ecf0f1;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: width 0.5s ease-in-out;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="../Assets/logobi.png" alt="Logo">
            <h2>SMK Bhakti Insani</h2>    
        </div>
        
        <div class="info">
            <div>
                <img src="../Assets/Phone.png" alt="Phone">
                <p>(0251) 8384869</p>
            </div>
            <div>
                <img src="../Assets/Email.png" alt="Email">
                <p>smkbhaktiinsani@gmail.com</p>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div id="sidebar">
        <span id="closeSidebar">&times;</span>
        <h2>Admin Panel</h2>
        <a href="?page=dashboard">Beranda</a>
        <a href="?page=DataGuru">Data Guru</a>
        <a href="?page=DataKelas">Data Kelas</a>
        <a href="?page=DataJadwal">Buat Jadwal</a>
        <a href="?page=Pesan">Pesan</a>
        <a href="../php/logout.php" style="color: red;">Log Out</a>
    </div>

    <!-- Main Content -->
    <div id="content-area">
        <span id="toggleSidebar">☰ Menu</span>
        <?php 
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($page == 'dashboard') {
                    include('main.php');
                } else if ($page == 'DataGuru') {
                    include('Guru/dataguru.php');
                } else if ($page == 'DataSiswa') {
                    include('Siswa/datasiswa.php');
                } else if ($page == 'DataKelas') {
                    include('Kelas/datakelas.php');
                } else if ($page == 'DataJadwal') {
                    include('jadwal/data_jadwal.php');
                } else if ($page == 'Pesan') {
                    include('Pesan/pesan.php');
                }
            }
        ?>
    </div>

    <script>
        const sidebar = document.getElementById("sidebar");
        const contentArea = document.getElementById("content-area");
        const toggleSidebarBtn = document.getElementById("toggleSidebar");
        const closeSidebarBtn = document.getElementById("closeSidebar");

        toggleSidebarBtn.addEventListener("click", function () {
            sidebar.classList.add("open");
            contentArea.classList.add("content-expanded");
            toggleSidebarBtn.style.display = "none";
        });

        closeSidebarBtn.addEventListener("click", function () {
            sidebar.classList.remove("open");
            contentArea.classList.remove("content-expanded");
            toggleSidebarBtn.style.display = "inline-block";
        });
    </script>
</body>
</html>
