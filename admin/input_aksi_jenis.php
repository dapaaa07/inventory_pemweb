<?php
include '../koneksi.php';
include 'cek_admin.php';

$kode_jenis = $_POST['kode_jenis'];
$jenis      = $_POST['jenis'];
$satuan     = $_POST['satuan'];

// Insert ke database
mysqli_query($koneksi, "INSERT INTO tb_jenis (kode_jenis, jenis, satuan) VALUES ('$kode_jenis', '$jenis', '$satuan')");

// Redirect ke data_jenis
header("location:data_jenis.php");
