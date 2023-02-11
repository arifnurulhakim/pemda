<?= $this->extend('views/front-templates/index_market'); ?>

<?= $this->section('content'); ?>
<!-- <nav class="hide-nav-item bg-primary py">
    <div class="container">
        Some top header info for demo
    </div>
</nav> -->

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true" style="margin-top: 160px;">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/img/banner/banner.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="/img/banner/banner.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/banner/banner.png" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Header-->
<!-- <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">UMKM</h1>
                <p class="lead fw-normal text-white-50 mb-0">Lorem IPSUM lorem ipsum</p>
            </div>
        </div>
    </header> -->
<!-- Section-->

<div class="category-menu">
    <div class="main-category">
        <!-- <div class="item" data-toggle="modal" data-target="#modalMoreCategory">
            <img src="http://localhost/BlackexpoTokoKuviaWA/assets/images/icon/category-more.png">
            <p>Lainnya</p>
        </div>
        <a href="http://localhost/BlackexpoTokoKuviaWA/c/souvenir">
            <div class="item">
                <img src="http://localhost/BlackexpoTokoKuviaWA/assets/images/icon/1654518663718.png">
                <p>Souvenir</p>
            </div>
        </a>
        <a href="http://localhost/BlackexpoTokoKuviaWA/c/kuliner">
            <div class="item">
                <img src="http://localhost/BlackexpoTokoKuviaWA/assets/images/icon/1654518726825.png">
                <p>Kuliner</p>
            </div>
        </a>
        <a href="http://localhost/BlackexpoTokoKuviaWA/c/fashion">
            <div class="item">
                <img src="http://localhost/BlackexpoTokoKuviaWA/assets/images/icon/1654903001749.png">
                <p>Fashion</p>
            </div>
        </a> -->
        <?php foreach($kategori_produk as $kp) : ?>
        <a href="http://localhost/BlackexpoTokoKuviaWA/c/fashion">
            <div class="item">
                <?php if ($kp['gambar_kategori_produk'] = 'default.jpg') { ?>
                <img src="/img/kategoriproduk/default.jpg" class="rounded-circle" style="width:50px ; height: 50px;">
                <p><?= $kp['nama_kategori_produk']; ?></p>
                <?php } else { ?>
                <img src="/img/kategoriproduk/<?= $kategori_produk['gambar_kategori_produk']; ?>" class="rounded-circle"
                    style="width:50px ; height: 50px;">
                <p><?= $kp['nama_kategori_produk']; ?></p>
                <?php } ?>

            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<div class="container">
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <form action="/view/marketplace/cari" method="post" target="_blank">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Produk..." name="cari">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </div>
            </form>
            <div>
                <div class="row">
                    <div class="col col-lg-auto">
                        <h2 class="title bold">Katalog Produk</h2>
                    </div>
                    <div class="col">
                        <span><a href="<?= base_url('/view/marketplace/katalog/'); ?>" class="btn-see-more">Lihat
                                Semua</a></span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-6 justify-content-center">
                <?php foreach (array_slice($produk , 0, 12) as $p) : ?>

                <div class="col mb-5">
                    <div class="card" style="height: 300px;">
                        <a href="<?= base_url('view/marketplace/detailproduk/'.$p['slug']); ?>"
                            class="stretched-link"></a>
                        <!-- Product image-->
                        <img class="card-img-top" src="/img/produk/<?= $p['gambar_produk']?>" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-3">
                            <div class="text-left">
                                <!-- Product name-->
                                <div class="title-product"><?= $p['nama_produk']?></div>
                                <!-- Product price-->
                                <div class="title-price">Rp. <?= str_replace(",",".",number_format($p['harga']));?>
                                </div>
                                <!-- Product store-->
                                <div class="title-store mt-2"><i class="fas fa-circle-user"></i>
                                    <?php if ($p['fullname'] == null) { ?>
                                    Merchant
                                    <?php } else { ?>
                                    <?= $p['fullname']?>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>


            </div>
        </div>
    </section>

</div>


<?= $this->endSection(); ?>