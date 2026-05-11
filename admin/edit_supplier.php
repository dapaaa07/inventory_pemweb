<?php
include 'cek_admin.php';
include '../koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_supplier WHERE id_supplier='$id'");
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
                                    <h4 class="card-title">Edit Data Supplier</h4>

                                    <form class="forms-sample" method="POST" action="update_supplier.php">
                                        <div class="form-group">
                                            <label for="id_supplier">ID Supplier</label>
                                            <input type="text" class="form-control" id="id_supplier" name="id_supplier" value="<?php echo $data['id_supplier']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_supplier">Nama Supplier</label>
                                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?php echo $data['nama_supplier']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_supplier">Alamat</label>
                                            <textarea class="form-control" id="alamat_supplier" name="alamat_supplier" rows="4" required><?php echo $data['alamat_supplier']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon_supplier">Nomor Telepon</label>
                                            <input type="number" class="form-control" id="telepon_supplier" name="telepon_supplier" value="<?php echo $data['telepon_supplier']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email_supplier">Email</label>
                                            <input type="email" class="form-control" id="email_supplier" name="email_supplier" value="<?php echo $data['email_supplier']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="pass_supplier" name="pass_supplier" placeholder="Kosongkan jika tidak ingin mengubah password">
                                            <input type="hidden" name="password_lama" value="<?php echo $data['pass_supplier']; ?>">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary mr-2">Update Data</button>
                                        <a href="data_supplier.php" class="btn btn-light">Batal</a>
                                    </form>
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