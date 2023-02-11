<?= $this->extend('views/front-templates/index'); ?>

<?= $this->section('content'); ?>
<div class="overlay">
    <div id="breadcrumb" class="hoc clear">
        <!-- ################################################################################################ -->
        <h6 class="heading heading-top">Event</h6>
        <br>
        <ul>
            <li class="heading-top">Event seputar Kota Baubau dan sekitarnya</li>
        </ul>
        <!-- ################################################################################################ -->
    </div>
</div>


<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="content">
            <!-- Alert -->
            <?php if(session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <!-- /Alert -->
            <!-- ################################################################################################ -->
            <?php foreach ($event as $e) : ?>
            <?php if($e['status_event'] == 1){  ?>
            <section class="group">
                <div class="one_half first"><img class="inspace-15 borderedbox"
                        src="/img/event/<?= $e['gambar_event']; ?>" alt=""></div>
                <div class="one_half">
                    <ul class="nospace group inspace-15">
                        <li>
                            <article>
                                <h6 class="heading"><a href="#"><?= $e['nama_event']; ?></a></h6>
                                <p><?= $e['deskripsi_event']; ?> &hellip;</p>
                                <footer><a class="btn" href="/view/detailevent/<?= $e['slug']; ?>">Read
                                        More</a></footer>
                            </article>
                        </li>
                    </ul>
                </div>
            </section> <br> <br>
            <?php } ?>
            <?php endforeach; ?>
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <hr class="btmspace-80">
        </div>
        <!-- ################################################################################################ -->
        <div class="sectiontitle">
            <p class="nospace font-xs">Ingin mengajukan event?</p>
            <p class="heading underline font-x2">Klik di bawah ini</p>
        </div>
        <center>
            <footer><a class="btn" href="/view/pengajuanevent">Ajukan Event</a></footer>
        </center>
        <!-- / main body -->
        <div class="clear"></div>
    </main>
</div>


<?= $this->endSection(); ?>