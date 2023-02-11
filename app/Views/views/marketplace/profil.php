<?= $this->extend('views/front-templates/index_market'); ?>
<?= $this->section('content'); ?>
<!-- Product section-->
<section class="py-5" style="margin-top: 100px;">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6 col-lg-auto">
                <img src="/img/user/<?= $user->user_image;  ?>" alt="" style="width: 300px;height: 300px;"
                    class="object-fit-cover">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <h2 class="display-7 fw-bolder"><?= $user->fullname; ?></h2>
                </div>

                <div class="row">
                    <div class="col col-sm-3">
                        <span style="font-size: 14px;"><i class="fa fa-map-marker"></i> <b>Alamat</b></span>
                    </div>
                    <div class="col">
                        <?= $user->alamat; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col col-sm-3">
                        <span style="font-size: 14px;"><i class="fa fa-phone"></i> <b>No. Telepon</b></span>
                    </div>
                    <div class="col">+
                        <?=$user->no_telepon; ?>
                    </div>
                    <div class="align-self-center col-auto">
                        <a href="https://wa.me/<?= $user->no_telepon;  ?>?text=Halo <?= $user->fullname;  ?>! Saya lihat produk Anda di website *Visitbaubau.id* dan saya tertarik dengan produk-produk Anda"
                            class="btn btn-accent py-2 px-4"><i class="fa fa-comment fa-fw"
                                style="vertical-align: middle;"></i>&nbsp; Chat Penjual
                            via
                            Whatsapp</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col col-sm-auto">
                        <span style="font-size: 14px;">
                            <?= $user->deskripsi;  ?></span>
                    </div>
                </div>
                <!-- <div class="d-flex">
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Kontak Penjual
                    </button>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<!-- <section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                <div class="card" style="height: 300px;">
                    <a href="" class="stretched-link"></a>
                    Product image
                    <img class="card-img-top" src="/img/produk/default.jpg" alt="..." />
                    Product details
                    <div class="card-body p-3">
                        <div class="text-left">
                            Product name
                            <div class="title-product">asdasd</div>
                            Product price
                            <div class="title-price">Rp. 123
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->




<?= $this->endSection(); ?>