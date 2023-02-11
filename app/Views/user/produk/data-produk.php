<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Produk</h1>

    <!-- Alert -->
    <?php if(session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('success'); ?>
    </div>
    <?php endif; ?>
    <!-- /Alert -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="<?= base_url('user/produk/create'); ?>"><i class="fas fa-plus-circle"></i>
                Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($produk as $p) : ?>
                        <tr>
                            <td> <?= $p['nama_produk']?></td>
                            <td>Rp. <?= str_replace(",",".",number_format($p['harga']));?></td>
                            <td> <?= $p['nama_kategori_produk']?></td>
                            <td>
                                <a type="button" class="btn btn-info"
                                    href="<?= base_url('user/produk/detail-produk/'.$p['slug']); ?>">
                                    <i class="fas fa-info-circle"></i> Detail
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>