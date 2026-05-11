<?php
include 'koneksi.php';
include 'cek_admin.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'elements/header.php'; ?>

<body>
    <div class="container-scroller d-flex">

        <?php include 'elements/sidebar.php'; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:./partials/_navbar.html -->
            <?php include 'elements/navbar.php'; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Data User</h4>
                                    <p class="card-description">
                                        Silakan ubah data pada form di bawah ini.
                                    </p>

                                    <form class="forms-sample" method="POST" action="update.php">

                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Simpan Perubahan</button>
                                        <a href="index.php" class="btn btn-light">Batal</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- partial:./partials/_footer.html -->
                <footer class="footer">
                    <?php include 'elements/footer.php'; ?>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <?php include 'elements/javascript.php'; ?>
</body>

</html>