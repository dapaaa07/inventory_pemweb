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
                                    <h4 class="card-title">Kelola Data Supplier</h4>
                                    <a href="input_supplier.php" class="btn btn-primary btn-sm mb-3">Tambah Supplier</a>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID Supplier</th>
                                                    <th>Nama Supplier</th>
                                                    <th>Alamat</th>
                                                    <th>Telepon</th>
                                                    <th>Email</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $data['id_supplier']; ?></td>
                                                        <td><?php echo $data['nama_supplier']; ?></td>
                                                        <td><?php echo $data['alamat_supplier']; ?></td>
                                                        <td><?php echo $data['telepon_supplier']; ?></td>
                                                        <td><?php echo $data['email_supplier']; ?></td>
                                                        <td>
                                                            <a href="edit_supplier.php?id=<?php echo $data['id_supplier']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                            <a href="proses_hapus.php?jenis=supplier&id=<?php echo $data['id_supplier']; ?>" class="btn btn-sm btn-danger btn-hapus" data-nama="<?php echo $data['nama_supplier']; ?>">Hapus</a>
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