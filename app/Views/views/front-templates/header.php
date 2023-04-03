    <!-- <div class="bgded" style="background-image:url('/img/bg.jpg'); background-size: cover;"> -->
    <!-- ################################################################################################ -->
    <div id="header">
        <div class="wrapper row1">
            <header id="header" class="hoc clear">
                <div id="logo" class="fl_left">
                    <!-- ################################################################################################ -->
                    <h1><a href="/"> <img style="width: 30%;" src="/img/front/logopemda.png" alt=""></a></h1>
                    <!-- <H1 style="margin-top: 20px;">LOGO PEMDA</H1> -->
                    <!-- ################################################################################################ -->
                </div>
                <nav id="mainav" class="fl_right">
                    <!-- ################################################################################################ -->
                    <ul class="clear">
                        <?php if (logged_in() === true) { ?>
                            <li class="active"><a href="<?= base_url(); ?>">HOME</a></li>
                            <li><a class="" href="<?= base_url('admin/rpjmd1621') ?>">RENCANA PEMBANGUNAN</a></li>
                            <li><a class="" href="<?= base_url('admin/publikasi'); ?>">PUBLIKASI</a></li>
                            <li><a class="" href="<?= base_url('admin/galeri'); ?>">GALLERY</a></li>
                            <li><a class="bg-danger text-white" href="<?= base_url('logout'); ?>">LOGOUT</a></li>
                        <?php } else { ?>
                            <li class="active"><a href="<?= base_url(); ?>">HOME</a></li>
                            <li><a class="" href="<?= base_url('pemda/rpjmd1621') ?>">RENCANA PEMBANGUNAN</a></li>
                            <li><a class="" href="<?= base_url('admin/publikasi'); ?>">PUBLIKASI</a></li>
                            <li><a class="" href="<?= base_url('admin/galeri'); ?>">GALLERY</a></li>
                            <li><a class="bg-success text-white" href="<?= base_url('login'); ?>">LOGIN</a></li>
                        <?php } ?>
                    </ul>

                    <!-- ################################################################################################ -->
                </nav>

            </header>
        </div>
    </div>
    <!-- </div> -->