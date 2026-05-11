<?php
include '../koneksi.php';

$kd_barang   = $_POST['kd_barang'];
$kode_jenis  = $_POST['kode_jenis'];
$nama_barang = $_POST['nama_barang'];
$stok        = $_POST['stok'];
$harga_beli  = $_POST['harga_beli'];
$harga_jual  = $_POST['harga_jual'];

$gambar_lama = $_POST['gambar_lama'];
$nama_file   = $_FILES['gambar_produk']['name'];
$tmp_file    = $_FILES['gambar_produk']['tmp_name'];

if($nama_file != "") {
    if(file_exists("images/".$gambar_lama)){
        unlink("images/".$gambar_lama);
    }
    $gambar_produk = time() . "_" . $nama_file;
    $path = "images/" . $gambar_produk;
    move_uploaded_file($tmp_file, $path);
    mysqli_query($koneksi, "UPDATE tb_barang SET kode_jenis='$kode_jenis', nama_barang='$nama_barang', stok='$stok', harga_beli='$harga_beli', harga_jual='$harga_jual', gambar_produk='$gambar_produk' WHERE kd_barang='$kd_barang'");
} else {
    mysqli_query($koneksi, "UPDATE tb_barang SET kode_jenis='$kode_jenis', nama_barang='$nama_barang', stok='$stok', harga_beli='$harga_beli', harga_jual='$harga_jual' WHERE kd_barang='$kd_barang'");
}

header("location:data_barang.php");
?>