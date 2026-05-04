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
    <h3>Input data baru</h3>
    <form action="input-aksi-barang.php" method="POST">
        <table>
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="kd_barang"></td>
            </tr>
            <tr>
                <td>Kode Jenis</td>
                <td><input type="text" name="kode_jenis"></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_barang"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="number" name="stok"></td>
            </tr>
            <tr>
                <td>Harga Beli</td>
                <td><input type="number" name="harga_beli"></td>
            </tr>
            <tr>
                <td>Harga Jual</td>
                <td><input type="number" name="harga_jual"></td>
                <input type="hidden" name="gambar_produk">
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>