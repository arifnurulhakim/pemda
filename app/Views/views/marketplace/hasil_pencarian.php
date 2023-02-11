<?= $this->extend('views/front-templates/index_market'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <form action="/view/marketplace/cari" method="post">
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
                        <h2 class="title bold">Hasil Pencarian</h2>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-6 justify-content-center">
                <?php if(count($produk) == 0){?>
                <p align='center'>Produk yang Anda cari tidak ditemukan</p>
                <?php } else { ?>
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
                <?php } ?>


            </div>
        </div>
    </section>

</div>


<?= $this->endSection(); ?>