<?= $this->extend('templates/masterData/masterData'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data Misi 2016 - 2021</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/misi/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_misi"><b>Nama Misi</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="nama_misi" name="nama_misi" for="nama_misi" class="form-control <?= $validation->hasError('nama_misi') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('nama_misi'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_misi'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi_misi"><b>Deskripsi</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="deskripsi_misi" name="deskripsi_misi" for="deskripsi_misi" class="form-control <?= $validation->hasError('deskripsi_misi') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('deskripsi_misi'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi_misi'); ?>
                        </div>
                    </div>
                </div>
                <button type='submit' class="btn btn-primary" href="/misi/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>