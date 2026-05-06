<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2026 Admin.</span>
            </div>
        </div>
    </div>
</footer>
<!-- partial -->

<!-- Script Utama Template Wajib Ada di Sini -->
<script src="../assets/backend/vendors/js/vendor.bundle.base.js"></script>
<script src="../assets/backend/js/off-canvas.js"></script>
<script src="../assets/backend/js/hoverable-collapse.js"></script>
<script src="../assets/backend/js/template.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.btn-hapus').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            const nama = $(this).attr('data-nama');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data '" + nama + "' akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            });
        });
    });
</script>

<?php if (isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
    <script>
        Swal.fire('Berhasil!', 'Proses berhasil dilakukan.', 'success');
    </script>
<?php endif; ?>