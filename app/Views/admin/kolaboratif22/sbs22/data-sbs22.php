<?= $this->extend('templates/kolaboratif/kolaboratif'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">


  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-700"><b>Data Stop Buang Air Besar Sembarangan 2022</b></h1>

  <!-- Alert -->
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('success'); ?>
    </div>
  <?php endif; ?>
  <!-- /Alert -->

  <div class="card shadow mb-4">
    <div class="card-header py-3">


      <a class="btn btn-primary" href="<?= base_url('admin/sbs22/create'); ?>"><i class="fas fa-plus-circle"></i>
        Tambah Data Sbs22 </a>
      <a class="btn btn-success" href="<?= base_url('admin/sbs22/exportExcel'); ?>"><i class="fas fa-info-circle"></i>
        Export Excel</a>



      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTableSbs22" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Kode Rek</th>
                <th>Perangkat Daerah</th>
                <th>Program/Kegiatan/Sub Kegiatan</th>
                <th>Indikator</th>
                <th>Target</th>
                <th>Pagu(Rp.)</th>
                <th>Satuan</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Alamat Lengkap</th>
                <th>Sumber Pendanaan</th>
                <th>Realisasi</th>
                <th>Progres</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($sbs22 as $sbs22_1) : ?>
                <tr>


                  <td> <?= $sbs22_1['kode_rekening'] ?></td>
                  <td> <?= $sbs22_1['nama_pd'] ?></td>
                  <td> <?= $sbs22_1['program_kolaboratif'] ?></td>
                  <td> <?= $sbs22_1['indikator_program'] ?></td>
                  <td> <?= $sbs22_1['target'] ?></td>
                  <td> <?= $sbs22_1['pagu'] ?></td>
                  <td> <?= $sbs22_1['nama_satuan'] ?></td>
                  <td> <?= $sbs22_1['id_kecamatan'] ?></td>
                  <td> <?= $sbs22_1['id_desa'] ?></td>
                  <td> <?= $sbs22_1['alamat'] ?></td>
                  <td style="text-transform: uppercase;"> <?= $sbs22_1['sumber_pendanaan'] ?></td>
                  <td <?php

                      $realisasi =  $sbs22_1['progres'];
                      $target = $sbs22_1['target'];

                      if ($realisasi < $target) {
                        echo 'style="background-color: tomato; color:white;"';
                      }
                      ?>> <?= $sbs22_1['progres'] ?></td>


                  <td>
                    <progress id="file" value="<?= $sbs22_1['progres']; ?>" max="<?= $sbs22_1['target']; ?>"> </progress>
                  </td>
                  <td>

                    <a href="">Edit</a> |
                    <a href="/sbs22/delete/<?= $sbs22_1['id_sbs22']; ?>">Hapus</a>
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