<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav mt-3">
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'home') ? 'text-primary' : ''; ?>"><i class="fa-solid fa-layer-group"></i></div>
                    Stok Barang
                </a>
                <a class="nav-link" href="barang_masuk.php">
                    <div class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'barang_masuk') ? 'text-primary' : ''; ?>"><i class="fa-solid fa-circle-plus"></i></div>
                    Barang Masuk
                </a>
                <a class="nav-link" href="barang_keluar.php">
                    <div class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'barang_keluar') ? 'text-primary' : ''; ?>"><i class="fa-solid fa-circle-minus"></i></div>
                    Barang Keluar
                </a>
                <a class="nav-link mt-4" href="logout.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
                    Log Out
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php echo $_SESSION['email']; ?>
        </div>
    </nav>
</div>