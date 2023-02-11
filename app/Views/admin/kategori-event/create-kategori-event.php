<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data Kategori Event</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/kategorievent/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_kategori_event"><b>Nama Kategori</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="nama_kategori_event" name="nama_kategori_event" for="nama_kategori_event" class="form-control <?= $validation->hasError('nama_kategori_event') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('nama_kategori_event'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_kategori_event'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi_kategori_event"><b>Deskripsi</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="deskripsi_kategori_event" name="deskripsi_kategori_event" for="deskripsi_kategori_event" class="form-control <?= $validation->hasError('deskripsi_kategori_event') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('deskripsi_kategori_event'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi_kategori_event'); ?>
                        </div>
                    </div>
                </div>
                <button type='submit' class="btn btn-primary" href="/kategorievent/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>