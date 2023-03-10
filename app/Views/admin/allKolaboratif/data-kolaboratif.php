<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Data Kolaboratif</b></h1>

    <!-- Alert -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    <!-- /Alert -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="<?= base_url('admin/kolaboratif/create'); ?>"><i class="fas fa-plus-circle"></i>
                Tambah Data kolaboratif</a>
                <a class="btn btn-success" type="button" id="export_button"><i class="fas fa-info-circle"></i>
                Export Excel</a>

                </div>
                
                <div class="card-body">
                <div class="row mb-3">
                <div class="col">
                <div class="form-group">
                <select class="form-control" id="tahun_program" name="tahun_program">
                    <option value="">-- Pilih Tahun Program --</option>
                    <?php
                    $tahun_program = array();
                    foreach ($kolaboratif as $kolaboratifs) {
                        if (!in_array($kolaboratifs['tahun_program'], $tahun_program)) {
                            array_push($tahun_program, $kolaboratifs['tahun_program']);
                        }
                    }
                    foreach ($tahun_program as $tahun) {
                        echo "<option value='$tahun'>$tahun</option>";
                    }
                    ?>
                </select>
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                <select class="form-control" id="jenis_program" name="jenis_program">
                    <option value="">-- Pilih Jenis Program --</option>
                    <?php
                    $jenis_program = array();
                    foreach ($kolaboratif as $kolaboratifs) {
                        if (!in_array($kolaboratifs['jenis_program'], $jenis_program)) {
                            array_push($jenis_program, $kolaboratifs['jenis_program']);
                        }
                    }
                    foreach ($jenis_program as $jenis) {
                        echo "<option value='$jenis'>$jenis</option>";
                    }
                    ?>
                </select>
                </div>
                </div>
               
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTablekolaboratif" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>no</th>
                                <th>Jenis Program</th>
                                <th>Nama Program</th>
                                <th>Indikator</th>
                                <th>Tahun Program</th>
                                <th>Nama PD</th>
                                <th>Kode Rekening</th>
                                <th>ID Satuan</th>
                                <th>Target</th>
                                <th>Pagu</th>
                                <th>Kecamatan</th>
                                <th>Desa</th>
                                <th>Alamat</th>
                                <th>Sumber Pendanaan</th>
                                <th>Progres</th>
                                
                                </tr>
                            </thead>
            <tbody>


            <?php 
            // var_dump($kolaboratif);
                 $urutan = 1;
                 foreach ($kolaboratif as $kolaboratifs): ?>
                <tr>
                        <td><?= $urutan ?></td>
                        <td><?= $kolaboratifs['jenis_program'] ?></td>
                        <td><?= $kolaboratifs['nama_program'] ?></td>
                        <td><?= $kolaboratifs['indikator'] ?></td>
                        <td><?= $kolaboratifs['tahun_program'] ?></td>
                        <td><?= $kolaboratifs['nama_pd'] ?></td>
                        <td><?= $kolaboratifs['kode_rekening'] ?></td>
                        <td><?= $kolaboratifs['nama_satuan'] ?></td>
                        <td><?= $kolaboratifs['target'] ?></td>
                        <td><?= $kolaboratifs['pagu'] ?></td>
                        <td><?= $kolaboratifs['kecamatan'] ?></td>
                        <td><?= $kolaboratifs['desa'] ?></td>
                        <td><?= $kolaboratifs['alamat'] ?></td>
                        <td><?= $kolaboratifs['sumber_pendanaan'] ?></td>
                        <td><?= $kolaboratifs['progres'] ?></td>
                      
                    <td>
                        <?php if (in_groups('admin')) : ?>
                            <a type='button' class="btn btn-warning" href="/kolaboratif/edit/<?=$kolaboratifs['id_kolaboratif']; ?>" aria-placeholder="">
                                <i class="fas fa-edit"></i>
                            </a>
                            <!-- <a href="/kolaboratifs/delete/<?= $kolaboratifs['id_kolaboratif']; ?>">Hapus</a> -->
                            <a type='button' class="btn btn-danger" href="#" data-toggle="modal" data-target="#hapusModal" data-id_kolaboratif="<?= $kolaboratifs['id_kolaboratif']; ?>">
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
            </div>
            </div>
    <!-- Grafik Modal -->
    <div class="modal fade" id="grafikModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tampilan Grafik</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
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
                            // print_r($kolaboratifs);
                            // foreach ($kolaboratif as $key => $value) {
                            // $kolaboratif[]=$value['t17'];
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

   <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filterModalLabel">Filter Tabel Kolaboratif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="filter-form">
        <div class="form-group">
    <label for="tahun_program">Tahun Program</label>
    <input type="text" class="form-control" id="tahun_program" name="tahun_program" placeholder="Tahun (yyyy)" maxlength="4" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
</div>

<div class="form-group">
  <label for="jenis_program">Jenis Program</label>
  <select class="form-control" id="jenis_program" name="jenis_program">
    <option value="">-- Pilih Jenis Program --</option>
    <option value="rumah">Rumah</option>
    <option value="sanisasi">Sanitasi</option>
    <option value="tni">TNI</option>
  </select>
</div>
          <button type="submit" class="btn btn-primary" id="filter-btn">Filter</button>
        </form>
      </div>
    </div>
  </div>
</div>



    <!-- Hapus Modal-->
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
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
    const target = <?php echo json_encode($kolaboratif); ?>;
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
                // labels: <?= json_encode($kolaboratif) ?>,
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
</script>
<script src="path/to/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#hapusModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id_kolaboratif = button.data('id_kolaboratif')
        var modal = $(this)
        modal.find('.del-button').attr('href', '/kolaboratif/delete/' + id_kolaboratif)
    })
})
</script>
<script>
    $.ajax({
    type: "POST",
    url: "<?= base_url('kolaboratif/getDataUpdate') ?>",
    data: {id_kolaboratif: "<?= $kolaboratifs['id_kolaboratif'] ?>"},
    success: function (response) {
        // action to be performed on success
    }
});
</script>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js">
  $(document).ready(function() {
    // Tampilkan modal filter saat tombol "Filter" ditekan
    $("#filter-btn").click(function() {
      $("#filterModal").modal("show");
    });

    // Kirim data filter ke controller saat tombol "Submit" ditekan
    $("#filter-form").submit(function(e) {
      e.preventDefault();
      var tahun_program = $("#tahun_program").val();
      var jenis_program = $("#jenis_program").val();
 
      $.ajax({
        url: "<?= base_url('kolaboratif/filter') ?>",
        type: "POST",
        data: {
            tahun_program: tahun_program,
            jenis_program: jenis_program
        },
        success: function(data) {
          $("#dataTablekolaboratif tbody").html(data);
          $("#filterModal").modal("hide");
        },
        error: function() {
          alert("Terjadi kesalahan saat mengirim data filter");
        }
      });
    });
  });
</script> -->

<link rel="stylesheet" type="text/css" href="css/datatables.min.css">
  <script type="text/javascript" src="js/datatables.min.js"></script>
<script>
  $(document).ready(function() {
    // define filter function
    $('#dataTablekolaboratif').DataTable({
    // opsi untuk menambahkan search dan pagination
    searching: true,
    paging: true,
    // opsi tambahan jika diperlukan
    pageLength: 10, // jumlah data per halaman
    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]] // opsi jumlah data per halaman
    function filterTable() {
      var jenis_program = $('#jenis_program').val();
      var tahun_program = $('#tahun_program').val().toString();
      $('#dataTablekolaboratif tbody tr').each(function() {
        var current_row = $(this);
        var jenis_match = jenis_program === '' || current_row.find('td:eq(1)').text().indexOf(jenis_program) !== -1;
        var tahun_match = tahun_program === '' || current_row.find('td:eq(4)').text().indexOf(tahun_program) !== -1;
        current_row.toggle(jenis_match && tahun_match);
      });
    }

    // filter table on change of jenis_program
    $('#jenis_program').change(filterTable);

    // filter table on change of tahun_program
    $('#tahun_program').change(filterTable);
  });
  });

</script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

<script>
function html_table_to_excel(type)
    {
        var data = document.getElementById('dataTablekolaboratif');

        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });
        XLSX.writeFile(file, 'Data-Kolaboratif-' + new Date().toISOString().slice(0, 19).replace(/:/g, '-') + '.' + type);

    }

    const export_button = document.getElementById('export_button');

    export_button.addEventListener('click', () =>  {
        html_table_to_excel('xlsx');
    });

</script>


<!-- <script>
    $(document).ready(function () {
  $('#dataTablekolaboratif').DataTable({
    initComplete: function () {
      this.api().columns([2]).every(function () {
        var column = this;
        var select = $('<select><option value="">Jenis Indikator</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

    </script> -->



<?= $this->endSection(); ?>