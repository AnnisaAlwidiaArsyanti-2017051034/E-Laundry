<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="\assets\washing-machine.png" width="35px" alt="brand">
        </div>
        <div class="sidebar-brand-text mx-3">Laundry</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/transaksi">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Transaksi</span></a>
    </li>
    <!-- Divider -->
    <?php if (!in_groups('admin')) : ?>
        <hr class="sidebar-divider">
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="/layanan">
                <i class="fas fa-fw fa-table"></i>
                <span>Jenis Layanan</span></a>
        </li>
    <?php endif; ?>
    <!-- Divider -->
    <!-- Nav Item - Tables -->
    <?php if (in_groups('superadmin')) : ?>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="/user">
                <i class="fas fa-fw fa-user"></i>
                <span>Pengguna</span></a>
        </li>
    <?php endif; ?>
    <!-- Divider -->
    <?php if(!in_groups('admin')):?>
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-book"></i>
            <span>Laporan Pendapatan</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengaturan</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <?php endif; ?>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>