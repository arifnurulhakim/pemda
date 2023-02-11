<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data RPJMD</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/wisata/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_wisata"><b>Misi</b></label><input id="nama_wisata" name="nama_wisata" for="nama_wisata" class="form-control <?= $validation->hasError('nama_wisata') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('nama_wisata'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_wisata'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alamat_wisata"><b>Indikator Kinerja Daerah</b></label><input id="alamat_wisata" name="alamat_wisata" for="alamat_wisata" class="form-control <?= $validation->hasError('alamat_wisata') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('alamat_wisata'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_wisata'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="id_kategori_wisata"><b>Satuan</b></label>
                        <select class="form-control <?= $validation->hasError('id_kategori_wisata') ? 'is-invalid' : ''; ?>" id="id_kategori_wisata" name="id_kategori_wisata">

                            <option value="">- Pilih Satuan -</option>
                            <?php foreach ($kategori_wisata as $kw) : ?>
                                <option value="<?= $kw['id_kategori_wisata']; ?>" id="id_kategori_wisata" <?= old('id_kategori_wisata') == $kw['id_kategori_wisata'] ? 'selected' : ''; ?>>
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
                        <label for="alamat_wisata"><b>Target 2017</b></label><input id="alamat_wisata" name="alamat_wisata" for="alamat_wisata" class="form-control <?= $validation->hasError('alamat_wisata') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('alamat_wisata'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_wisata'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="alamat_wisata"><b>Target 2018</b></label><input id="alamat_wisata" name="alamat_wisata" for="alamat_wisata" class="form-control <?= $validation->hasError('alamat_wisata') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('alamat_wisata'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_wisata'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alamat_wisata"><b>Target 2019</b></label><input id="alamat_wisata" name="alamat_wisata" for="alamat_wisata" class="form-control <?= $validation->hasError('alamat_wisata') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('alamat_wisata'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_wisata'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alamat_wisata"><b>Target 2020</b></label><input id="alamat_wisata" name="alamat_wisata" for="alamat_wisata" class="form-control <?= $validation->hasError('alamat_wisata') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('alamat_wisata'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_wisata'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alamat_wisata"><b>Realisasi 2017</b></label><input id="alamat_wisata" name="alamat_wisata" for="alamat_wisata" class="form-control <?= $validation->hasError('alamat_wisata') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('alamat_wisata'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_wisata'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alamat_wisata"><b>Realisasi 2018</b></label><input id="alamat_wisata" name="alamat_wisata" for="alamat_wisata" class="form-control <?= $validation->hasError('alamat_wisata') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('alamat_wisata'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_wisata'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="alamat_wisata"><b>Realisasi 2019</b></label><input id="alamat_wisata" name="alamat_wisata" for="alamat_wisata" class="form-control <?= $validation->hasError('alamat_wisata') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('alamat_wisata'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_wisata'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="alamat_wisata"><b>Realisasi 2020</b></label><input id="alamat_wisata" name="alamat_wisata" for="alamat_wisata" class="form-control <?= $validation->hasError('alamat_wisata') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('alamat_wisata'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_wisata'); ?>
                        </div>
                    </div>
                </div>

                <button type='submit' class="btn btn-primary" href="/wisata/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>