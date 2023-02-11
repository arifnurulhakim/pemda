<?= $this->extend('templates/masterData/masterData'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data Perangkat Daerah</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/PerangkatDaerah/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_pd"><b>Nama Perangkat Daerah</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="nama_pd" name="nama_pd" for="nama_pd" class="form-control <?= $validation->hasError('nama_pd') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('nama_pd'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_pd'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi_pd"><b>Deskripsi</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="deskripsi_pd" name="deskripsi_pd" for="deskripsi_pd" class="form-control <?= $validation->hasError('deskripsi_pd') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('deskripsi_pd'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi_pd'); ?>
                        </div>
                    </div>
                </div>
                <button type='submit' class="btn btn-primary" href="/PerangkatDaerah/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>