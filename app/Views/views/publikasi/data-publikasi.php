<?= $this->extend('templates/masterData/masterData'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Publikasi</b></h1>
    <!-- Alert -->
    <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('success'); ?>
    </div>
    <?php endif; ?>
    <!-- /Alert -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if(in_groups('admin')) : ?>
            <a class="btn btn-primary" href="<?= base_url('admin/publikasi/create'); ?>"><i
                    class="fas fa-plus-circle"></i>
                Tambah Data</a>
            <?php endif; ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTablePublikasi">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Jumlah Unduhan</th>
                                <th style="text-align: center;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($publikasi as $p) : ?>
                            <tr>
                                <td> <?= $i++; ?></td>
                                <td><?= $p['nama_file'] ?></td>
                                <td> kali</td>
                                <td>
                                    <?php if(in_groups('admin')) : ?>
                                    <a href="/publikasi/edit/<?= $p['slug'] ?>" class="btn btn-warning"
                                        title="Edit Data"><i class="fas fa-edit"></i></a>
                                    <a type="button" title="<?= $p['file_publikasi'] ?>" target="_blank"
                                        class="btn btn-primary"
                                        href="<?= base_url('file/publikasi/'. $p['file_publikasi']); ?>">
                                        <i class="fas fa-file-pdf"></i></a>
                                    <a type='button' class="btn btn-danger"
                                        href="/publikasi/delete/<?= $p['id_publikasi'] ?>"
                                        onclick="return confirm('Are you sure ?')" title="Hapus Data"><i
                                            class="fas fa-trash-alt"></i></a>
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

</div>
<?= $this->endSection(); ?>