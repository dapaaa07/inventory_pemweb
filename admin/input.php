<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tambah Data User - Spica Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../assets/backend/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/backend/vendors/css/vendor.bundle.base.css">
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/backend/css/style.css">
    <link rel="shortcut icon" href="../assets/backend/images/favicon.png" />
</head>

<body>
    <div class="container-scroller d-flex">

        <!-- Memanggil file sidebar dari folder elements -->
        <?php include 'elements/sidebar.php'; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:./partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <!-- Sisa Navbar... -->
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tambah Data User</h4>
                                    <p class="card-description">
                                        Silakan isi data baru pada form di bawah ini.
                                    </p>

                                    <!-- Arahkan action form ke input-aksi.php sesuai file Anda sebelumnya -->
                                    <form class="forms-sample" method="POST" action="input-aksi.php">

                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
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
                    <!-- Footer Content -->
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- base:js -->
    <script src="../assets/backend/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/backend/js/off-canvas.js"></script>
    <script src="../assets/backend/js/hoverable-collapse.js"></script>
    <script src="../assets/backend/js/template.js"></script>
</body>

</html>