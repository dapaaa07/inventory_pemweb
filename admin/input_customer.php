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
                                    <h4 class="card-title">Tambah Data Customer</h4>
                                    <p class="card-description">Isi form di bawah ini untuk menambahkan customer baru.</p>

                                    <form class="forms-sample" method="POST" action="input_aksi_customer.php">
                                        <div class="form-group">
                                            <label for="id_customer">ID Customer</label>
                                            <input type="text" class="form-control" id="id_customer" name="id_customer" placeholder="Contoh: CUST-001" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_customer">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Nama Customer" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_customer">Alamat</label>
                                            <textarea class="form-control" id="alamat_customer" name="alamat_customer" rows="4" placeholder="Alamat Lengkap" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon_customer">Nomor Telepon</label>
                                            <input type="number" class="form-control" id="telepon_customer" name="telepon_customer" placeholder="08xxxxxxxxxx" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email_customer">Email</label>
                                            <input type="email" class="form-control" id="email_customer" name="email_customer" placeholder="email@contoh.com" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="pass_customer" name="pass_customer" placeholder="Password untuk login customer" required>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
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