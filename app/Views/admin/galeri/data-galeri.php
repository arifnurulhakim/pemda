<?= $this->extend('templates/masterData/masterData'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Galeri</b></h1>

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
            <a class="btn btn-primary" href="<?= base_url('admin/galeri/create'); ?>"><i class="fas fa-plus-circle"></i>
                Tambah Data</a>
            <?php endif; ?>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableGaleri" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Gambar</th>
                                <th>Gambar</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($galeri as $g) : ?>
                            <tr>
                                <td> <?= $g['nama_gambar'] ?></td>
                                <td> <?= $g['gambar_galeri'] ?></td>
                                <td>
                                    <?php if (in_groups('admin')) : ?>
                                    <a type='button' class="btn btn-warning" href="/galeri/edit/<?= $g['slug'] ?>"
                                        aria-placeholder="">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a type='button' class="btn btn-danger" href="/galeri/delete/<?= $g['id_galeri'] ?>"
                                        onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></a>
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