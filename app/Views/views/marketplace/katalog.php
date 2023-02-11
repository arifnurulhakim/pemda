<?= $this->extend('views/front-templates/index_market'); ?>

<?= $this->section('content'); ?>
<!-- <nav class="hide-nav-item bg-primary py">
    <div class="container">
        Some top header info for demo
    </div>
</nav> -->

<div class="container" style="margin-top: 100px;">
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
                </div>
            </div>
            <hr>
            <!-- <div class="filter">
                <div class="filter-main">
                    <div class="top">
                        <p>Filter</p>
                    </div>
                    <div class="bodf">
                        <p class="title">
                            Urutkan
                        </p>
                        <a href="">Terbaru</a>
                        <a href="">A-Z</a>
                        <a href="">Z-A</a>
                        <a href="">Harga Terendah</a>
                        <a href="">Harga Tertinggi</a>
                        <hr>
                        <p class="title">
                            Harga
                        </p>
                        <small class="text-muted">Tulis tanpa tanda pemisah, cth: 34000</small>
                        <form action="" method="get">
                            <input type="number" placeholder="Harga Minimum" name="minprice" class="form-control">
                            <input type="number" placeholder="Harga Maksimum" name="maxprice" class="form-control mt-2">
                            <button type="submit"
                                class="btn rounded-pill btn-secondary btn-block btn-sm mt-2">Terapkan</button>
                        </form>
                        <hr>
                        <p class="title">
                            Penawaran
                        </p>
                        <a href="">Promo</a>
                        <hr>
                        <p class="title">
                            Kondisi
                        </p>
                        <a href="">Baru</a>
                        <a href="">Bekas</a>
                        <hr>
                        <a href="" class="btn rounded-pill btn-danger text-light btn-sm">Reset Filter</a>
                    </div>
                </div>
            </div> -->

            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-5 justify-content-center">
                <!-- <div class="col">
                    <div class="filter">
                        <div class="filter-main">
                            <div class="top">
                                <p>Filter</p>
                            </div>
                            <div class="bodf">
                                <p class="title">
                                    Urutkan
                                </p>
                                <a href="">Terbaru</a>
                                <a href="">A-Z</a>
                                <a href="">Z-A</a>
                                <a href="">Harga Terendah</a>
                                <a href="">Harga Tertinggi</a>
                                <hr>
                                <p class="title">
                                    Harga
                                </p>
                                <small class="text-muted">Tulis tanpa tanda pemisah, cth: 34000</small>
                                <form action="" method="get">
                                    <input type="number" placeholder="Harga Minimum" name="minprice"
                                        class="form-control">
                                    <input type="number" placeholder="Harga Maksimum" name="maxprice"
                                        class="form-control mt-2">
                                    <button type="submit"
                                        class="btn rounded-pill btn-secondary btn-block btn-sm mt-2">Terapkan</button>
                                </form>
                                <hr>
                                <p class="title">
                                    Penawaran
                                </p>
                                <a href="">Promo</a>
                                <hr>
                                <p class="title">
                                    Kondisi
                                </p>
                                <a href="">Baru</a>
                                <a href="">Bekas</a>
                                <hr>
                                <a href="" class="btn rounded-pill btn-danger text-light btn-sm">Reset Filter</a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <?php $i = 1 + (20 * $currentPage - 1)  ?>
                <?php foreach ($produk as $p) : ?>

                <div class="col mb-5">
                    <div class="card" style="height: 300px;">
                        <a href="<?= base_url('view/detailproduk/'.$p['slug']); ?>" class="stretched-link"></a>
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
            <?= $pager-> links('produk','custom_pagination'); ?>
        </div>
    </section>

</div>


<?= $this->endSection(); ?>