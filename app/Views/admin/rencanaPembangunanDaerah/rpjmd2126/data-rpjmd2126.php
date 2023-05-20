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
            <?php if (logged_in() === true) { ?>
                <a class="btn btn-primary" href="<?= base_url('admin/rpjmd2126/create'); ?>"><i class="fas fa-plus-circle"></i>
                    Tambah Data RPJMD</a>
            <?php } ?>
            <a class="btn btn-success" href="<?= base_url('admin/rpjmd2126/exportExcel'); ?>"><i class="fas fa-info-circle"></i>
                Export Excel</a>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableRpjmd2126" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="4">No</th>
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
                            <?php
                            $urutan = 0;
                            $idData = 0;
                            foreach ($rpjmd2126 as $rpjmd2126_1) : ?>
                                <tr>
                                    <td><?= $urutan += 1; ?>
                                    <td><?= $rpjmd2126_1['nama_misi2126'] ?></td>
                                    <td><?= $rpjmd2126_1['nama_indikator'] ?></td>
                                    <td><?= $rpjmd2126_1['jenis_indikator'] ?></td>
                                    <td><?= $rpjmd2126_1['nama_satuan'] ?></td>


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
                                            <a type="button" class="btn btn-warning" href=""><i class="fas fa-edit"></i></a>
                                            <!-- <a href="/rpjmd2126/delete/<?= $rpjmd2126_1['id_rpjmd2126']; ?>">Hapus</a> -->
                                            <a type='button' class="btn btn-danger" href="#" data-toggle="modal" data-target="#hapusModal">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            <a type='button' class="btn btn-info" href="#" data-toggle="modal" data-target="#grafikModal" onclick="getDataTargetRealisasi(<?= $idData;  ?>)">
                                                <i class="fas fa-chart-bar"></i>
                                            </a>
                                        <?php else : ?>
                                            <a type='button' class="btn btn-info" href="#" data-toggle="modal" data-target="#grafikModal" onclick="getDataTargetRealisasi(<?= $idData; ?>)">
                                                <i class="fas fa-chart-bar"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php
                                $idData++;
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
                            // print_r($rpjmd1621_1);
                            // foreach ($rpjmd1621 as $key => $value) {
                            // $rpjmd1621[]=$value['t17'];
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
                                    <h6 id='titleIndikator' class="m-0 font-weight-bold text-primary">Area Chart</h6>
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
                        <button class="btn btn-warning" type="button" data-dismiss="modal" onclick="destroyChart()">Tutup</button>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var dataTarget = [];
    var dataRealisasi = [];
    const target = <?php echo json_encode($rpjmd2126); ?>;
    var myChart;
    console.log(target);

    function getDataTargetRealisasi(id) {

        // Mengosongkan array
        dataTarget = [];
        dataRealisasi = [];
        // push dataTarget
        dataTarget.push(parseFloat(target[id]['t22']));
        dataTarget.push(parseFloat(target[id]['t23']));
        dataTarget.push(parseFloat(target[id]['t24']));
        dataTarget.push(parseFloat(target[id]['t25']));
        dataTarget.push(parseFloat(target[id]['t26']));
        // push dataRealisasi
        dataRealisasi.push(parseFloat(target[id]['r22']));
        dataRealisasi.push(parseFloat(target[id]['r23']));
        dataRealisasi.push(parseFloat(target[id]['r24']));
        dataRealisasi.push(parseFloat(target[id]['r25']));
        dataRealisasi.push(parseFloat(target[id]['r26']));

        document.getElementById('titleIndikator').innerHTML = target[id]['nama_indikator'];

        var ctx = document.getElementById('myChart');
        myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [2022, 2023, 2024, 2025, 2026],
                datasets: [{
                    label: 'Target',
                    data: dataTarget,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }, {
                    label: 'Realisasi',
                    data: dataRealisasi,
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
    };

    function destroyChart() {
        myChart.destroy();
    };
</script>
<?= $this->endSection(); ?>