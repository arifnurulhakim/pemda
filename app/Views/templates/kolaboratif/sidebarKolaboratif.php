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
      <a class="nav-link" href="<?= base_url(); ?>">
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
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Tahun 2021</span>
      </a>
      <div id="collapse" class="collapse" aria-labelledby="heading" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Pilih Program :</h6>
          <a class="collapse-item" style="white-space: nowrap; 
overflow: hidden;
text-overflow: ellipsis;" href="<?= base_url('admin/sanitasi21'); ?>">Sanitasi dan Penyehatan Lingkungan</a>
          <a class="collapse-item" style="white-space: nowrap; 
overflow: hidden;
text-overflow: ellipsis;" href="<?= base_url('admin/sbs21'); ?>">Stop Buang Air Besar Sembarangan</a>
          <a class="collapse-item" style="white-space: nowrap; 
overflow: hidden;
text-overflow: ellipsis;" href="<?= base_url('admin/persampahan21'); ?>">Pengelolaan Persampahan Daerah</a>
          <a class="collapse-item" style="white-space: nowrap; 
overflow: hidden;
text-overflow: ellipsis;" href="<?= base_url('admin/kumuh21'); ?>">Pencegahan dan Peningkatan Kualitas Perumahan Kumuh dan Permukiman Kumuh</a>
          <a class="collapse-item" style="white-space: nowrap; 
overflow: hidden;
text-overflow: ellipsis;" href="<?= base_url('admin/tnimd21'); ?>">TNI Manunggal Masuk Desa</a>
          <a class="collapse-item" style="white-space: nowrap; 
overflow: hidden;
text-overflow: ellipsis;" href="<?= base_url('admin/rumah21'); ?>">Stimulan Rehabilitasi Rumah Tidak Layak Huni</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Tahun 2022</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Pilih Program :</h6>
          <a class="collapse-item" style="white-space: nowrap; 
overflow: hidden;
text-overflow: ellipsis;" href="<?= base_url('admin/sanitasi22'); ?>">Sanitasi dan Penyehatan Lingkungan</a>
          <a class="collapse-item" style="white-space: nowrap; 
overflow: hidden;
text-overflow: ellipsis;" href="<?= base_url('admin/sbs22'); ?>">Stop Buang Air Besar Sembarangan</a>
          <a class="collapse-item" style="white-space: nowrap; 
overflow: hidden;
text-overflow: ellipsis;" href="<?= base_url('admin/persampahan22'); ?>">Pengelolaan Persampahan Daerah</a>
          <a class="collapse-item" style="white-space: nowrap; 
overflow: hidden;
text-overflow: ellipsis;" href="<?= base_url('admin/kumuh22'); ?>">Pencegahan dan Peningkatan Kualitas Perumahan Kumuh dan Permukiman Kumuh</a>
          <a class="collapse-item" style="white-space: nowrap; 
overflow: hidden;
text-overflow: ellipsis;" href="<?= base_url('admin/tnimd22'); ?>">TNI Manunggal Masuk Desa</a>
          <a class="collapse-item" style="white-space: nowrap; 
overflow: hidden;
text-overflow: ellipsis;" href="<?= base_url('admin/rumah22'); ?>">Stimulan Rehabilitasi Rumah Tidak Layak Huni</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/sanitasi'); ?>">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Tahun 2023</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/sanitasi'); ?>">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Tahun 2024</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/sanitasi'); ?>">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Tahun 2025</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/sanitasi'); ?>">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Tahun 2026</span></a>
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