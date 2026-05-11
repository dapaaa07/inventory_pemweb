<?php
include 'cek_admin.php';
include '../koneksi.php';

$id_customer      = $_POST['id_customer'];
$nama_customer    = $_POST['nama_customer'];
$jenis_kelamin    = $_POST['jenis_kelamin'];
$alamat_customer  = $_POST['alamat_customer'];
$telepon_customer = $_POST['telepon_customer'];
$email_customer   = $_POST['email_customer'];
$pass_customer    = md5($_POST['pass_customer']);

mysqli_query($koneksi, "INSERT INTO tb_customer (id_customer, nama_customer, jenis_kelamin, alamat_customer, telepon_customer, email_customer, pass_customer) 
VALUES ('$id_customer', '$nama_customer', '$jenis_kelamin', '$alamat_customer', '$telepon_customer', '$email_customer', '$pass_customer')");

header("location:data_customer.php");
?>