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
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <section class="blog-posts">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="all-blog-posts">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="blog-post">
                                            <div class="blog-thumb">
                                                <img src="/img/artikel/<?= $artikel['gambar_artikel']; ?>" alt="">
                                            </div>
                                            <div class="down-content">
                                                <a href="/view/detailartikel/<?= $artikel['slug']; ?>">
                                                    <h4><?= $artikel['judul_artikel']; ?></h4>
                                                </a>
                                                <ul class="post-info">
                                                    <li><a href="#">Admin</a></li>
                                                    <li><a href="#"><?= $artikel['tgl_artikel']; ?></a></li>
                                                    <li><a href="#">Komentar</a></li>
                                                    <li><a href="#">

                                                        </a></li>
                                                </ul>
                                                <p class="paragraph"><?= $artikel['isi_artikel']; ?></p>
                                                <div class="post-options">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-tags"></i></li>
                                                                <li><a href="#">Beauty</a>,</li>
                                                                <li><a href="#">Nature</a></li>
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
                                                <?php foreach ($artikelterkini as $a) : ?>
                                                    <ul>
                                                        <li><a href="/view/detailartikel/<?= $a['slug']; ?>">
                                                                <h5><?= $a['judul_artikel']; ?></h5>
                                                                <span><?= $a['tgl_artikel']; ?></span>
                                                            </a></li>
                                                    </ul>

                                                <?php endforeach; ?>
                                            </div>
                                            <hr>
                                            <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                                            <div class="elfsight-app-b39a29ed-58b1-48cc-986c-9f8fbd024058"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item submit-comment">
                                <div class="sidebar-heading">
                                    <h2>Tulis Komentar</h2>
                                </div>
                                <div class="content">
                                    <form id="comment" action="#" method="post">
                                        <?php csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="name" type="text" id="name" placeholder="Nama" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="email" type="text" id="email" placeholder="Email" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <textarea name="message" rows="3" id="message" placeholder="Tulis Komentar" required=""></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <button type="submit" id="form-submit" class="main-button">Submit</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item comments">
                                <div class="sidebar-heading">
                                    <h2>1 komentar</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>
                                            <div class="right-content">
                                                <h4>Charles Kate<span>May 16, 2020</span></h4>
                                                <p>Fusce ornare mollis eros. Duis et diam vitae justo fringilla
                                                    condimentum eu quis leo.
                                                    Vestibulum id turpis porttitor sapien facilisis scelerisque.
                                                    Curabitur a nisl eu lacus
                                                    convallis eleifend posuere id tellus.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- / main body -->
    </main>
</div>


<?= $this->endSection(); ?>