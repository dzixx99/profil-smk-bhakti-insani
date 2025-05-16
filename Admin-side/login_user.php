<!DOCTYPE html>
<html lang="id">
<?php include '../php/head.php'; ?>
<head>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        body {
            background: url('../Assets/Header/header1.jpg') no-repeat center center;
            background-size: cover;
            height: 100vh;
            position: relative;
        }
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            animation: fadeInDown 1s;
            position: relative;
            z-index: 1;
        }
        .btn-custom {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            color: yellow;
            margin-top: 10px;
            transition: all 0.3s ease-in-out;
            background: blue;
        }
        .btn-custom:hover {
            background: blue;
            color: white;
            opacity: 0.9;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<?php include 'nav.php'?>
    <div class="container d-flex justify-content-center align-items-center mt-[5%]">
        <div class="col-md-5 login-container animate__animated animate__fadeInDown text-center">
            <h2 class="mb-4">Login User</h2>
            <form action="proses_loginuser.php" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <button type="submit" class="btn btn-custom w-100">Login</button>
            </form>
            <p class="mt-3">Tidak punya akun? <a href="regis_user.php">Silahkan registrasi</a></p>
        </div>
    </div>
</body>
</html>