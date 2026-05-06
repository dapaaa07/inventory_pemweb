<?php
// Memanggil file koneksi database
include 'koneksi.php';

if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
    if ($_SESSION['tipe_user'] == "admin") {
        header("location: admin/index.php");
    } else {
        header("location: homepage.php");
    }
    exit;
}

// Logika Register
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    // Enkripsi password menggunakan md5
    $password = md5($_POST['password']);
    $tipe_user = $_POST['tipe_user'];

    // Cek apakah username sudah ada di database agar tidak duplikat
    $cek_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

    if (mysqli_num_rows($cek_user) > 0) {
        $error = "Username sudah digunakan, silakan cari yang lain!";
    } else {
        // Jika belum ada, masukkan ke database
        $insert = mysqli_query($koneksi, "INSERT INTO user (username, password, tipe_user) VALUES ('$username', '$password', '$tipe_user')");

        if ($insert) {
            echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location='index.php';</script>";
        } else {
            $error = "Gagal mendaftar. Terjadi kesalahan!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - Spica Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="assets/backend/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/backend/vendors/css/vendor.bundle.base.css">
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/backend/css/style.css">
    <link rel="shortcut icon" href="assets/backend/images/favicon.png" />
</head>

<body>
    <div class="container-scroller d-flex">
        <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo">
                                <img src="assets/backend/images/logo.svg" alt="logo">
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Join us today! It takes only few steps</h6>

                            <!-- Menampilkan Pesan Error jika register gagal -->
                            <?php if (isset($error)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error; ?>
                                </div>
                            <?php endif; ?>

                            <form class="pt-3" method="POST" action="">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg border-left-0" id="username" name="username" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg border-left-0" id="password" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tipe_user">Tipe User</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-card-details text-primary"></i>
                                            </span>
                                        </div>
                                        <select class="form-control form-control-lg border-left-0" id="tipe_user" name="tipe_user" required>
                                            <option value="">-- Pilih Tipe --</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="my-3">
                                    <!-- Tombol submit -->
                                    <button type="submit" name="register" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">REGISTER</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="index.php" class="text-primary">Login</a>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-none d-lg-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2026 All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- base:js -->
    <script src="assets/backend/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/backend/js/off-canvas.js"></script>
    <script src="assets/backend/js/hoverable-collapse.js"></script>
    <script src="assets/backend/js/template.js"></script>
</body>

</html>