<?= $this->extend('templates/masterData/masterData'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data Satuan</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/satuan/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_satuan"><b>Nama satuan</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="nama_satuan" name="nama_satuan" for="nama_satuan" class="form-control <?= $validation->hasError('nama_satuan') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('nama_satuan'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_satuan'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi_satuan"><b>Deskripsi</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="deskripsi_satuan" name="deskripsi_satuan" for="deskripsi_satuan" class="form-control <?= $validation->hasError('deskripsi_satuan') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('deskripsi_satuan'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi_satuan'); ?>
                        </div>
                    </div>
                </div>
                <button type='submit' class="btn btn-primary" href="/satuan/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>