<?php
include '../koneksi.php';
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
                                    <h4 class="card-title">Data Barang</h4>

                                    <a href="input_barang.php" class="btn btn-primary btn-sm mb-3">
                                        <i class="mdi mdi-plus"></i> Tambah Data Barang
                                    </a>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Gambar</th>
                                                    <th>Kode Barang</th>
                                                    <th>Jenis</th>
                                                    <th>Nama Barang</th>
                                                    <th>Stok</th>
                                                    <th>Harga Beli</th>
                                                    <th>Harga Jual</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Join tabel tb_barang dan tb_jenis untuk menampilkan nama jenis
                                                $query = mysqli_query($koneksi, "SELECT tb_barang.*, tb_jenis.jenis FROM tb_barang LEFT JOIN tb_jenis ON tb_barang.kode_jenis = tb_jenis.kode_jenis ORDER BY tb_barang.kd_barang ASC");
                                                $no = 1;
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td>
                                                            <!-- Menampilkan gambar dari folder images -->
                                                            <?php if ($data['gambar_produk'] != ""): ?>
                                                                <img src="images/<?php echo $data['gambar_produk']; ?>" style="width: 50px; height: 50px; border-radius: 5px; object-fit: cover;" alt="Gambar">
                                                            <?php else: ?>
                                                                <span class="text-muted">No Image</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo $data['kd_barang']; ?></td>
                                                        <td><?php echo $data['jenis']; ?></td>
                                                        <td><?php echo $data['nama_barang']; ?></td>
                                                        <td><?php echo $data['stok']; ?></td>
                                                        <td>Rp <?php echo number_format($data['harga_beli'], 0, ',', '.'); ?></td>
                                                        <td>Rp <?php echo number_format($data['harga_jual'], 0, ',', '.'); ?></td>
                                                        <td>
                                                            <a href="edit_barang.php?id=<?php echo $data['kd_barang']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                            <a href="hapus_barang.php?id=<?php echo $data['kd_barang']; ?>"
                                                                class="btn btn-sm btn-danger btn-hapus"
                                                                data-id="<?php echo $data['kd_barang']; ?>"
                                                                data-nama="<?php echo $data['nama_barang']; ?>">
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
            </div>
        </div>
    </div>

    <!-- Script Utama -->
    <script src="../assets/backend/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/backend/js/off-canvas.js"></script>
    <script src="../assets/backend/js/hoverable-collapse.js"></script>
    <script src="../assets/backend/js/template.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script SweetAlert -->
    <script>
        $('.btn-hapus').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            const nama = $(this).attr('data-nama');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data Barang '" + nama + "' akan dihapus permanen beserta gambarnya!",
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

    <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
        <script>
            Swal.fire('Terhapus!', 'Data barang berhasil dihapus.', 'success');
        </script>
    <?php endif; ?>
</body>

</html>