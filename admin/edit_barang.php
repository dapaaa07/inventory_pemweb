<?php
include '../koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE kd_barang='$id'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'elements/header.php'; ?>

<body>
    <div class="container-scroller d-flex">
        <?php include 'elements/sidebar.php'; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include 'elements/navbar.php'; ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Data Barang</h4>

                                    <!-- Kirim juga gambar lama agar bisa dihapus jika diganti baru -->
                                    <form class="forms-sample" method="POST" action="update_barang.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="kd_barang">Kode Barang</label>
                                            <input type="text" class="form-control" id="kd_barang" name="kd_barang" value="<?php echo $data['kd_barang']; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="kode_jenis">Jenis Barang</label>
                                            <select class="form-control" id="kode_jenis" name="kode_jenis" required>
                                                <?php
                                                $query_jenis = mysqli_query($koneksi, "SELECT * FROM tb_jenis");
                                                while ($j = mysqli_fetch_array($query_jenis)) {
                                                    // Mengecek apakah kode_jenis sama dengan data saat ini, jika ya beri tag selected
                                                    $selected = ($j['kode_jenis'] == $data['kode_jenis']) ? 'selected' : '';
                                                    echo "<option value='" . $j['kode_jenis'] . "' $selected>" . $j['kode_jenis'] . " - " . $j['jenis'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_barang">Nama Barang</label>
                                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="stok">Stok</label>
                                            <input type="number" class="form-control" id="stok" name="stok" value="<?php echo $data['stok']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_beli">Harga Beli</label>
                                            <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="<?php echo $data['harga_beli']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_jual">Harga Jual</label>
                                            <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="<?php echo $data['harga_jual']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Gambar Produk Saat Ini:</label><br>
                                            <img src="images/<?php echo $data['gambar_produk']; ?>" style="width: 100px; border-radius: 10px; margin-bottom: 10px;">

                                            <!-- Hidden input untuk menyimpan nama gambar lama -->
                                            <input type="hidden" name="gambar_lama" value="<?php echo $data['gambar_produk']; ?>">

                                            <label for="gambar_produk">Ganti Gambar (Kosongkan jika tidak ingin mengganti)</label>
                                            <input type="file" class="form-control" id="gambar_produk" name="gambar_produk" accept="image/*">
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Simpan Perubahan</button>
                                        <a href="data_barang.php" class="btn btn-light">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/backend/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/backend/js/off-canvas.js"></script>
    <script src="../assets/backend/js/hoverable-collapse.js"></script>
    <script src="../assets/backend/js/template.js"></script>
</body>

</html>