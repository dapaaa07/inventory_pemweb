<?php
// Memanggil file koneksi
include '../koneksi.php'; // Sesuaikan jalur jika koneksi.php ada di luar folder, misal: '../koneksi.php'
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'elements/header.php'; ?>

<body>
    <div class="container-scroller d-flex">
        <!-- Sidebar -->
        <?php include 'elements/sidebar.php'; ?>

        <div class="container-fluid page-body-wrapper">
            <!-- Navbar -->
            <?php include 'elements/navbar.php'; ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Jenis Barang</h4>

                                    <!-- Tombol Tambah Data -->
                                    <a href="input_jenis.php" class="btn btn-primary btn-sm mb-3">
                                        <i class="mdi mdi-plus"></i> Tambah Data Jenis
                                    </a>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Jenis</th>
                                                    <th>Jenis</th>
                                                    <th>Satuan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Mengambil data dari tb_jenis
                                                $query = mysqli_query($koneksi, "SELECT * FROM tb_jenis ORDER BY kode_jenis ASC");
                                                $no = 1;
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $data['kode_jenis']; ?></td>
                                                        <td><?php echo $data['jenis']; ?></td>
                                                        <td><?php echo $data['satuan']; ?></td>
                                                        <td>
                                                            <!-- Lempar kode_jenis ke parameter URL -->
                                                            <a href="edit_jenis.php?id=<?php echo $data['kode_jenis']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                            <a href="hapus_jenis.php?id=<?php echo $data['kode_jenis']; ?>"
                                                                class="btn btn-sm btn-danger btn-hapus"
                                                                data-id="<?php echo $data['kode_jenis']; ?>"
                                                                data-nama="<?php echo $data['jenis']; ?>">
                                                                Hapus
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Jika Anda punya elements/footer.php, panggil di sini -->
            </div>
        </div>
    </div>

    <!-- Script Utama Template -->
    <script src="../assets/backend/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/backend/js/off-canvas.js"></script>
    <script src="../assets/backend/js/hoverable-collapse.js"></script>
    <script src="../assets/backend/js/template.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script SweetAlert untuk Hapus Data Jenis -->
    <script>
        $('.btn-hapus').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            const nama = $(this).attr('data-nama');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data Jenis '" + nama + "' akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });
    </script>

    <!-- Notifikasi Sukses Hapus -->
    <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
        <script>
            Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success');
        </script>
    <?php endif; ?>
</body>

</html>