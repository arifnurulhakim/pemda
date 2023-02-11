<?= $this->extend('templates/masterData/masterData'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Edit Data Galeri</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/galeri/update/<?= $result['id_galeri']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $result['slug']; ?>" name="slug">
                <input type="hidden" name="gambarGaleriLama" value="<?= $result['gambar_galeri']; ?>">
                <div class="col">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nama_gambar"><b>Nama Kegiatan</b></label>&nbsp;&nbsp;<span
                                class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input
                                id="nama_gambar" name="nama_gambar" for="nama_gambar"
                                class="form-control <?= $validation->hasError('nama_gambar') ? 'is-invalid' : ''; ?>"
                                type="text" placeholder="" value="<?= old('nama_gambar', $result['nama_gambar']); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_gambar'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="custom-file">
                                <input type="file"
                                    class="custom-file-input <?= $validation->hasError('gambar_galeri') ? 'is-invalid' : ''; ?>"
                                    id="gambar_galeri" name="gambar_galeri" onchange="previewImgGaleri()">
                                <div class="invalid-feedback">
                                    <?= $validation-> getError('gambar_galeri'); ?>
                                </div>
                                <label class="custom-file-label"
                                    for="customFile"><?= $result['gambar_galeri']; ?>&nbsp;<span
                                        class="badge badge-light bg-gray-200"
                                        style="color: grey;"><b>Wajib</b></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <p>Preview Gambar<br>
                                <img id="imgPreviewGaleri" width="200px"
                                    src="/img/galeri/<?= $result['gambar_galeri']; ?>"
                                    class="img-thumbnail img-preview-galeri">
                            </p>
                        </div>
                    </div>
                    <button type='submit' class="btn btn-primary" href="/galeri/edit">Update Data</button>
                    <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>