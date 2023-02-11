<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Data RPJMD 2022 - 2026</b></h1>

    <!-- Alert -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    <!-- /Alert -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="<?= base_url('admin/rpjmd2126/create'); ?>"><i class="fas fa-plus-circle"></i>
                Tambah Data RPJMD</a>
            <a class="btn btn-success" href="<?= base_url('admin/rpjmd2126/exportExcel'); ?>"><i class="fas fa-info-circle"></i>
                Export Excel</a>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableRpjmd2126" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="4">Misi</th>
                                <th rowspan="4">Nama Indikator</th>
                                <th rowspan="4">jenis Indikator</th>
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
                            <?php foreach ($rpjmd2126 as $rpjmd2126_1) : ?>
                                <tr>

                                    <td><?= $rpjmd2126_1['nama_misi2126'] ?></td>
                                    <td> <?= $rpjmd2126_1['nama_indikator'] ?></td>
                                    <td> <?= $rpjmd2126_1['jenis_indikator'] ?></td>
                                    <td> <?= $rpjmd2126_1['nama_satuan'] ?></td>


                                    <td> <?= $rpjmd2126_1['t22'] ?></td>
                                    <td <?php

                                        $realisasi =  $rpjmd2126_1['r22'];
                                        $target = $rpjmd2126_1['t22'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $rpjmd2126_1['r22'] ?></td>

                                    <td> <?= $rpjmd2126_1['t23'] ?></td>
                                    <td <?php

                                        $realisasi =  $rpjmd2126_1['r23'];
                                        $target = $rpjmd2126_1['t23'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $rpjmd2126_1['r23'] ?></td>

                                    <td> <?= $rpjmd2126_1['t24'] ?></td>
                                    <td <?php

                                        $realisasi =  $rpjmd2126_1['r24'];
                                        $target = $rpjmd2126_1['t24'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $rpjmd2126_1['r24'] ?></td>

                                    <td> <?= $rpjmd2126_1['t25'] ?></td>
                                    <td <?php

                                        $realisasi =  $rpjmd2126_1['r25'];
                                        $target = $rpjmd2126_1['t25'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $rpjmd2126_1['r25'] ?></td>

                                    <td> <?= $rpjmd2126_1['t26'] ?></td>
                                    <td <?php

                                        $realisasi =  $rpjmd2126_1['r26'];
                                        $target = $rpjmd2126_1['t26'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $rpjmd2126_1['r26'] ?></td>
                                    <td>
                                        <?php if (in_groups('admin')) : ?>
                                            <a href=""><i class="fas fa-edit"></i></a>
                                            <!-- <a href="/rpjmd2126/delete/<?= $rpjmd2126_1['id_rpjmd2126']; ?>">Hapus</a> -->
                                            <a type='button' class="btn btn-danger" href="#" data-toggle="modal" data-target="#hapusModal">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            <a type='button' class="btn btn-info" href="#" data-toggle="modal" data-target="#grafikModal">
                                                <i class="fas fa-chart-bar"></i>
                                            </a>
                                        <?php else : ?>
                                            <a type='button' class="btn btn-info" href="#" data-toggle="modal" data-target="#grafikModal">
                                                <i class="fas fa-chart-bar"></i>
                                            </a>
                                        <?php endif; ?>
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