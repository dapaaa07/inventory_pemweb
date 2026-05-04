<?php
include 'koneksi.php';
$kd_barang = $_POST['kd_barang'];
$kode_jenis = $_POST['kode_jenis'];
$nama_barang = $_POST['nama_barang'];
$stok = $_POST['stok'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$gambar_produk = $_POST['gambar_produk'];

mysqli_query($koneksi,"INSERT INTO tb_barang VALUES('$kd_barang','$kode_jenis','$nama_barang','$stok','$harga_beli','$harga_jual','$gambar_produk')");
header("location:data_barang.php?pesan=input");
?>