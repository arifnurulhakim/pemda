<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-pemda sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url('/img/front/logopemda.png'); ?>" alt="" width="50px">
    </div>
    <div class="sidebar-brand-text mx-3">SI-PORATIF</div>
  </a>
  <!-- SECTION ADMIN -->
  <?php if (in_groups('admin')) : ?>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <!-- SECTION USER -->
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
  <!-- SECTION ADMIN -->
  <?php if (in_groups('admin')) : ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Content Management
    </div>

    <!-- Nav item - dropdown RPMJ -->

    <li class="nav-item
      <?php
      if (!isset($subMenu)) {
        $subMenu = '';
      } //mengatasi masalah sub menu yang undefined
      echo (($menu == 'RPJMD') ? 'active' : '') ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>RPJMD</span>
      </a>
      <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionSidebar" class="collapse 
            <?php
            if (($subMenu === "RPJMD1621") or ($subMenu === "RPJMD2126")) {
              echo "show";
            } ?>">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Pilih Tahun :</h6>
          <a class="collapse-item
            <?php //menu active RPJMD1621
            if ($subMenu === "RPJMD1621") {
              echo "bg-gradient-pemda text-light";
            } ?>" href="<?= base_url('admin/rpjmd1621'); ?>">2016-2021</a>
          <a class="collapse-item
            <?php //menu active RPJMD2126
            if ($subMenu === "RPJMD2126") {
              echo "bg-gradient-pemda text-light";
            } ?>" href="<?= base_url('admin/rpjmd2126'); ?>">2021-2026</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Rencana Strategis Perangkat Daerah -->
    <li class="nav-item
    <?php
    if (!isset($subMenu)) {
      $subMenu = '';
    } //mengatasi masalah sub menu yang undefined
    echo (($menu == 'RENSTRA') ? 'active' : '') ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRenstra" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-map"></i>
        <span>RENSTRA-PD</span>
      </a>
      <div id="collapseRenstra" class="collapse
      <?php
      if (($subMenu === "RENSTRA1621") or ($subMenu === "RENSTRA2126")) {
        echo "show";
      } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Pilih Tahun :</h6>
          <a class="collapse-item
          <?php //menu active RENSTRA1621
          if ($subMenu === "RENSTRA1621") {
            echo "bg-gradient-pemda text-light";
          } ?>" href="<?= base_url('admin/renstra1621'); ?>">2016-2021</a>
          <a class="collapse-item
          <?php //menu active RENSTRA2126
          if ($subMenu === "RENSTRA2126") {
            echo "bg-gradient-pemda text-light";
          } ?>" href="<?= base_url('admin/renstra2126'); ?>">2021-2026</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Data RKPD -->

    <li class="nav-item
    <?php
    if (!isset($subMenu)) {
      $subMenu = '';
    } //mengatasi masalah sub menu yang undefined
    echo (($menu == 'RKPD') ? 'active' : '') ?>">
      <a class="nav-link" href="<?= base_url('admin/rkpd'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>RKPD</span></a>
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
        <i class="fas fa-users"></i>
        <span>User List</span></a>
    </li>
    <!-- SECTION USER -->
  <?php else : ?>
    <!-- USER MENU -->
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Content Management
    </div>

    <!-- Nav item - dropdown RPMJ -->

    <li class="nav-item
      <?php
      if (!isset($subMenu)) {
        $subMenu = '';
      } //mengatasi masalah sub menu yang undefined
      echo (($menu == 'RPJMD') ? 'active' : '') ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>RPJMD</span>
      </a>
      <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionSidebar" class="collapse 
            <?php
            if (($subMenu === "RPJMD1621") or ($subMenu === "RPJMD2126")) {
              echo "show";
            } ?>">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Pilih Tahun :</h6>
          <a class="collapse-item
            <?php //menu active RPJMD1621
            if ($subMenu === "RPJMD1621") {
              echo "bg-gradient-pemda text-light";
            } ?>" href="<?= base_url('pemda/rpjmd1621'); ?>">2016-2021</a>
          <a class="collapse-item
            <?php //menu active RPJMD2126
            if ($subMenu === "RPJMD2126") {
              echo "bg-gradient-pemda text-light";
            } ?>" href="<?= base_url('pemda/rpjmd2126'); ?>">2021-2026</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Rencana Strategis Perangkat Daerah -->
    <li class="nav-item
    <?php
    if (!isset($subMenu)) {
      $subMenu = '';
    } //mengatasi masalah sub menu yang undefined
    echo (($menu == 'RENSTRA') ? 'active' : '') ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRenstra" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-map"></i>
        <span>RENSTRA-PD</span>
      </a>
      <div id="collapseRenstra" class="collapse
      <?php
      if (($subMenu === "RENSTRA1621") or ($subMenu === "RENSTRA2126")) {
        echo "show";
      } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Pilih Tahun :</h6>
          <a class="collapse-item
          <?php //menu active RENSTRA1621
          if ($subMenu === "RENSTRA1621") {
            echo "bg-gradient-pemda text-light";
          } ?>" href="<?= base_url('pemda/renstra1621'); ?>">2016-2021</a>
          <a class="collapse-item
          <?php //menu active RENSTRA2126
          if ($subMenu === "RENSTRA2126") {
            echo "bg-gradient-pemda text-light";
          } ?>" href="<?= base_url('pemda/renstra2126'); ?>">2021-2026</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Data RKPD -->

    <li class="nav-item
    <?php
    if (!isset($subMenu)) {
      $subMenu = '';
    } //mengatasi masalah sub menu yang undefined
    echo (($menu == 'RKPD') ? 'active' : '') ?>">
      <a class="nav-link" href="<?= base_url('pemda/rkpd'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>RKPD</span></a>
    </li>
  <?php endif; ?>

  <?php if (in_groups('admin')) : ?>
    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <div class="sidebar-heading">
      User Profile
    </div>
    <!-- Nav Item - My Profile -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/profil'); ?>">
        <i class="fas fa-user"></i>
        <span>My Profile</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('logout'); ?>">
        <i class="fas fa-sign-out-alt"></i>
        <span>Log Out</span></a>
    </li>
  <?php else : ?>

  <?php endif; ?>

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