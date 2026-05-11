<?php
include 'cek_customer.php';
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
                                    <h4 class="card-title">Katalog Data Barang</h4>
                                    <p class="card-description">Daftar barang yang tersedia di gudang saat ini.</p>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Gambar</th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jenis</th>
                                                    <th>Stok Tersedia</th>
                                                    <th>Harga Jual</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($koneksi, "SELECT tb_barang.*, tb_jenis.jenis FROM tb_barang LEFT JOIN tb_jenis ON tb_barang.kode_jenis = tb_jenis.kode_jenis ORDER BY tb_barang.nama_barang ASC");
                                                $no = 1;
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td>
                                                            <?php if ($data['gambar_produk'] != ""): ?>
                                                                <img src="../admin/images/<?php echo $data['gambar_produk']; ?>" style="width: 50px; height: 50px; border-radius: 5px; object-fit: cover;" alt="Gambar">
                                                            <?php else: ?>
                                                                <span class="text-muted">No Image</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo $data['kd_barang']; ?></td>
                                                        <td><?php echo $data['nama_barang']; ?></td>
                                                        <td><?php echo $data['jenis']; ?></td>
                                                        <td><label class="badge badge-success"><?php echo $data['stok']; ?></label></td>
                                                        <td>Rp <?php echo number_format($data['harga_jual'], 0, ',', '.'); ?></td>
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