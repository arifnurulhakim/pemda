<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Data Rencana Strategi Pembangunan Daerah 2016 - 2021</b></h1>

    <!-- Alert -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    <!-- /Alert -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if (logged_in() === true) { ?>
                <a class="btn btn-primary" href="<?= base_url('admin/renstra1621/create'); ?>"><i class="fas fa-plus-circle"></i>
                    Tambah Data Renstra-PD</a>
            <?php } ?>
            <a class="btn btn-success" href="<?= base_url('admin/renstra1621/exportExcel'); ?>"><i class="fas fa-info-circle"></i>
                Export Excel</a>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableRenstra1621" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="4">No</th>
                                <th rowspan="4">Perangkat Daerah</th>
                                <th rowspan="4">Indikator Renstra</th>
                                <th rowspan="4">Satuan</th>
                            <tr>
                                <th colspan="10" style="text-align: center;">Tahun</th>
                                <th style="text-align: center;" rowspan="3">Aksi</th>
                            <tr>


                                <th colspan="2" style="text-align: center;">2017</th>
                                <th colspan="2" style="text-align: center;">2018</th>
                                <th colspan="2" style="text-align: center;">2019</th>
                                <th colspan="2" style="text-align: center;">2020</th>
                                <th colspan="2" style="text-align: center;">2021</th>
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

                            <?php
                            $urutan = 1;
                            foreach ($renstra1621 as $renstra1621_1) : ?>
                                <tr>
                                    <td><?= $urutan; ?>
                                    <td><?= $renstra1621_1['nama_pd'] ?></td>
                                    <td><?= $renstra1621_1['nama_indikator'] ?></td>
                                    <td><?= $renstra1621_1['nama_satuan'] ?></td>

                                    <td> <?= $renstra1621_1['t17'] ?></td>
                                    <td <?php

                                        $realisasi =  $renstra1621_1['r17'];
                                        $target = $renstra1621_1['t17'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $renstra1621_1['r17'] ?></td>

                                    <td> <?= $renstra1621_1['t18'] ?></td>
                                    <td <?php

                                        $realisasi =  $renstra1621_1['r18'];
                                        $target = $renstra1621_1['t18'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $renstra1621_1['r18'] ?></td>

                                    <td> <?= $renstra1621_1['t19'] ?></td>
                                    <td <?php

                                        $realisasi =  $renstra1621_1['r19'];
                                        $target = $renstra1621_1['t19'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $renstra1621_1['r19'] ?></td>

                                    <td> <?= $renstra1621_1['t20'] ?></td>
                                    <td <?php

                                        $realisasi =  $renstra1621_1['r20'];
                                        $target = $renstra1621_1['t20'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $renstra1621_1['r20'] ?></td>

                                    <td> <?= $renstra1621_1['t21'] ?></td>
                                    <td <?php

                                        $realisasi =  $renstra1621_1['r21'];
                                        $target = $renstra1621_1['t21'];

                                        if ($realisasi < $target) {
                                            echo 'style="background-color: tomato; color:white;"';
                                        }
                                        ?>> <?= $renstra1621_1['r21'] ?></td>

                                    <td>
                                        <?php if (in_groups('admin')) : ?>
                                            <a type='button' class="btn btn-warning" href="/renstra1621/update/<?= $renstra1621_1['id_renstra1621']; ?>" aria-placeholder="">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <!-- <a href="/renstra1621/delete/<?= $renstra1621_1['id_renstra1621']; ?>">Hapus</a> -->
                                            <a type='button' class="btn btn-danger" href="#" data-toggle="modal" data-target="#hapusModal" data-id_renstra1621="<?= $renstra1621_1['id_renstra1621']; ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            <a type='button' class="btn btn-info" href="#" data-toggle="modal" data-target="#grafikModal" onclick="getDataTargetRealisasi(<?= $urutan; ?>)" data-backdrop="static" data-keyboard="false">
                                                <i class="fas fa-chart-bar"></i>
                                            </a>
                                        <?php else : ?>
                                            <a type='button' class="btn btn-info" href="#" data-toggle="modal" data-target="#grafikModal" onclick="getDataTargetRealisasi(<?= $urutan; ?>)" data-backdrop="static" data-keyboard="false">
                                                <i class="fas fa-chart-bar"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>


                                </tr>

                            <?php
                                $urutan++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
    <!-- Grafik Modal -->
    <div class="modal fade" id="grafikModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tampilan Grafik</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <!-- <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3>Multiple Line Series</h3>
                                </div>
                                <div id="chart2" class="panel-body">
                                </div>
                            </div>
                        </div> -->
                        <div class="col">
                            <?php
                            // print_r($renstra1621_1);
                            // foreach ($renstra1621 as $key => $value) {
                            // $renstra1621[]=$value['t17'];
                            // $trg[]=$value['t18'];
                            // $trg[]=$value['t19'];
                            // $trg[]=$value['t20'];
                            // $trg[]=$value['t21'];
                            //    $trg[]= $value['t17'];
                            //    $trg[]= $value['t18'];
                            //    $trg[]= $value['t19'];
                            //    $trg[]= $value['t20'];
                            //    $trg[]= $value['t21'];
                            // }
                            // echo json_encode($trg);
                            ?>
                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

    <!-- !Grafik Modal -->

    <!-- Hapus Modal-->
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang anda hapus tidak dapat
                    kembali.</div>

                <div class="modal-footer">

                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

                    <a type="submit" class="btn btn-danger del-button" href="">Hapus</a>

                </div>
            </div>
        </div>
    </div>
    <!-- </Hapus Modal> -->
</div>

<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            // labels: <?= json_encode($renstra1621) ?>,
            labels: [2017, 2018, 2019, 2020, 2021],
            // labels: [$thn17],
            datasets: [{
                label: 'Target',
                data: [5, 2, 7, 9, 1, 2, 5, 3, 4, 10],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }, {
                label: 'Realisasi',
                data: [4, 5, 2, 4, 5, 1, 2, 8, 6, 7],
                backgroundColor: [
                    'rgba(3, 138, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(15, 10, 222, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script src="path/to/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#hapusModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_renstra1621 = button.data('id_renstra1621')
            var modal = $(this)
            modal.find('.del-button').attr('href', '/renstra1621/delete/' + id_renstra1621)
        })
    })
</script>
<script>
    $.ajax({
        type: "POST",
        url: "<?= base_url('renstra1621/getDataUpdate') ?>",
        data: {
            id_renstra1621: "<?= $renstra1621_1['id_renstra1621'] ?>"
        },
        success: function(response) {
            // action to be performed on success
        }
    });
</script>
<?= $this->endSection(); ?>