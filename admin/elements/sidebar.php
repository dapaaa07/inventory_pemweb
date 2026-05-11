<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item sidebar-category">
            <p>Navigation</p>
            <span></span>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item sidebar-category">
            <p>Components</p>
            <span></span>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#kelola-data" aria-expanded="false" aria-controls="kelola-data">
                <i class="mdi mdi-database menu-icon"></i>
                <span class="menu-title">Kelola Data</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="kelola-data">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="data_barang.php">Data Barang</a></li>
                    <li class="nav-item"> <a class="nav-link" href="data_jenis.php">Data Jenis</a></li>
                    <li class="nav-item"> <a class="nav-link" href="data_customer.php">Data Customer</a></li>
                    <li class="nav-item"> <a class="nav-link" href="data_supplier.php">Data Supplier</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#kelola-transaksi" aria-expanded="false" aria-controls="kelola-transaksi">
                <i class="mdi mdi-cart-outline menu-icon"></i>
                <span class="menu-title">Kelola Transaksi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="kelola-transaksi">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="transaksi_pembelian.php">Transaksi Pembelian</a></li>
                    <li class="nav-item"> <a class="nav-link" href="data_penjualan.php">Data Penjualan</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#kelola-laporan" aria-expanded="false" aria-controls="kelola-laporan">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Kelola Laporan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="kelola-laporan">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Laporan Transaksi</a></li>
                </ul>
            </div>
        </li>

    </ul>
</nav>