<?php
include 'cek_admin.php';
include '../koneksi.php';

$id_customer      = $_POST['id_customer'];
$nama_customer    = $_POST['nama_customer'];
$jenis_kelamin    = $_POST['jenis_kelamin'];
$alamat_customer  = $_POST['alamat_customer'];
$telepon_customer = $_POST['telepon_customer'];
$email_customer   = $_POST['email_customer'];

if ($_POST['pass_customer'] != "") {
    $pass_customer = md5($_POST['pass_customer']);
} else {
    $pass_customer = $_POST['password_lama'];
}

// Query Update
mysqli_query($koneksi, "UPDATE tb_customer SET 
    nama_customer='$nama_customer', 
    jenis_kelamin='$jenis_kelamin', 
    alamat_customer='$alamat_customer', 
    telepon_customer='$telepon_customer', 
    email_customer='$email_customer', 
    pass_customer='$pass_customer' 
    WHERE id_customer='$id_customer'");

header("location:data_customer.php");
?>