<?= $this->extend('templates/masterData/masterData'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Edit Perangkat Daerah</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/PerangkatDaerah/update/<?= $result['id_pd']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $result['slug']; ?>" name="slug">
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_pd"><b>Nama Perangkat Daerah</b></label><input id="nama_pd" name="nama_pd" for="nama_pd" class="form-control <?= $validation->hasError('nama_pd') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('nama_pd', $result['nama_pd']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_pd'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi_pd"><b>Deskripsi</b></label><textarea class="form-control <?= $validation->hasError('deskripsi_pd') ? 'is-invalid' : ''; ?>" id="deskripsi_pd" name="deskripsi_pd" for='deskripsi_pd' rows="3" value="<?= old('deskripsi_pd'); ?>"><?= $result['deskripsi_pd']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi_pd'); ?>
                        </div>
                    </div>
                </div>

                <button type='submit' class="btn btn-primary" href="/PerangkatDaerah/edit">Ubah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>