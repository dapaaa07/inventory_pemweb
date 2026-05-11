<?php 
include '../koneksi.php';
include 'cek_admin.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM tb_jenis WHERE kode_jenis='$id'");

header("location:data_jenis.php?status=sukses");
?>