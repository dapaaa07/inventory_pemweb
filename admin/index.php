<?php
// Memanggil file koneksi database di paling atas
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'elements/header.php'; ?>

<body>
    <div class="container-scroller d-flex">

        <!-- Memanggil file sidebar dari folder elements -->
        <?php include 'elements/sidebar.php'; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:./partials/_navbar.html -->
            <?php include 'elements/navbar.php'; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data User</h4>

                                    <!-- Ini adalah tombol tambah data yang baru -->
                                    <a href="input.php" class="btn btn-primary btn-sm mb-3">
                                        <i class="mdi mdi-plus"></i> Tambah Data
                                    </a>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Query untuk mengambil semua data dari tabel 'user'
                                                $query = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id DESC");

                                                // Membuat variabel untuk nomor urut tabel
                                                $no = 1;

                                                // Melakukan perulangan untuk menampilkan data
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $data['nama']; ?></td>
                                                        <td><?php echo $data['alamat']; ?></td>

                                                        <!-- Menggunakan style badge bawaan template Anda untuk pekerjaan -->
                                                        <td><label class="badge badge-info"><?php echo $data['pekerjaan']; ?></label></td>

                                                        <!-- Tombol aksi yang diarahkan ke file edit.php dan hapus.php -->
                                                        <td>
                                                            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                            <a href="hapus.php?id=<?php echo $data['id']; ?>"
                                                                class="btn btn-sm btn-danger btn-hapus"
                                                                data-id="<?php echo $data['id']; ?>"
                                                                data-nama="<?php echo $data['nama']; ?>">
                                                                Hapus
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row end -->
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:./partials/_footer.html -->
                <footer class="footer">
                    <?php include 'elements/footer.php'; ?>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- ... -->
    <!-- sweetalert -->
    <script>
        // Menangkap semua elemen dengan class 'btn-hapus'
        $('.btn-hapus').on('click', function(e) {
            // Menghentikan link agar tidak langsung berpindah halaman
            e.preventDefault();

            const href = $(this).attr('href');
            const nama = $(this).attr('data-nama');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data user " + nama + " akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                // Efek animasi tambahan agar lebih bagus
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika user klik 'Ya', arahkan ke file hapus.php
                    document.location.href = href;
                }
            })
        });
    </script>
</body>

</html>