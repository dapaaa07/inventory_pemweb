<?php
include '../koneksi.php';
include 'cek_admin.php';
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
                                    <h4 class="card-title">Data Jenis Barang</h4>

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
                <!-- content-wrapper ends -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <?php include 'elements/footer.php'; ?>

</body>
</html>