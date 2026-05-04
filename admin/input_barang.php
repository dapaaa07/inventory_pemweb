<?php include '../koneksi.php'; ?>
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
                                    <h4 class="card-title">Tambah Data Barang</h4>

                                    <!-- WAJIB pakai enctype="multipart/form-data" untuk upload file -->
                                    <form class="forms-sample" method="POST" action="input_aksi_barang.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="kd_barang">Kode Barang</label>
                                            <input type="text" class="form-control" id="kd_barang" name="kd_barang" placeholder="Contoh: BR-001" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="kode_jenis">Jenis Barang</label>
                                            <select class="form-control" id="kode_jenis" name="kode_jenis" required>
                                                <option value="">-- Pilih Jenis Barang --</option>
                                                <?php
                                                // Memanggil data dari tb_jenis untuk mengisi dropdown
                                                $query_jenis = mysqli_query($koneksi, "SELECT * FROM tb_jenis");
                                                while ($j = mysqli_fetch_array($query_jenis)) {
                                                    echo "<option value='" . $j['kode_jenis'] . "'>" . $j['kode_jenis'] . " - " . $j['jenis'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_barang">Nama Barang</label>
                                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="stok">Stok</label>
                                            <input type="number" class="form-control" id="stok" name="stok" placeholder="Jumlah Stok" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_beli">Harga Beli</label>
                                            <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Harga Beli" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_jual">Harga Jual</label>
                                            <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga Jual" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar_produk">Upload Gambar Produk</label>
                                            <input type="file" class="form-control" id="gambar_produk" name="gambar_produk" accept="image/*" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
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