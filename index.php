<?php
session_start();

// 1. CEK JIKA SUDAH LOGIN: Arahkan ke folder masing-masing
if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
    if ($_SESSION['tipe_user'] == "admin") {
        header("location: admin/index.php");
    } elseif ($_SESSION['tipe_user'] == "customer") {
        header("location: customer/index.php");
    } elseif ($_SESSION['tipe_user'] == "supplier") {
        header("location: supplier/index.php");
    }
    exit;
}

// Memanggil file koneksi
include 'koneksi.php';

// 2. LOGIKA LOGIN
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($query);

        // Simpan ke session
        $_SESSION['username'] = $username;
        $_SESSION['tipe_user'] = strtolower(trim($data['tipe_user']));
        $_SESSION['status'] = "login";

        // Logika routing berdasarkan 3 tipe_user
        if ($_SESSION['tipe_user'] == "admin") {
            header("location: admin/index.php");
        } elseif ($_SESSION['tipe_user'] == "customer") {
            header("location: customer/index.php");
        } elseif ($_SESSION['tipe_user'] == "supplier") {
            header("location: supplier/index.php");
        } else {
            // Jika tipe user tidak dikenali
            $error = "Tipe user tidak valid!";
            session_destroy();
        }
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Inventory</title>
    <link rel="stylesheet" href="assets/backend/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/backend/vendors/css/vendor.bundle.base.css">
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
                            <h4>Welcome back!</h4>
                            <h6 class="font-weight-light">Silakan login untuk melanjutkan.</h6>

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

                                <div class="my-3">
                                    <button type="submit" name="login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Belum punya akun? <a href="register.php" class="text-primary">Daftar</a>
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

    <script src="assets/backend/vendors/js/vendor.bundle.base.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if (isset($_GET['pesan'])): ?>
        <script>
            <?php if ($_GET['pesan'] == "belum_login"): ?>
                Swal.fire({
                    icon: 'warning',
                    title: 'Akses Ditolak!',
                    text: 'Anda harus login terlebih dahulu.'
                });
            <?php elseif ($_GET['pesan'] == "akses_ditolak"): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Terlarang!',
                    text: 'Anda tidak memiliki hak akses halaman tersebut.'
                });
            <?php elseif ($_GET['pesan'] == "logout"): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Sampai Jumpa!',
                    text: 'Anda telah berhasil logout.'
                });
            <?php endif; ?>
        </script>
    <?php endif; ?>
</body>

</html>