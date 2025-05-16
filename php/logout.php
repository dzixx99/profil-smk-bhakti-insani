
<?php
session_start();
session_unset(); // Hapus semua variabel session
session_destroy(); // Hancurkan session

// Hapus cookie jika menggunakan login dengan cookie
setcookie("user_token", "", time() - 3600, "/");

header("Location: ../php/index.php"); // Redirect ke halaman login
exit();
?>