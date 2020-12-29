<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard')?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cloud-meatball"></i>
        </div>
        <div class="sidebar-brand-text mx-3">RAMEN AA </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dashboard')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Master Data
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Data:</h6>
                <a class="collapse-item" href="<?= base_url('admin/supplier')?>">Supplier</a>
                <a class="collapse-item" href="<?= base_url('admin/pelanggan')?>">Pelanggan</a>
                <a class="collapse-item" href="<?= base_url('admin/tables')?>">Meja</a>
                <a class="collapse-item" href="<?= base_url('admin/menu')?>">Menu</a>
                <a class="collapse-item" href="<?= base_url('admin/level/pedas')?>">Level Pedas</a>
                <a class="collapse-item" href="<?= base_url('admin/gudang')?>">Gudang</a>
                <a class="collapse-item" href="<?= base_url('admin/kuah')?>">Kuah</a>
                <?php if($this->session->userdata('role') == 'superadmin'){ ?>
                <a class="collapse-item" href="<?= base_url('admin/karyawan')?>">Karyawan</a>
                <?php } ?>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Transaksi:</h6>
                <a class="collapse-item" href="<?= base_url("transaksi/persediaan") ?>">Persediaan</a>
                <a class="collapse-item" href="<?= base_url("transaksi/penjualan") ?>">Penjualan</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <?php if($this->session->userdata('role') == 'superadmin'){ ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Jurnal</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Jurnal:</h6>
                <a class="collapse-item" href="login.html">Test</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <?php } ?>

</ul>