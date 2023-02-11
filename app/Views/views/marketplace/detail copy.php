<?= $this->extend('views/front-templates/index_market'); ?>
<?= $this->section('content'); ?>
<!-- Product section-->
<section class="py-5" style="margin-top: 100px;">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6 col-lg-auto"><img class="mb-2" src="/img/produk/<?= $produk['gambar_produk']?>" alt=""
                    style="width: 400px; height: 400px;object-fit: cover;" />
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <h1 class="display-6 fw-bolder"><?= $produk['nama_produk']?></h1>
                    </div>
                    <div class="col">

                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col col-sm-3">
                        <span style="font-size: 14px;">Harga</span>
                    </div>
                    <div class="col">
                        <span style="font-size: 16px; font-weight: bold; color: #1CCAA1 ;">Rp.
                            <?= str_replace(",",".",number_format($produk['harga']));?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col col-sm-3">
                        <span style="font-size: 14px;">Berat</span>
                    </div>
                    <div class="col">
                        <span style="font-size: 16px; font-weight: bold;">
                            <?= $produk['berat'];?>&nbsp; g</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col col-sm-3">
                        <span style="font-size: 14px;">Stok</span>
                    </div>
                    <div class="col col-sm-3">
                        <?php if ($produk['stok'] === 'Ada') { ?>
                        <span style="font-size: 16px; font-weight: bold;"><?= $produk['stok'];?></span>
                        <?php }else { ?>
                        <span style="font-size: 16px;color: red; font-weight: bold;"><?= $produk['stok'];?></span>
                        <?php } ?>
                    </div>
                    <div class="col col-sm p-3" style="background-color: rgba(255, 177, 40, 0.3); border-radius: 10px;">
                        <span style="color: #ffb128"><i class="fas fa-info-circle"></i> <b>Perhatian</b></span><br>
                        <span style="color: #333333; font-size: 12px;">Barang yang tersedia dapat berubah sewaktu-waktu
                            tergantung stok
                            yang ada dari
                            penjual</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <span style="font-size: 14px;"><?= $produk['deskripsi_produk'];?></span>
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
        <div class="border d-flex align-items-center mt-4 p-3">
            <div class="flex-shrink-0">

            </div>
            <div class="flex-grow-1 ms-3 justify-content-between py-4">
                <div class="row ">
                    <div class="col text-uppercase">
                        <img src="/img/produk/default.jpg" alt="" style="width: auto;height: 60px;"
                            class="rounded-circle object-fit-cover">
                        <span class="px-3" style="font-size: 16px;"><?= $produk['fullname'];?></span>
                    </div>
                    <div class="align-self-center col-auto">
                        <a href="https://wa.me/<?= $produk['no_telepon'];  ?>?text=Halo <?= $produk['fullname'];  ?>! Saya lihat produk Anda di website *Visitbaubau.id* dan saya tertarik dengan *<?= $produk['nama_produk'];  ?>*"
                            class="btn btn-accent py-2 px-4"><i class="fa fa-comment fa-fw"
                                style="vertical-align: middle;"></i>&nbsp; Chat Penjual
                            via
                            Whatsapp</a>
                        <a href="<?= base_url('view/marketplace/profil/'.$produk['fullname']); ?>"
                            class="btn btn-accent py-2 px-4"><i class="fa fa-building fa-fw"></i>&nbsp; KUNJUNGI
                            TOKO</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Related items section-->


<?= $this->endSection(); ?>