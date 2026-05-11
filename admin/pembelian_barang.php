<?php
include '../koneksi.php';
include 'cek_admin.php';

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
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Pilih Data Barang</h4>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Barang</th>
                                                    <th>Kode Jenis</th>
                                                    <th>Nama Barang</th>
                                                    <th>Stok</th>
                                                    <th>Harga Beli</th>
                                                    <th>Harga Jual</th>
                                                    <th>Gambar Produk</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($koneksi, "SELECT tb_barang.*, tb_jenis.jenis FROM tb_barang LEFT JOIN tb_jenis ON tb_barang.kode_jenis = tb_jenis.kode_jenis ORDER BY tb_barang.kd_barang ASC");
                                                $no = 1;
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $data['kd_barang']; ?></td>
                                                        <td><?php echo $data['kode_jenis']; ?></td>
                                                        <td><?php echo $data['nama_barang']; ?></td>
                                                        <td><?php echo $data['stok']; ?></td>
                                                        <td>Rp <?php echo number_format($data['harga_beli'], 0, ',', '.'); ?></td>
                                                        <td>Rp <?php echo number_format($data['harga_jual'], 0, ',', '.'); ?></td>
                                                        <td>
                                                            <?php if ($data['gambar_produk'] != ""): ?>
                                                                <img src="images/<?php echo $data['gambar_produk']; ?>" style="width: 50px; height: 50px; border-radius: 5px; object-fit: cover;" alt="Gambar">
                                                            <?php else: ?>
                                                                <span class="text-muted">No Image</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <a href="detail_pembelian.php?no_pembelian=<?php echo $no_pembelian; ?>&kd_barang=<?php echo $data['kd_barang']; ?>&nama_barang=<?php echo urlencode($data['nama_barang']); ?>&kode_jenis=<?php echo $data['kode_jenis']; ?>&stok=<?php echo $data['stok']; ?>&harga_barang=<?php echo $data['harga_beli']; ?>"
                                                                class="btn btn-sm btn-primary">Pilih</a>
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