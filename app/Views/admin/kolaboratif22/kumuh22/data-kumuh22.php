<?= $this->extend('templates/kolaboratif/kolaboratif'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">


  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-700"><b>Data Pencegahan dan Peningkatan Kualitas Perumahan Kumuh dan Permukiman Kumuh 2022</b></h1>

  <!-- Alert -->
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('success'); ?>
    </div>
  <?php endif; ?>
  <!-- /Alert -->

  <div class="card shadow mb-4">
    <div class="card-header py-3">


      <a class="btn btn-primary" href="<?= base_url('admin/kumuh22/create'); ?>"><i class="fas fa-plus-circle"></i>
        Tambah Data kumuh22 </a>
      <a class="btn btn-success" href="<?= base_url('admin/kumuh22/exportExcel'); ?>"><i class="fas fa-info-circle"></i>
        Export Excel</a>



      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTableKumuh22" width="100%" cellspacing="0">
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
              <?php foreach ($kumuh22 as $kumuh22_1) : ?>
                <tr>


                  <td> <?= $kumuh22_1['kode_rekening'] ?></td>
                  <td> <?= $kumuh22_1['nama_pd'] ?></td>
                  <td> <?= $kumuh22_1['program_kolaboratif'] ?></td>
                  <td> <?= $kumuh22_1['indikator_program'] ?></td>
                  <td> <?= $kumuh22_1['target'] ?></td>
                  <td> <?= $kumuh22_1['pagu'] ?></td>
                  <td> <?= $kumuh22_1['nama_satuan'] ?></td>
                  <td> <?= $kumuh22_1['id_kecamatan'] ?></td>
                  <td> <?= $kumuh22_1['id_desa'] ?></td>
                  <td> <?= $kumuh22_1['alamat'] ?></td>
                  <td style="text-transform: uppercase;"> <?= $kumuh22_1['sumber_pendanaan'] ?></td>
                  <td <?php

                      $realisasi =  $kumuh22_1['progres'];
                      $target = $kumuh22_1['target'];

                      if ($realisasi < $target) {
                        echo 'style="background-color: tomato; color:white;"';
                      }
                      ?>> <?= $kumuh22_1['progres'] ?></td>


                  <td>
                    <progress id="file" value="<?= $kumuh22_1['progres']; ?>" max="<?= $kumuh22_1['target']; ?>"> </progress>
                  </td>
                  <td>

                    <a href="">Edit</a> |
                    <a href="/kumuh22/delete/<?= $kumuh22_1['id_kumuh22']; ?>">Hapus</a>
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