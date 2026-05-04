<?php
include 'koneksi.php';
$kd_barang = $_GET['kd_barang'];

mysqli_query($koneksi, "DELETE FROM tb_barang WHERE kd_barang='$kd_barang'");
header("location:data_barang.php?pesan=hapus");
