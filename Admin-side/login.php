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
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            animation: fadeInDown 1s;
            position: relative;
            z-index: 1;
            text-align: center;
            color: black;
        }
        .btn-custom {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            color: yellow;
            margin-top: 20px;
            transition: all 0.3s ease-in-out;
        }
        .btn-user {
            background: blue;
        }
        .btn-admin {
            background: yellow;
            color: blue;
        }
        .btn-custom:hover {
            background: blue;
            color: yellow;
            opacity: 0.9;
            transform: scale(1.05);
        }
        .btn-admin:hover {
            background: yellow;
            color: blue;
            opacity: 0.9;
            transform: scale(1.05);
            
        }
        .register-link {
            margin-top: 15px;
            font-size: 14px;
            color: #333;
        }
        .register-link a {
            color: #007bff;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php include 'nav.php'?>
    <div class="container d-flex justify-content-center align-items-center mt-[10%]">
        <div class="col-md-5 login-container animate__animated animate__fadeInDown">
            <h2 class="mb-4">Pilih Login Sebagai</h2>
            <a href="login_user.php" class="btn btn-custom btn-user">Login sebagai User</a>
            <a href="login_Admin.php" class="btn btn-custom btn-admin">Login sebagai Admin</a>
        </div>
    </div>
</body>
</html>
