<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="judul">
        <h1>Membuat CRUD dengan PHP dan MySql</h1>
        <h2>Menampilkan data dari database</h2>
    </div>
    <br>
    <a href="index.php">Lihat semua data</a>
    <br>
    <h3>Edit data</h3>
    <?php
    include 'koneksi.php';
    $kd_barang = $_GET['kd_barang'];
    $query_mysql = mysqli_query($koneksi, "SELECT * FROM tb_barang where kd_barang='$kd_barang'");
    $nomor = 1;
    while ($data = mysqli_fetch_array($query_mysql)) {
    ?>
        <form action="update-barang.php" method="POST">
            <table>
                <tr>
                    <td>Kode Barang</td>
                    <td>
                        <input type="text" name="kd_barang" value="<?php echo $data['kd_barang'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Kode Jenis</td>
                    <td><input type="text" name="kode_jenis" value="<?php echo $data['kode_jenis'] ?>"></td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td><input type="text" name="nama_barang" value="<?php echo $data['nama_barang'] ?>"></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="text" name="stok" value="<?php echo $data['stok'] ?>"></td>
                </tr>
                <tr>
                    <td>Harga Beli</td>
                    <td><input type="text" name="harga_beli" value="<?php echo $data['harga_beli'] ?>"></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td><input type="text" name="harga_jual" value="<?php echo $data['harga_jual'] ?>"></td>
                    <input type="hidden" name="gambar_produk" id="gambar_produk">
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Simpan"></td>
                </tr>
            </table>
        </form>
    <?php } ?>
</body>

</html>