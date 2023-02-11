<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Data RPJMD 2016 & 2021</b></h1>

    <!-- Alert -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    <!-- /Alert -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="<?= base_url('admin/wisata/create'); ?>"><i class="fas fa-plus-circle"></i>
                Tambah Data RPJMD</a>
            <a class="btn btn-primary" href="<?= base_url('admin/kategoriwisata'); ?>"><i class="fas fa-list"></i>
                Kelola Satuan</a>







            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableWisata" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="3">Misi</th>
                                <th rowspan="3">IKD</th>
                                <th rowspan="3">Satuan</th>
                            <tr>
                                <th colspan="4" style="text-align: center;">Target</th>
                                <th colspan="5" style="text-align: center;">Realisasi</th>
                            </tr>
                            <th>2017</th>
                            <th>2018</th>
                            <th>2019</th>
                            <th>2020</th>
                            <th>2017</th>
                            <th>2018</th>
                            <th>2019</th>
                            <th>2020</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($wisata as $w) : ?>
                                <tr>
                                    <td>Misi ke-1</td>
                                    <td>Indeks Pendidikan</td>
                                    <td>Satuan</td>
                                    <td>9.9</td>
                                    <td>9.9</td>
                                    <td>9.9</td>
                                    <td>9.9</td>
                                    <td>9.9</td>
                                    <td>9.9</td>
                                    <td>9.9</td>
                                    <td>9.9</td>

                                    <td>
                                        <a type="button" class="btn btn-info" href="<?= base_url('admin/wisata/detail-wisata/' . $w['slug']); ?>">
                                            <i class="fas fa-info-circle"></i> Grafik</a>
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