<?php
// Memanggil file koneksi database di paling atas
include '../koneksi.php';
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
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- ... -->
</body>

</html>