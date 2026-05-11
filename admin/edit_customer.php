<?php
include 'cek_admin.php';
include '../koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_customer WHERE id_customer='$id'");
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
                                    <h4 class="card-title">Edit Data Customer</h4>

                                    <form class="forms-sample" method="POST" action="update_customer.php">
                                        <div class="form-group">
                                            <label for="id_customer">ID Customer</label>
                                            <input type="text" class="form-control" id="id_customer" name="id_customer" value="<?php echo $data['id_customer']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_customer">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="<?php echo $data['nama_customer']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                                <option value="Laki-laki" <?php if($data['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                                <option value="Perempuan" <?php if($data['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_customer">Alamat</label>
                                            <textarea class="form-control" id="alamat_customer" name="alamat_customer" rows="4" required><?php echo $data['alamat_customer']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon_customer">Nomor Telepon</label>
                                            <input type="number" class="form-control" id="telepon_customer" name="telepon_customer" value="<?php echo $data['telepon_customer']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email_customer">Email</label>
                                            <input type="email" class="form-control" id="email_customer" name="email_customer" value="<?php echo $data['email_customer']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="pass_customer" name="pass_customer" placeholder="Kosongkan jika tidak ingin mengubah password">
                                            <input type="hidden" name="password_lama" value="<?php echo $data['pass_customer']; ?>">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary mr-2">Update Data</button>
                                        <a href="data_customer.php" class="btn btn-light">Batal</a>
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