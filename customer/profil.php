<?php
include 'cek_customer.php';
include '../koneksi.php';

$username = $_SESSION['username'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update_profil'])) {
    $password_baru = $_POST['password'];

    if ($password_baru != "") {
        $password_enkripsi = md5($password_baru);
        mysqli_query($koneksi, "UPDATE user SET password='$password_enkripsi' WHERE username='$username'");
        echo "<script>alert('Password berhasil diubah!'); window.location='profil.php';</script>";
    }
}
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
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Profil Akun Saya</h4>
                                    <form class="forms-sample" method="POST" action="">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" value="<?php echo $data['username']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe Akun</label>
                                            <input type="text" class="form-control" value="<?php echo strtoupper($data['tipe_user']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Ganti Password Baru</label>
                                            <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin ganti password">
                                        </div>
                                        <button type="submit" name="update_profil" class="btn btn-primary mr-2">Update Profil</button>
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