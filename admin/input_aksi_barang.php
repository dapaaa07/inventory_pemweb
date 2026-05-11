<?php
include '../koneksi.php';
include 'cek_admin.php';

$kd_barang   = $_POST['kd_barang'];
$kode_jenis  = $_POST['kode_jenis'];
$nama_barang = $_POST['nama_barang'];
$stok        = $_POST['stok'];
$harga_beli  = $_POST['harga_beli'];
$harga_jual  = $_POST['harga_jual'];

$nama_file = $_FILES['gambar_produk']['name'];
$tmp_file  = $_FILES['gambar_produk']['tmp_name'];

$gambar_produk = time() . "_" . $nama_file;
$path          = "images/" . $gambar_produk;

if(move_uploaded_file($tmp_file, $path)){
    mysqli_query($koneksi, "INSERT INTO tb_barang (kd_barang, kode_jenis, nama_barang, stok, harga_beli, harga_jual, gambar_produk) VALUES ('$kd_barang', '$kode_jenis', '$nama_barang', '$stok', '$harga_beli', '$harga_jual', '$gambar_produk')");
}

header("location:data_barang.php");
?>