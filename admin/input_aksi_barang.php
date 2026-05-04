<?php
include '../koneksi.php';

$kd_barang   = $_POST['kd_barang'];
$kode_jenis  = $_POST['kode_jenis'];
$nama_barang = $_POST['nama_barang'];
$stok        = $_POST['stok'];
$harga_beli  = $_POST['harga_beli'];
$harga_jual  = $_POST['harga_jual'];

// Menangkap data file gambar
$nama_file = $_FILES['gambar_produk']['name'];
$tmp_file  = $_FILES['gambar_produk']['tmp_name'];

// Menambahkan angka unik (waktu) di depan nama file agar tidak ada nama file yang bentrok
$gambar_produk = time() . "_" . $nama_file;
$path          = "images/" . $gambar_produk; // Folder tujuan

// Memindahkan file dari lokasi sementara ke folder admin/images
if(move_uploaded_file($tmp_file, $path)){
    // Jika upload berhasil, insert ke database
    mysqli_query($koneksi, "INSERT INTO tb_barang (kd_barang, kode_jenis, nama_barang, stok, harga_beli, harga_jual, gambar_produk) VALUES ('$kd_barang', '$kode_jenis', '$nama_barang', '$stok', '$harga_beli', '$harga_jual', '$gambar_produk')");
}

header("location:data_barang.php");
?>