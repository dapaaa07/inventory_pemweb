<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="judul">
        <h1>Membuat CRUD dengan PHP dan MySql</h1>
        <h2>Menampilkan data dari database</h2>
    </div>

    <div class="navbar">
        <ul>
            <li><a href="#">Home</a></li>
            <li>
                <a href="#">Data Master</a>
                <ul class="dropdown-content">
                    <li><a href="#">Data User</a></li>
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
    <a href="input.php">+ Tambah Data</a>

    <h3>Data user</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Opsi</th>
        </tr>
        <?php
        include "koneksi.php";
        $query_mysql = mysqli_query($koneksi, "SELECT * FROM user");
        $nomor = 1;
        while ($data = mysqli_fetch_array($query_mysql)) {
        ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['pekerjaan']; ?></td>
                <td>
                    <a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
                    <a class="hapus" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>