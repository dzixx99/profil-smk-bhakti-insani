
<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash password sebelum disimpan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $check_query = "SELECT * FROM user WHERE username = '$username'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Username sudah digunakan, coba yang lain!'); window.location.href = 'register.php';</script>";
        exit();
    }

    // Simpan data ke database
    $sql = "INSERT INTO user (nama, email, username, password) VALUES ('$nama', '$email', '$username', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href = 'login_user.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan, coba lagi.'); window.location.href = 'register.php';</script>";
    }
} else {
    header("Location: register.php");
    exit();
}
?>

