<?= $this->extend('templates/masterData/masterData'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Data Misi</b></h1>

    <!-- Alert -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    <!-- /Alert -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="<?= base_url('admin/misi/create'); ?>"><i class="fas fa-plus-circle"></i>
                Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama misi</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($misi as $ms) : ?>
                            <tr>
                                <td> <?= $ms['nama_misi'] ?></td>
                                <td> <?= $ms['deskripsi_misi'] ?></td>
                                <td>
                                    <a type="button" class="btn btn-info" href="<?= base_url('admin/misi/edit-misi/' . $ms['slug_misi']); ?>">
                                        <i class="fas fa-info-circle"></i> Edit</a>
                                    <a type='button' class="btn btn-danger" href="#" data-toggle="modal" data-target="#hapusModal">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

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
                    <form action="/misi/delete/<?= $ms['id_misi']; ?>" method="post">
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


</div>
<?= $this->endSection(); ?>