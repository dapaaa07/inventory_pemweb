<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: ../index.php?pesan=belum_login"); exit;
}
if ($_SESSION['tipe_user'] != "user") {
    header("location: ../index.php?pesan=akses_ditolak"); exit;
}
?>