<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-pemda sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url('/img/front/logopemda.png'); ?>" alt="" width="50px">
    </div>
    <div class="sidebar-brand-text mx-auto">SI-PORATIF</div>
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

    <!-- Nav item - dropdown RPMJ -->

    <!-- Nav Item - Rencana Strategis Perangkat Daerah -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/satuan'); ?>">
        <i class="fas fa-fw fa-percent fa-sm"></i>
        <span> Satuan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/perangkatdaerah'); ?>">
        <i class="fas fa-fw fa-home"></i>
        <span> Perangkat Daerah</span></a>
    </li>

    <!-- Nav Item - Data Misi -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMisi" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-list"></i>
        <span>Misi </span>
      </a>
      <div id="collapseMisi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Pilih Tahun :</h6>
          <a class="collapse-item" href="<?= base_url('admin/misi'); ?>">2016-2021</a>
          <a class="collapse-item" href="<?= base_url('admin/misi2126'); ?>">2022-2026</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Data IKUdanIKD -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIkudanikd" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>IKU / IKD</span>
      </a>
      <div id="collapseIkudanikd" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Pilih Tahun :</h6>
          <a class="collapse-item" href="<?= base_url('admin/ikudanikd1621'); ?>">2016-2021</a>
          <a class="collapse-item" href="<?= base_url('admin/ikudanikd2126'); ?>">2021-2026</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/kodeRekening'); ?>">
        <i class="fas fa-fw fa-exchange-alt"></i>
        <span>Kode Rekening</span></a>
    </li>

    <!-- Nav Item - Galeri -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/galeri'); ?>">
        <i class="fas fa-fw fa-image"></i>
        <span>Galeri</span></a>
    </li>
    <!-- Nav Item - Publikasi -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/publikasi'); ?>">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Publikasi</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      User Management
    </div>

    <!-- Nav Item - User List -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/user_list'); ?>">
        <i class="fas fa-fw fa-users"></i>
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
        <i class="fas fa-fw fa-database"></i>
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
        <i class="fas fa-fw fa-user"></i>
        <span>My Profile</span></a>
    </li>
  <?php else : ?>
    <!-- Nav Item - My Profile -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('user/profil'); ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>My Profile</span></a>
    </li>
  <?php endif; ?>


  <!-- Divider -->
  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('logout'); ?>">
      <i class="fas fa-fw fa-sign-out-alt"></i>
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