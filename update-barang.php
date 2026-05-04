<?php
include 'koneksi.php';
$kd_barang = $_POST['kd_barang'];
$kode_jenis = $_POST['kode_jenis'];
$nama_barang = $_POST['nama_barang'];
$stok = $_POST['stok'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$gambar_produk = $_POST['gambar_produk'];

mysqli_query($koneksi, "UPDATE tb_barang set kd_barang='$kd_barang', kode_jenis='$kode_jenis', nama_barang='$nama_barang', stok='$stok', harga_beli='$harga_beli', harga_jual='$harga_jual', gambar_produk='$gambar_produk' WHERE kd_barang='$kd_barang'");
header("location:data_barang.php?pesan=update");
?>