<?= $this->extend('templates/masterData/masterData'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Edit Misi 2021 - 2026</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/misi2126/update/<?= $result['id_misi2126']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug_misi2126" value="<?= $result['slug_misi2126']; ?>" name="slug_misi2126">
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_misi2126"><b>Nama misi2126</b></label><input id="nama_misi2126" name="nama_misi2126" for="nama_misi2126" class="form-control <?= $validation->hasError('nama_misi2126') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('nama_misi2126', $result['nama_misi2126']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_misi2126'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi_misi2126"><b>Deskripsi</b></label><textarea class="form-control <?= $validation->hasError('deskripsi_misi2126') ? 'is-invalid' : ''; ?>" id="deskripsi_misi2126" name="deskripsi_misi2126" for='deskripsi_misi2126' rows="3" value="<?= old('deskripsi_misi2126'); ?>"><?= $result['deskripsi_misi2126']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi_misi2126'); ?>
                        </div>
                    </div>
                </div>

                <button type='submit' class="btn btn-primary" href="/misi2126/edit">Ubah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>