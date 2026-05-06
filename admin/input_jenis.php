<!DOCTYPE html>
<html lang="en">
    <?php include '../koneksi.php'; 
    include 'cek_admin.php';?>

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
                                    <h4 class="card-title">Tambah Data Jenis</h4>
                                    <p class="card-description">Silakan isi data jenis barang baru.</p>

                                    <form class="forms-sample" method="POST" action="input_aksi_jenis.php">
                                        <div class="form-group">
                                            <label for="kode_jenis">Kode Jenis</label>
                                            <input type="text" class="form-control" id="kode_jenis" name="kode_jenis" placeholder="Contoh: JN-001" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis">Jenis Barang</label>
                                            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Contoh: Otomotif" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="satuan">Satuan</label>
                                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Contoh: Pcs" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                        <a href="data_jenis.php" class="btn btn-light">Batal</a>
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