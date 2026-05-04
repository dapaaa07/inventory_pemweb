<?php
include '../koneksi.php';

$kode_jenis = $_POST['kode_jenis'];
$jenis      = $_POST['jenis'];
$satuan     = $_POST['satuan'];

// Update data di database
mysqli_query($koneksi, "UPDATE tb_jenis SET jenis='$jenis', satuan='$satuan' WHERE kode_jenis='$kode_jenis'");

// Redirect ke halaman data_jenis
header("location:data_jenis.php");
?>