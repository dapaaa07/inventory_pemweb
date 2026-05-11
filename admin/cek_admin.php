<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: ../login.php?pesan=belum_login");
    exit;
}

if ($_SESSION['tipe_user'] != "admin") {
    header("location: ../index.php?pesan=akses_ditolak");
    exit;
}
?>