<?php
include '../koneksi.php';
include 'cek_admin.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM tb_jenis WHERE kode_jenis='$id'");
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
                                    <h4 class="card-title">Edit Data Jenis</h4>

                                    <form class="forms-sample" method="POST" action="update_jenis.php">
                                        <div class="form-group">
                                            <label for="kode_jenis">Kode Jenis</label>
                                            <input type="text" class="form-control" id="kode_jenis" name="kode_jenis" value="<?php echo $data['kode_jenis']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis">Jenis Barang</label>
                                            <input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo $data['jenis']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="satuan">Satuan</label>
                                            <input type="text" class="form-control" id="satuan" name="satuan" value="<?php echo $data['satuan']; ?>" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Simpan Perubahan</button>
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