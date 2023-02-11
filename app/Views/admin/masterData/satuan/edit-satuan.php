<?= $this->extend('templates/masterData/masterData'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Edit Satuan</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/satuan/update/<?= $result['id_satuan']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug_satuan" value="<?= $result['slug_satuan']; ?>" name="slug_satuan">
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_satuan"><b>Nama Satuan</b></label><input id="nama_satuan" name="nama_satuan" for="nama_satuan" class="form-control <?= $validation->hasError('nama_satuan') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('nama_satuan', $result['nama_satuan']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_satuan'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi_satuan"><b>Deskripsi</b></label><textarea class="form-control <?= $validation->hasError('deskripsi_satuan') ? 'is-invalid' : ''; ?>" id="deskripsi_satuan" name="deskripsi_satuan" for='deskripsi_satuan' rows="3" value="<?= old('deskripsi_satuan'); ?>"><?= $result['deskripsi_satuan']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi_satuan'); ?>
                        </div>
                    </div>
                </div>

                <button type='submit' class="btn btn-primary" href="/satuan/edit">Ubah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>