<?= $this->extend('views/front-templates/index'); ?>

<?= $this->section('content'); ?>
<div class="overlay">
    <div id="breadcrumb" class="hoc clear">
        <!-- ################################################################################################ -->
        <h6 class="heading heading-top">ARTIKEL</h6>
        <br>
        <ul>
            <li class="heading-top">Artikel seputar Kota Baubau dan sekitarnya</li>
        </ul>
        <!-- ################################################################################################ -->
    </div>
</div>


<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="content">

            <section class="blog-posts">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="all-blog-posts">
                                <div class="row">
                                    <?php foreach ($artikel as $a) : ?>
                                    <div class="col-lg-12">
                                        <div class="blog-post">
                                            <div class="blog-thumb">
                                                <img src="/img/artikel/<?= $a['gambar_artikel']; ?>" alt="">
                                            </div>
                                            <div class="down-content">
                                                <a href="/view/detailartikel/<?= $a['slug']; ?>">
                                                    <h4><?= $a['judul_artikel']; ?></h4>
                                                </a>
                                                <ul class="post-info">
                                                    <li><a href="#">Admin</a></li>
                                                    <li><a href="#"><?= $a['tgl_artikel']; ?></a></li>
                                                    <li><a href="#">Komentar</a></li>
                                                </ul>
                                                <p class="paragraph"> <?= word_limiter($a['isi_artikel'], 60); ?> <a
                                                        rel="nofollow" href="/view/detailartikel/<?= $a['slug']; ?>"
                                                        target="_parent">Selengkapnya</p>
                                                <div class="post-options">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-tags"></i></li>
                                                                <li><a href="#">Artikel</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-6">
                                                            <ul class="post-share">
                                                                <li><i class="fa fa-share-alt"></i></li>
                                                                <li><a href="#">Facebook</a>,</li>
                                                                <li><a href="#"> Twitter</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="col-lg-12">
                                        <!-- <div class="main-button">
                                            <a href="blog.html">View All Posts</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sidebar">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="sidebar-item recent-posts">
                                            <div class="sidebar-heading">
                                                <h2>Artikel Terkini</h2>
                                            </div>
                                            <div class="content">
                                                <?php foreach (array_slice($artikelterkini, 0, 6) as $a) : ?>
                                                <ul>
                                                    <li><a href="/view/detailartikel/<?= $a['slug']; ?>">
                                                            <h5><?= $a['judul_artikel']; ?></h5>
                                                            <span><?= $a['tgl_artikel']; ?></span>
                                                        </a></li>
                                                </ul>
                                                <?php endforeach; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <hr class="btmspace-80">
        </div>
        <!-- / main body -->
    </main>
</div>


<?= $this->endSection(); ?>