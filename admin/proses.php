<?php
session_start();
include '../koneksi.php';

// Menangkap parameter aksi
$aksi = $_GET['aksi'];

// 1. PROSES TAMBAH TRANSAKSI MASTER
if ($aksi == 'tambah_pembelian') {
    $no_pembelian = $_POST['no_pembelian'];
    $tanggal      = $_POST['tanggal_pembelian'];
    $id_supplier  = $_POST['id_supplier'];

    // Insert nilai awal total barang & harga 0
    mysqli_query($koneksi, "INSERT INTO tb_pembelian (no_pembelian, tanggal_pembelian, id_supplier, total_barangall, total_hargaall) VALUES ('$no_pembelian', '$tanggal', '$id_supplier', 0, 0)");

    // Alihkan langsung ke halaman detail
    header("location:detail_pembelian.php?no_pembelian=" . $no_pembelian);
}

// 2. PROSES TAMBAH DETAIL ITEM BARANG
elseif ($aksi == 'tambah_detail') {
    $no_pembelian  = $_POST['no_pembelian'];
    $kd_barang     = $_POST['kd_barang'];
    $kode_jenis    = $_POST['kode_jenis'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $harga_barang  = $_POST['harga_barang'];

    // Kalkulasi Total Harga per Item
    $total_harga = $jumlah_barang * $harga_barang;

    // A. Insert ke tabel detail_pembelian
    mysqli_query($koneksi, "INSERT INTO detail_pembelian (no_pembelian, kd_barang, kode_jenis, jumlah_barang, harga_barang, total_harga) VALUES ('$no_pembelian', '$kd_barang', '$kode_jenis', '$jumlah_barang', '$harga_barang', '$total_harga')");

    // B. Update penambahan Stok di tb_barang
    mysqli_query($koneksi, "UPDATE tb_barang SET stok = stok + $jumlah_barang WHERE kd_barang = '$kd_barang'");

    // C. Hitung ulang Grand Total untuk Faktur ini
    $q_sum = mysqli_query($koneksi, "SELECT SUM(jumlah_barang) AS grand_qty, SUM(total_harga) AS grand_total FROM detail_pembelian WHERE no_pembelian='$no_pembelian'");
    $dt_sum = mysqli_fetch_assoc($q_sum);

    $grand_qty   = $dt_sum['grand_qty'] ? $dt_sum['grand_qty'] : 0;
    $grand_total = $dt_sum['grand_total'] ? $dt_sum['grand_total'] : 0;

    // D. Update nilai Grand Total ke tb_pembelian (Master)
    mysqli_query($koneksi, "UPDATE tb_pembelian SET total_barangall = '$grand_qty', total_hargaall = '$grand_total' WHERE no_pembelian = '$no_pembelian'");

    // Kembali ke form detail untuk input barang selanjutnya
    header("location:detail_pembelian.php?no_pembelian=" . $no_pembelian);
}
