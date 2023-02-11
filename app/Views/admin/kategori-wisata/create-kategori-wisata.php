<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data Kategori Wisata</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/kategoriwisata/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_kategori_wisata"><b>Nama Kategori</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="nama_kategori_wisata" name="nama_kategori_wisata" for="nama_kategori_wisata" class="form-control <?= $validation->hasError('nama_kategori_wisata') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('nama_kategori_wisata'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_kategori_wisata'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi_kategori_wisata"><b>Deskripsi</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="deskripsi_kategori_wisata" name="deskripsi_kategori_wisata" for="deskripsi_kategori_wisata" class="form-control <?= $validation->hasError('deskripsi_kategori_wisata') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('deskripsi_kategori_wisata'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi_kategori_wisata'); ?>
                        </div>
                    </div>
                </div>
                <button type='submit' class="btn btn-primary" href="/kategoriwisata/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>