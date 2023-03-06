<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Data RKPD</b></h1>

    <!-- Alert -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    <!-- /Alert -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="<?= base_url('admin/rkpd/create'); ?>"><i class="fas fa-plus-circle"></i>
                Tambah Data rkpd</a>
            <a class="btn btn-success" href="<?= base_url('admin/rkpd/exportExcel'); ?>"><i class="fas fa-info-circle"></i>
                Export Excel</a>

                <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTableRkpd" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>id_rkpd</th>
                    <th>id_kode_rekening</th>
                    <th>id_pd</th>
                    <th>program</th>
                    <th>indikator</th>
                    <th>target</th>
                    <th>id_satuan</th>
                    <th>pagu</th>
                    <th>sumber_dana</th>
                    <th>sumber_dana</th>
                    <th>prioritas_nasional</th>
                    <th>prioritas_daerah</th>
                    <th>kelompok_sasaran</th>
                    <th>tahun_rkpd</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 $urutan = 0;
                 foreach ($rkpd as $rkpds): ?>
                <tr>
                    <td><?= $rkpds['id_rkpd'] ?></td>
                    <td><?= $rkpds['id_kode_rekening'] ?></td>
                    <td><?= $rkpds['id_pd'] ?></td>
                    <td><?= $rkpds['program'] ?></td>
                    <td><?= $rkpds['indikator'] ?></td>
                    <td><?= $rkpds['target'] ?></td>
                    <td><?= $rkpds['id_satuan'] ?></td>
                    <td><?= $rkpds['pagu'] ?></td>
                    <td><?= $rkpds['sumber_dana'] ?></td>
                    <td><?= $rkpds['sumber_dana'] ?></td>
                    <td><?= $rkpds['prioritas_nasional'] ?></td>
                    <td><?= $rkpds['prioritas_daerah'] ?></td>
                    <td><?= $rkpds['kelompok_sasaran'] ?></td>
                    <td><?= $rkpds['tahun_rkpd'] ?></td>
                    <td>
                        <?php if (in_groups('admin')) : ?>
                            <a type='button' class="btn btn-warning" href="/rkpd/update/<?=$rkpds['id_rkpd']; ?>" aria-placeholder="">
                                <i class="fas fa-edit"></i>
                            </a>
                            <!-- <a href="/rkpds/delete/<?= $rkpds['id_rkpd']; ?>">Hapus</a> -->
                            <a type='button' class="btn btn-danger" href="#" data-toggle="modal" data-target="#hapusModal" data-id_rkpd="<?= $rkpds['id_rkpd']; ?>">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <a type='button' class="btn btn-info" href="#" data-toggle="modal" data-target="#grafikModal" onclick="getDataTargetRealisasi(<?= $urutan;?>)" data-backdrop="static" data-keyboard="false">
                                <i class="fas fa-chart-bar"></i>
                            </a>
                        <?php else : ?>
                            <a type='button' class="btn btn-info" href="#" data-toggle="modal" data-target="#grafikModal" onclick="getDataTargetRealisasi(<?= $urutan;?>)" data-backdrop="static" data-keyboard="false">
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
                            // print_r($rkpds);
                            // foreach ($rkpd as $key => $value) {
                            // $rkpd[]=$value['t17'];
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


<!-- <script src="<?= base_url(); ?>/vendor/chart.js/Chart.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    var dataTarget = [];
    var dataRealisasi = [];
    const target = <?php echo json_encode($rkpd); ?>;
    var myChart;

    function getDataTargetRealisasi(id){
        // Mengosongkan array
        dataTarget = [];
        dataRealisasi = [];
        // push dataTarget
        dataTarget.push(parseFloat(target[id]['t17']));
        dataTarget.push(parseFloat(target[id]['t18']));
        dataTarget.push(parseFloat(target[id]['t19']));
        dataTarget.push(parseFloat(target[id]['t20']));
        dataTarget.push(parseFloat(target[id]['t21']));
        // push dataRealisasi
        dataRealisasi.push(parseFloat(target[id]['r17']));
        dataRealisasi.push(parseFloat(target[id]['r18']));
        dataRealisasi.push(parseFloat(target[id]['r19']));
        dataRealisasi.push(parseFloat(target[id]['r20']));
        dataRealisasi.push(parseFloat(target[id]['r21']));

        document.getElementById('titleIndikator').innerHTML = target[id]['nama_indikator'];
        
        var ctx = document.getElementById('myChart');
        myChart = new Chart(ctx, {
            type: 'line',
            data: {
                // labels: <?= json_encode($rkpd) ?>,
                labels: [2017, 2018, 2019, 2020, 2021],
                // labels: [$thn17],
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
    function destroyChart(){
        myChart.destroy();
    }
        
    

    // var ctx = document.getElementById('myChart');
    // var myChart = new Chart(ctx, {
    //     type: 'line',
    //     data: {
    //         // labels: <?= json_encode($rkpd) ?>,
    //         labels: [2017, 2018, 2019, 2020, 2021],
    //         // labels: [$thn17],
    //         datasets: [{
    //             label: 'Target',
    //             data: [5, 2, 7, 9, 1, 2, 5, 3, 4, 10],
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 0.2)'
    //             ],
    //             borderColor: [
    //                 'rgba(255, 99, 132, 1)'
    //             ],
    //             borderWidth: 1
    //         }, {
    //             label: 'Realisasi',
    //             data: [4, 5, 2, 4, 5, 1, 2, 8, 6, 7],
    //             backgroundColor: [
    //                 'rgba(3, 138, 255, 0.2)'
    //             ],
    //             borderColor: [
    //                 'rgba(15, 10, 222, 1)'
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     beginAtZero: true
    //                 }
    //             }]
    //         }
    //     }
    // });
</script>
<script src="path/to/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#hapusModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id_rkpd = button.data('id_rkpd')
        var modal = $(this)
        modal.find('.del-button').attr('href', '/rkpd/delete/' + id_rkpd)
    })
})
</script>
<script>
    $.ajax({
    type: "POST",
    url: "<?= base_url('rkpd/getDataUpdate') ?>",
    data: {id_rkpd: "<?= $rkpds['id_rkpd'] ?>"},
    success: function (response) {
        // action to be performed on success
    }
});
</script>
<?= $this->endSection(); ?>