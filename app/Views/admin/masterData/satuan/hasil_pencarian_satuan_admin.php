<?= $this->extend('views/front-templates/index'); ?>

<?= $this->section('content'); ?>
<div class="overlay">
  <div id="breadcrumb" class="hoc clear">
    <!-- ################################################################################################ -->
    <h6 class="heading heading-top">Wisata</h6>
    <br>
    <ul>
      <li class="heading-top">Destinasi wisata Kota Baubau</li>
    </ul>
    <!-- ################################################################################################ -->
  </div>
</div>


<div class="wrapper row3">
  <main class="hoc container clear">
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content">
      <div>
        <div class="row">
          <div class="col col-lg-auto">
            <h2 class="title bold">Hasil Pencarian</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="sidebar-sticky">
            <form action="/view/wisata/cari" method="post" target="_blank">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Wisata..." name="cari">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                </div>
              </div>
            </form>
            <!-- <br> -->
            <div class="category-sidebar border">
              <div class="top">
                <p>Filter</p>
              </div>
              <div class="body p-3">
                <?php if (count($kategori_wisata) == 0) { ?>
                  <p align='center'>Wisata yang Anda cari tidak ditemukan</p>
                <?php } else { ?>
                  <?php foreach ($kategori_wisata as $kw) : ?>
                    <a href="<?= base_url(); ?>/wisata/kategori/<?= $kw['slug_kategori_wisata']; ?>" name="cari"><?= $kw['nama_kategori_wisata']; ?></a><br>
                  <?php endforeach; ?>
                <?php } ?>
                <hr>
                <a href="<?= base_url('/view/wisata/index/'); ?>" class="btn-danger text-light btn-sm">Reset Filter</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <section class="tourism-posts">
            <div class="all-tourism-posts">
              <div class="row">
                <?php if (count($wisata) == 0) { ?>
                  <div class="alert alert-warning text-center" role="alert">
                    Wisata yang sedang anda cari tidak ada
                  </div>
                <?php } else { ?>
                  <?php foreach ($wisata as $w) : ?>
                    <div class="col-lg-12">
                      <div class="tourism-post" id="tourism-post">
                        <div class="tourism-thumb">
                          <img src="/img/wisata/<?= $w['gambar_wisata']; ?>" alt="">
                          <div class="tourism-title">
                            <h1 class="display-6"><?= $w['nama_wisata']; ?></h1>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php } ?>
                <div class="col-lg-12">
                  <!-- <div class="main-button">
                                            <a href="tourism.html">View All Posts</a>
                                        </div> -->
                </div>
              </div>
            </div>
            <!-- </div> -->
          </section>
        </div>
      </div>
    </div>
    <!-- / main body -->
  </main>
</div>


<?= $this->endSection(); ?>