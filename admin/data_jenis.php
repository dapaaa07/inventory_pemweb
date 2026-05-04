<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="judul">
        <h1>Membuat CRUD dengan PHP dan MySql</h1>
        <h2>Menampilkan data dari database</h2>
    </div>
    <div class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li>
                <a href="#" class="active">Data Master</a>
                <ul class="dropdown-content">
                    <li><a href="#">Data User</a></li>
                    <li><a href="#">Data Jenis Barang</a></li>
                    <li><a href="data_barang.php">Data Barang</a></li>
                    <li><a href="#">Data Customer</a></li>
                    <li><a href="#">Data Supplier</a></li>
                </ul>
            </li>

            <li>
                <a href="#">Data Transaksi</a>
                <ul class="dropdown-content">
                    <li><a href="#">Transaksi Pembelian</a></li>
                    <li><a href="#">Transaksi Penjualan</a></li>
                </ul>
            </li>

            <li><a href="#">Laporan</a></li>
        </ul>
    </div>

    <br>

    <?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];
        if ($pesan == "input") {
            echo "Data berhasil diinput.";
        } else if ($pesan == "update") {
            echo "Data berhasil diupdate.";
        } else if ($pesan == "hapus") {
            echo "Data berhasil dihapus";
        }
    }
    ?>
    <br>
    <a href="input-barang.php">+ Tambah Data</a>

    <h3>Data user</h3>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Kode Jenis</th>
            <th>Nama Jenis</th>
            <th>Nama Barang</th>
            <th>Opsi</th>
        </tr>
        <?php
        include "koneksi.php";
        $query_mysql = mysqli_query($koneksi, "SELECT * FROM tb_barang");
        $nomor = 1;
        while ($data = mysqli_fetch_array($query_mysql)) {
        ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['kd_barang']; ?></td>
                <td><?php echo $data['kode_jenis']; ?></td>
                <td><?php echo $data['nama_barang']; ?></td>
                <td><?php echo $data['stok']; ?></td>
                <td><?php echo $data['harga_beli']; ?></td>
                <td><?php echo $data['harga_jual']; ?></td>
                <td>
                    <a class="edit" href="edit-barang.php?kd_barang=<?php echo $data['kd_barang']; ?>">Edit</a>
                    <a class="hapus" href="hapus-barang.php?kd_barang=<?php echo $data['kd_barang']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>