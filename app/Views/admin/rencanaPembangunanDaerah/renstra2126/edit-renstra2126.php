<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Edit Data Wisata</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/wisata/update/<?= $result['id_wisata']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" value="<?= $result['slug']; ?>" name="slug">
                <input type="hidden" name="gambarWisataLama" value="<?= $result['gambar_wisata']; ?>">
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_wisata"><b>Nama Wisata</b></label><input id="nama_wisata" name="nama_wisata" for="nama_wisata" class="form-control <?= $validation->hasError('nama_wisata') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('nama_wisata', $result['nama_wisata']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_wisata'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alamat_wisata"><b>Alamat</b></label><textarea class="form-control <?= $validation->hasError('alamat_wisata') ? 'is-invalid' : ''; ?>" id="alamat_wisata" name="alamat_wisata" for='alamat_wisata' rows="3" value="<?= old('alamat_wisata'); ?>"><?= $result['alamat_wisata']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_wisata'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi_wisata"><b>Deskripsi</b></label><textarea class="form-control summernote <?= $validation->hasError('deskripsi_wisata') ? 'is-invalid' : ''; ?>" id="deskripsi_wisata" name="deskripsi_wisata" for='deskripsi_wisata' rows="3" value="<?= old('deskripsi_wisata'); ?>"><?= $result['deskripsi_wisata']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi_wisata'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="id_kategori_wisata"><b>Kategori</b></label>
                        <select class="form-control <?= $validation->hasError('id_kategori_wisata') ? 'is-invalid' : ''; ?>" id="id_kategori_wisata" name="id_kategori_wisata">

                            <option value="">- Pilih Kategori Wisata -</option>
                            <?php foreach ($kategori_wisata as $kw) : ?>
                                <option value="<?= $kw['id_kategori_wisata']; ?>" id="id_kategori_wisata" <?= old('id_kategori_wisata', $result['id_kategori_wisata']) == $kw['id_kategori_wisata'] ? 'selected' : ''; ?>>
                                    <?= $kw['nama_kategori_wisata']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_kategori_wisata'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= $validation->hasError('gambar_wisata') ? 'is-invalid' : ''; ?>" id="gambar_wisata" value="gambar_wisata" name="gambar_wisata" onchange="previewImgWisata()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar_wisata'); ?>
                            </div>
                            <label class="custom-file-label" for="customFile"><?= $result['gambar_wisata']; ?></label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p>Preview Gambar<br>
                            <img id="imgPreview" width="200px" src="/img/wisata/<?= $result['gambar_wisata']; ?>" class="img-thumbnail img-preview">
                        </p>
                    </div>
                </div>

                <button type='submit' class="btn btn-primary" href="admin/wisata/edit">Update Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>