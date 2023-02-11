<?= $this->extend('templates/masterData/masterData'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">


  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-700"><b>Data Indikator Kinerja Utama dan Indikator Kinerja Daerah 2021 - 2026</b></h1>

  <!-- Alert -->
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('success'); ?>
    </div>
  <?php endif; ?>
  <!-- /Alert -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <?php if (in_groups('admin')) : ?>
        <a class="btn btn-primary" href="<?= base_url('admin/ikudanikd2126/create'); ?>"><i class="fas fa-plus-circle"></i>
          Tambah Data IKU / IKD </a>
        <a class="btn btn-success" href="<?= base_url('admin/ikudanikd2126/exportExcel'); ?>"><i class="fas fa-info-circle"></i>
          Export Excel</a>
      <?php else : ?>
        <a class="btn btn-success" href="<?= base_url('admin/ikudanikd2126/exportExcel'); ?>"><i class="fas fa-info-circle"></i>
          Export Excel</a>
      <?php endif; ?>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTableIkudanikd2126" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Indikator</th>
                <th>Jenis Indikator</th>
                <th>Satuan</th>
                <th width="20%">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($ikudanikd2126 as $ikudanikd2126_1) : ?>
                <tr>


                  <td> <?= $ikudanikd2126_1['nama_indikator'] ?></td>
                  <td> <?= $ikudanikd2126_1['jenis_indikator'] ?></td>
                  <td> <?= $ikudanikd2126_1['nama_satuan'] ?></td>
                  <td>
                    <?php if (in_groups('admin')) : ?>
                      <a type="button" class="btn btn-info" href="<?= base_url('admin/ikudanikd2126/edit-ikudanikd2126/' .  $ikudanikd2126_1['slug']); ?>">
                        <i class="fas fa-info-circle"></i> Edit</a>
                      <a type='button' class="btn btn-danger" href="#" data-toggle="modal" data-target="#hapusModal">
                        Hapus
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
  <!-- Hapus Modal-->

  <?= csrf_field(); ?>


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
          <form action="/ikudanikd2126/delete/<?= $ikudanikd2126_1['id_ikudanikd2126']; ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger" href="">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- </Hapus Modal> -->

</div>
<?= $this->endSection(); ?>