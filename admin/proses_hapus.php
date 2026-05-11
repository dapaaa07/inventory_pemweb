<?php
include 'cek_admin.php';
include '../koneksi.php';

$jenis = $_GET['jenis'];
$id = $_GET['id'];

if ($jenis == 'customer') {
    mysqli_query($koneksi, "DELETE FROM tb_customer WHERE id_customer='$id'");
    header("location:data_customer.php?status=sukses");
} elseif ($jenis == 'supplier') {
    mysqli_query($koneksi, "DELETE FROM tb_supplier WHERE id_supplier='$id'");
    header("location:data_supplier.php?status=sukses");
}
?>