<?php 
include '../koneksi.php';
include 'cek_admin.php';

$id = $_GET['id']; // ID ini menangkap kode_jenis dari URL

// Menghapus data dari database
mysqli_query($koneksi, "DELETE FROM tb_jenis WHERE kode_jenis='$id'");

// Mengalihkan halaman kembali dengan parameter status sukses untuk memicu SweetAlert
header("location:data_jenis.php?status=sukses");
?>