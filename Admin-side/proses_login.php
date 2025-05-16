<?php
session_start();
include '../koneksi.php'; // Pastikan koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Ambil data user dari database
    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard.php"); // Redirect ke dashboard
            exit();
        } else {
            $_SESSION['error'] = "Password salah";
            echo "Password salah";
            exit();
        }
    } else {
        $_SESSION['error'] = "Username tidak ditemukan";
        echo "Username tidak ditemukan";
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>