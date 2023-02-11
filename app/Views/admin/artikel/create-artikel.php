<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Artikel</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/artikel/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="judul_artikel"><b>Judul Artikel</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="judul_artikel" name="judul_artikel" for="judul_artikel" class="form-control <?= $validation->hasError('judul_artikel') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('judul_artikel'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul_artikel'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="isi_artikel"><b>Isi Artikel</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><textarea class="form-control summernote <?= $validation->hasError('isi_artikel') ? 'is-invalid' : ''; ?>" id="isi_artikel" name="isi_artikel" for='isi_artikel' rows="3" value="<?= old('isi_artikel'); ?>"><?= old('isi_artikel'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('isi_artikel'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="tgl_artikel"><b>Tanggal Upload</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="tgl_artikel" name="tgl_artikel" for="tgl_artikel" class="form-control <?= $validation->hasError('tgl_artikel') ? 'is-invalid' : ''; ?>" type="date" placeholder="" value="<?= old('tgl_artikel'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_artikel'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= $validation->hasError('gambar_artikel') ? 'is-invalid' : ''; ?>" id="gambar_artikel" value="gambar_artikel" name="gambar_artikel" onchange="previewImgArtikel()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar_artikel'); ?>
                            </div>

                            <label class="custom-file-label" for="customFile"> Upload Gambar &nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p>Preview Gambar<br>
                            <img id="imgPreview" width="200px" src="/img/artikel/default.jpg" class="img-thumbnail img-preview">
                        </p>
                    </div>
                </div>
                <button type='submit' class="btn btn-primary" href="/artikel/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>