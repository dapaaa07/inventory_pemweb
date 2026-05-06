<?php
// Mulai session
session_start();

// Jika belum login
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: ../index.php?pesan=belum_login"); // <-- Ubah ke index.php
    exit;
}

// Jika bukan admin
if ($_SESSION['tipe_user'] != "admin") {
    header("location: ../homepage.php?pesan=akses_ditolak"); // <-- Ubah ke homepage.php
    exit;
}
?>