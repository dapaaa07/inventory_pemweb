<?php
// Memanggil file koneksi database di paling atas
include 'koneksi.php';

// Menangkap id dari URL (dikirim dari tombol Edit di index.php)
$id = $_GET['id'];

// Mengambil data user berdasarkan id dari database
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'elements/header.php'; ?>

<body>
    <div class="container-scroller d-flex">

        <!-- Memanggil file sidebar dari folder elements -->
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

                                    <!-- Arahkan action form ke update.php -->
                                    <form class="forms-sample" method="POST" action="update.php">

                                        <!-- Input hidden untuk menampung ID (Tidak terlihat di layar tapi ikut terkirim) -->
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <!-- Bisa menggunakan input text biasa seperti ini -->
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Simpan Perubahan</button>
                                        <!-- Tombol cancel mengarah kembali ke index.php -->
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