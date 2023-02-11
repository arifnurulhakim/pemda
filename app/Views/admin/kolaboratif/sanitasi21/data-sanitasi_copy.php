<?= $this->extend('templates/kolaboratif/kolaboratif'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">


  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-700"><b>Data Sanitasi dan Penyehatan Lingkungan</b></h1>

  <!-- Alert -->
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('success'); ?>
    </div>
  <?php endif; ?>
  <!-- /Alert -->

  <div class="card shadow mb-4">
    <div class="card-header py-3">


      <a class="btn btn-primary" href="<?= base_url('admin/sanitasi/create'); ?>"><i class="fas fa-plus-circle"></i>
        Tambah Data Sanitasi </a>
      <a class="btn btn-success" href="<?= base_url('admin/sanitasi/exportExcel'); ?>"><i class="fas fa-info-circle"></i>
        Export Excel</a>



      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTableSanitasi" width="100%" cellspacing="0">
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
              <?php foreach ($sanitasi as $sanitasi_1) : ?>
                <tr>


                  <td> <?= $sanitasi_1['kode_rekening'] ?></td>
                  <td> <?= $sanitasi_1['nama_pd'] ?></td>
                  <td> <?= $sanitasi_1['program'] ?></td>
                  <td> <?= $sanitasi_1['indikator_program'] ?></td>
                  <td> <?= $sanitasi_1['target'] ?></td>
                  <td> <?= $sanitasi_1['pagu'] ?></td>
                  <td> <?= $sanitasi_1['nama_satuan'] ?></td>
                  <td> <?= $sanitasi_1['id_kecamatan'] ?></td>
                  <td> <?= $sanitasi_1['id_desa'] ?></td>
                  <td> <?= $sanitasi_1['alamat'] ?></td>
                  <td style="text-transform: uppercase;"> <?= $sanitasi_1['sumber_pendanaan'] ?></td>
                  <td <?php

                      $realisasi =  $sanitasi_1['progres'];
                      $target = $sanitasi_1['target'];

                      if ($realisasi < $target) {
                        echo 'style="background-color: tomato; color:white;"';
                      }
                      ?>> <?= $sanitasi_1['progres'] ?></td>


                  <td>
                    <progress id="file" value="<?= $sanitasi_1['progres']; ?>" max="<?= $sanitasi_1['target']; ?>"> </progress>
                  </td>
                  <td>

                    <a href="">Edit</a> |
                    <a href="/sanitasi/delete/<?= $sanitasi_1['id_sanitasi']; ?>">Hapus</a>
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