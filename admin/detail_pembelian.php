<?php
include 'cek_admin.php';
include '../koneksi.php';

$no_pembelian = $_GET['no_pembelian'];
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
                    <div class="row mb-4">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Detail Transaksi Pembelian Faktur : <?php echo $no_pembelian; ?></h4>
                                    <form class="forms-sample" method="POST" action="proses.php?aksi=tambah_detail">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nomor Faktur</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="no_pembelian" value="<?php echo $no_pembelian; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Kode Barang</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="kd_barang" name="kd_barang"
                                                    value="<?php echo isset($_GET['kd_barang']) ? $_GET['kd_barang'] : ''; ?>" readonly required>
                                            </div>
                                            <div class="col-sm-2">
                                                <a href="pembelian_barang.php?no_pembelian=<?php echo $no_pembelian; ?>&action=pilih_barang" class="btn btn-info btn-block">Cari Barang</a>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nama Barang</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nama_barang"
                                                    value="<?php echo isset($_GET['nama_barang']) ? $_GET['nama_barang'] : ''; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Kode Jenis Barang</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="kode_jenis" name="kode_jenis"
                                                    value="<?php echo isset($_GET['kode_jenis']) ? $_GET['kode_jenis'] : ''; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Stok Saat Ini</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="stok"
                                                    value="<?php echo isset($_GET['stok']) ? $_GET['stok'] : ''; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Jumlah Barang</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="jumlah_barang" placeholder="Jumlah Barang" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Harga Barang</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="harga_barang" name="harga_barang"
                                                    value="<?php echo isset($_GET['harga_barang']) ? $_GET['harga_barang'] : ''; ?>" required>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                                        <button type="reset" class="btn btn-warning mr-2">Reset</button>
                                        <a href="transaksi_pembelian.php" class="btn btn-secondary">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Detail Transaksi Pembelian</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>No Faktur Pembelian</th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kode Jenis</th>
                                                    <th>Jenis</th>
                                                    <th>Jumlah Barang</th>
                                                    <th>Harga Barang</th>
                                                    <th>Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($koneksi, "SELECT dp.*, b.nama_barang, j.jenis FROM detail_pembelian dp LEFT JOIN tb_barang b ON dp.kd_barang = b.kd_barang LEFT JOIN tb_jenis j ON dp.kode_jenis = j.kode_jenis WHERE dp.no_pembelian='$no_pembelian'");
                                                $no = 1;
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $data['no_pembelian']; ?></td>
                                                        <td><?php echo $data['kd_barang']; ?></td>
                                                        <td><?php echo $data['nama_barang']; ?></td>
                                                        <td><?php echo $data['kode_jenis']; ?></td>
                                                        <td><?php echo $data['jenis']; ?></td>
                                                        <td><?php echo $data['jumlah_barang']; ?></td>
                                                        <td>Rp <?php echo number_format($data['harga_barang'], 0, ',', '.'); ?></td>
                                                        <td>Rp <?php echo number_format($data['total_harga'], 0, ',', '.'); ?></td>
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