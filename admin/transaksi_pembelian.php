<?php
include 'cek_admin.php';
include '../koneksi.php';

$no_pembelian_otomatis = "BUY-" . date('YmdHis');
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
                                    <h4 class="card-title">Form Transaksi Pembelian (Barang Masuk)</h4>
                                    <form class="forms-sample" method="POST" action="proses.php?aksi=tambah_pembelian">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nomor Faktur Pembelian</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="no_pembelian" value="<?php echo $no_pembelian_otomatis; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tanggal Pembelian</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="tanggal_pembelian" value="<?php echo date('Y-m-d'); ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Supplier</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="id_supplier" required>
                                                    <option value="">-- Pilih Supplier --</option>
                                                    <?php
                                                    $q_sup = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
                                                    while ($sup = mysqli_fetch_array($q_sup)) {
                                                        echo "<option value='" . $sup['id_supplier'] . "'>" . $sup['nama_supplier'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                                        <button type="reset" class="btn btn-warning mr-2">Reset</button>
                                        <a href="index_admin.php" class="btn btn-secondary">Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Transaksi Pembelian (Barang Masuk)</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>No Faktur Pembelian</th>
                                                    <th>Tanggal Pembelian</th>
                                                    <th>ID Supplier</th>
                                                    <th>Nama Supplier</th>
                                                    <th>Total Barang</th>
                                                    <th>Total Harga</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($koneksi, "SELECT p.*, s.nama_supplier FROM tb_pembelian p LEFT JOIN tb_supplier s ON p.id_supplier = s.id_supplier ORDER BY p.tanggal_pembelian DESC");
                                                $no = 1;
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $data['no_pembelian']; ?></td>
                                                        <td><?php echo $data['tanggal_pembelian']; ?></td>
                                                        <td><?php echo $data['id_supplier']; ?></td>
                                                        <td><?php echo $data['nama_supplier']; ?></td>
                                                        <td><?php echo $data['total_barangall']; ?></td>
                                                        <td>Rp <?php echo number_format($data['total_hargaall'], 0, ',', '.'); ?></td>
                                                        <td>
                                                            <a href="detail_pembelian.php?no_pembelian=<?php echo $data['no_pembelian']; ?>" class="btn btn-sm btn-info">Detail Transaksi</a>
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