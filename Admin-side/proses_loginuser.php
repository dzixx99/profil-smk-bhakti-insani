<?php
session_start();
$_SESSION['kd_user'] = $user['kd_user']; 
include '../koneksi.php'; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Ambil data user berdasarkan username
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        // Simpan sesi login
        $_SESSION['kd_user'] = $user['kd_user'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama'] = $user['nama'];

        echo "<script>alert('Login berhasil!'); window.location.href = '../php/index.php';</script>";
    } else {
        echo "<script>alert('Username atau password salah!'); window.location.href = 'login_user.php';</script>";
    }
} else {
    header("Location: login_user.php");
    exit();
}
?>