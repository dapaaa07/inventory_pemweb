<?php
session_start();
include '../koneksi.php';
$aksi = $_GET['aksi'];

if ($aksi == 'tambah_pembelian') {
    $no_pembelian = $_POST['no_pembelian'];
    $tanggal      = $_POST['tanggal_pembelian'];
    $id_supplier  = $_POST['id_supplier'];
    mysqli_query($koneksi, "INSERT INTO tb_pembelian (no_pembelian, tanggal_pembelian, id_supplier, total_barangall, total_hargaall) VALUES ('$no_pembelian', '$tanggal', '$id_supplier', 0, 0)");
    header("location:detail_pembelian.php?no_pembelian=" . $no_pembelian);
}
elseif ($aksi == 'tambah_detail') {
    $no_pembelian  = $_POST['no_pembelian'];
    $kd_barang     = $_POST['kd_barang'];
    $kode_jenis    = $_POST['kode_jenis'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $harga_barang  = $_POST['harga_barang'];

    $total_harga = $jumlah_barang * $harga_barang;

    $cek = mysqli_query($koneksi, "SELECT * FROM detail_pembelian WHERE no_pembelian='$no_pembelian' AND kd_barang='$kd_barang'");
    $ada = mysqli_num_rows($cek);

    if ($ada > 0) {
        $row_lama     = mysqli_fetch_assoc($cek);
        $jumlah_baru  = $row_lama['jumlah_barang'] + $jumlah_barang;
        $total_baru   = $jumlah_baru * $harga_barang;

        mysqli_query($koneksi, "UPDATE detail_pembelian 
            SET jumlah_barang = '$jumlah_baru', 
                harga_barang  = '$harga_barang', 
                total_harga   = '$total_baru' 
            WHERE no_pembelian = '$no_pembelian' AND kd_barang = '$kd_barang'");
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO detail_pembelian (no_pembelian, kd_barang, kode_jenis, jumlah_barang, harga_barang, total_harga) 
            VALUES ('$no_pembelian', '$kd_barang', '$kode_jenis', '$jumlah_barang', '$harga_barang', '$total_harga')");

        if (!$insert) {
            die("<b>Error insert detail_pembelian:</b> " . mysqli_error($koneksi) .
                "<br><br>Solusi: Jalankan query berikut di phpMyAdmin:<br>" .
                "<code>ALTER TABLE detail_pembelian MODIFY no_item INT(100) NOT NULL AUTO_INCREMENT;</code>");
        }
    }
    mysqli_query($koneksi, "UPDATE tb_barang SET stok = stok + $jumlah_barang WHERE kd_barang = '$kd_barang'");

    $q_sum   = mysqli_query($koneksi, "SELECT SUM(jumlah_barang) AS grand_qty, SUM(total_harga) AS grand_total FROM detail_pembelian WHERE no_pembelian='$no_pembelian'");
    $dt_sum  = mysqli_fetch_assoc($q_sum);

    $grand_qty   = $dt_sum['grand_qty']   ? $dt_sum['grand_qty']   : 0;
    $grand_total = $dt_sum['grand_total'] ? $dt_sum['grand_total'] : 0;

    mysqli_query($koneksi, "UPDATE tb_pembelian SET total_barangall = '$grand_qty', total_hargaall = '$grand_total' WHERE no_pembelian = '$no_pembelian'");

    header("location:detail_pembelian.php?no_pembelian=" . $no_pembelian);
}
