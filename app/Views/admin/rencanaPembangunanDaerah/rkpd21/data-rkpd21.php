<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Data RKPD 2021</b></h1>

    <!-- Alert -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    <!-- /Alert -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="<?= base_url('admin/rkpd21/create'); ?>"><i class="fas fa-plus-circle"></i>
                Tambah Data RKPKD</a>
            <a class="btn btn-success" href="<?= base_url('admin/rkpd21/exportExcel'); ?>"><i class="fas fa-info-circle"></i>
                Export Excel</a>





            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableRkpd21" width="100%" cellspacing="0">
                        <thead>

                            <th>Program</th>
                            <th>Indikator Program</th>
                            <th>Target Akhir</th>
                            <th>Realisasi 2020</th>
                            <th>Target 2021</th>
                            <th>Target 2022</th>
                            <th>Pagu 2022</th>
                            <th>Lokasi</th>
                            <th>Sumber Pendanaan</th>
                            <th>Nasional</th>
                            <th>Daerah</th>
                            <th>Kelompok Sasaran</th>
                            <th>Target 2023</th>
                            <th>Pagu 2023</th>
                            <th>Perangkat Daerah</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($rkpd21 as $rkpd21_1) : ?>
                                <tr>

                                    <td><?= $rkpd21_1['program'] ?></td>
                                    <td> <?= $rkpd21_1['indikator_program'] ?></td>
                                    <td> <?= $rkpd21_1['target_akhir'] ?></td>
                                    <td> <?= $rkpd21_1['r20'] ?></td>
                                    <td> <?= $rkpd21_1['t21'] ?></td>
                                    <td> <?= $rkpd21_1['t22'] ?></td>
                                    <td> <?= $rkpd21_1['pagu22'] ?></td>
                                    <td> <?= $rkpd21_1['lokasi'] ?></td>
                                    <td> <?= $rkpd21_1['sumber_dana'] ?></td>
                                    <td> <?= $rkpd21_1['nasional'] ?></td>
                                    <td> <?= $rkpd21_1['daerah'] ?></td>
                                    <td> <?= $rkpd21_1['kelompok_sasaran'] ?></td>
                                    <td> <?= $rkpd21_1['t23'] ?></td>
                                    <td> <?= $rkpd21_1['pagu23'] ?></td>
                                    <td> <?= $rkpd21_1['perangkat_daerah'] ?></td>

                                    <a href=""><i class="fas fa-edit"></i></a> |
                                    <!-- <a href="/rkpd21/delete/<?= $rkpd21_1['id_rkpd21']; ?>">Hapus</a> -->
                                    <?php if (in_groups('admin')) : ?>
                                        <a href="/rkpd21/edit/<?= $rkpd21_1['program']; ?>">Edit</a> |
                                        <!-- <a href="/rkpd21/delete/<?= $rkpd21_1['id_rkpd21']; ?>">Hapus</a> -->
                                        <a type='button' class="btn btn-danger" href="#" data-toggle="modal" data-target="#hapusModal">
                                            <i class="fas fa-trash-alt"></i>
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

    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contoh tampilan grafik </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">


                    <img src="/img/grafik/contohgrafik.png" style="width: 750px;" class="rounded mx-auto d-block" alt="...">
                </div>

                <div class="modal-footer">
                    <form action="" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-warning" type="button" data-dismiss="modal">Tutup</button>
                        <input type="hidden" name="_method" value="DELETE">

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>