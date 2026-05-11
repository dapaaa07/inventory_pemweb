<?php
// Mulai session
session_start();

// 1. Cek apakah user belum login
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    // Jika belum login, tendang kembali ke halaman login
    header("location: ../login.php?pesan=belum_login");
    exit;
}

// 2. Cek apakah yang login BUKAN admin
if ($_SESSION['tipe_user'] != "admin") {
    // Jika user biasa memaksa masuk ke link admin, kembalikan ke homepage
    header("location: ../index.php?pesan=akses_ditolak");
    exit;
}
?>