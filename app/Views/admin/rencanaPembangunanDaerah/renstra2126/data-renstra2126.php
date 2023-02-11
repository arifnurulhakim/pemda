<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Data Rencana Strategi Pembangunan Daerah 2021 - 2026</b></h1>

    <!-- Alert -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    <!-- /Alert -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="<?= base_url('admin/renstra2126/create'); ?>"><i class="fas fa-plus-circle"></i>
                Tambah Data Renstra-PD</a>
            <a class="btn btn-success" href=""><i class="fas fa-info-circle"></i>
                Export Excel</a>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableRenstra2126" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="4">Perangkat Daerah</th>
                                <th rowspan="4">Indikator Renstra</th>
                                <th rowspan="4">Satuan</th>
                            <tr>
                                <th colspan="10" style="text-align: center;">Tahun</th>
                                <th style="text-align: center;" rowspan="3">Aksi</th>
                            <tr>

                                <th colspan="2" style="text-align: center;">2022</th>
                                <th colspan="2" style="text-align: center;">2023</th>
                                <th colspan="2" style="text-align: center;">2024</th>
                                <th colspan="2" style="text-align: center;">2025</th>
                                <th colspan="2" style="text-align: center;">2026</th>
                            </tr>
                            </tr>
                            <th>Target</th>
                            <th>Realisasi</th>
                            <th>Target</th>
                            <th>Realisasi</th>
                            <th>Target</th>
                            <th>Realisasi</th>
                            <th>Target</th>
                            <th>Realisasi</th>
                            <th>Target</th>
                            <th>Realisasi</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($renstra2126 as $renstra2126_1) : ?>
                                <tr>


                                    <td> <?= $renstra2126_1['nama_pd'] ?></td>
                                    <td><?= $renstra2126_1['nama_indikator'] ?></td>
                                    <td> <?= $renstra2126_1['nama_satuan'] ?></td>

                                    <td> <?= $renstra2126_1['t22'] ?></td>
                                    <td <?php

                                        $realisasi =  $renstra2126_1['r22'];
                                        $target = $renstra2126_1['t22'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $renstra2126_1['r22'] ?></td>

                                    <td> <?= $renstra2126_1['t23'] ?></td>
                                    <td <?php

                                        $realisasi =  $renstra2126_1['r23'];
                                        $target = $renstra2126_1['t23'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $renstra2126_1['r23'] ?></td>

                                    <td> <?= $renstra2126_1['t24'] ?></td>
                                    <td <?php

                                        $realisasi =  $renstra2126_1['r24'];
                                        $target = $renstra2126_1['t24'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $renstra2126_1['r24'] ?></td>

                                    <td> <?= $renstra2126_1['t25'] ?></td>
                                    <td <?php

                                        $realisasi =  $renstra2126_1['r25'];
                                        $target = $renstra2126_1['t25'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $renstra2126_1['r25'] ?></td>

                                    <td> <?= $renstra2126_1['t26'] ?></td>
                                    <td <?php

                                        $realisasi =  $renstra2126_1['r26'];
                                        $target = $renstra2126_1['t26'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $renstra2126_1['r26'] ?></td>
                                    <td>

                                        <a href="">Edit</a> |
                                        <a href="/renstra2126/delete/<?= $renstra2126_1['id_renstra2126']; ?>">Hapus</a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>

</div>
<?= $this->endSection(); ?>