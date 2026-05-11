<?php
include 'cek_admin.php';
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
                                    <h4 class="card-title">Kelola Data Customer</h4>
                                    <a href="input_customer.php" class="btn btn-primary btn-sm mb-3">Tambah Customer</a>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID Customer</th>
                                                    <th>Nama Customer</th>
                                                    <th>L/P</th>
                                                    <th>Telepon</th>
                                                    <th>Email</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($koneksi, "SELECT * FROM tb_customer");
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $data['id_customer']; ?></td>
                                                        <td><?php echo $data['nama_customer']; ?></td>
                                                        <td><?php echo $data['jenis_kelamin']; ?></td>
                                                        <td><?php echo $data['telepon_customer']; ?></td>
                                                        <td><?php echo $data['email_customer']; ?></td>
                                                        <td>
                                                            <a href="edit_customer.php?id=<?php echo $data['id_customer']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                            <a href="proses_hapus_customer.php?jenis=customer&id=<?php echo $data['id_customer']; ?>" class="btn btn-sm btn-danger btn-hapus" data-nama="<?php echo $data['nama_customer']; ?>">Hapus</a>
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
    <?php include 'elements/footer.php'; ?>
</body>

</html>