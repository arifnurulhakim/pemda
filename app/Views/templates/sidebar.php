<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('/img/front/logopemda.png'); ?>" alt="" width="50%">
        </div>
        <div class="sidebar-brand-text mx-3">SI-PORATIF</div>
    </a>

    <?php if (in_groups('admin')) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    <?php else : ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    <?php endif; ?>

    <?php if (in_groups('admin')) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Content Management
        </div>

        <!-- Nav Item - Data Pariwisata -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/wisata'); ?>">
                <i class="fas fa-newspaper"></i>
                <span>RPJMD 2016 - 2021</span></a>
        </li>


        <!-- Nav Item - Data Artikel -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/artikel'); ?>">
                <i class="fas fa-newspaper"></i>
                <span>RPJMD 2021 - 2026</span></a>
        </li>

        <!-- Nav Item - Data Event -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/event'); ?>">
                <i class="fas fa-calendar"></i>
                <span>RKPD</span></a>
        </li>



        <!-- Nav Item - Data Kategori Pariwisata -->


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            User Management
        </div>

        <!-- Nav Item - User List -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/user_list'); ?>">
                <i class="fas fa-users"></i>
                <span>User List</span></a>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if (in_groups('penjual')) : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Merchant Management
        </div>

        <!-- Nav Item - User List -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/produk'); ?>">
                <i class="fas fa-database"></i>
                <span>Data Produk</span></a>
        </li>
    <?php else : ?>
        <!-- Nav Item - User List -->
        <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/produk'); ?>">
            <i class="fas fa-database"></i>
            <span>Data Produk</span></a>
    </li> -->
    <?php endif; ?>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <div class="sidebar-heading">
        User Profile
    </div>

    <?php if (in_groups('admin')) : ?>
        <!-- Nav Item - My Profile -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/profil'); ?>">
                <i class="fas fa-user"></i>
                <span>My Profile</span></a>
        </li>
    <?php else : ?>
        <!-- Nav Item - My Profile -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/profil'); ?>">
                <i class="fas fa-user"></i>
                <span>My Profile</span></a>
        </li>
    <?php endif; ?>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Log Out</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- widget hitung jumlah pengunjung -->
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-187004cd-23d6-403a-a817-aec978b32bf0"></div>
</ul>
<!-- End of Sidebar -->