<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow pt-5 pb-5">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav mr-auto">

        <!-- top navbar semua menu pemda -->


        <li class="nav-item 
        <?php if(isset($menu)) {
                if ($menu == 'RPJMD') { echo 'border-bottom rounded-top bg-secondary bg-light' ;}
            }?> ">
            <a class="nav-link active" href="<?= base_url('admin/rpjmd1621'); ?>">Rencana Pembangunan Daerah</a>
        </li>



        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item 
        <?php if(isset($menu)) {
                if ($menu == 'Kolaboratif') { echo 'border-bottom rounded-top bg-secondary bg-light' ;}
            }?>">
            <!-- <a class="nav-link" href="<?= base_url('admin/sanitasi21'); ?>">Kolaboratif</a> -->
            <a class="nav-link" href="<?= base_url('admin/kolaboratif'); ?>">Kolaboratif</a>
        </li>

        <!-- <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item">
            <a class="nav-link" href="#">SPM</a>
        </li> -->
        <?php if (in_groups('admin')) : ?>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item
            <?php if(isset($menu)) {
                if ($menu == 'Master Data') { echo 'border-bottom rounded-top bg-secondary bg-light' ;}
            }?>">
                <a class="nav-link" href="<?= base_url('admin/satuan/'); ?>">Master Data</a>
            </li>
        <?php endif; ?>
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- logout user  -->
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= user()->username; ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url(); ?>/img/user/<?= user()->user_image; ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if (in_groups('admin')) : ?>
                    <a class="dropdown-item" href="<?= base_url('admin/profil'); ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                <?php else : ?>
                    <a class="dropdown-item" href="<?= base_url('user/profil'); ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
        <!-- end logout user -->

    </ul>



</nav>