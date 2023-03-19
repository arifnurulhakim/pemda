<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data RPJMD 2016-2021</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/rpjmd1621/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="id_misi"><b>Misi</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select class="form-control <?= $validation->hasError('id_misi') ? 'is-invalid' : ''; ?>" id="id_misi" name="id_misi">

                            <option value="">- Pilih Misi -</option>
                            <?php foreach ($misi as $ms) : ?>
                                <option value="<?= $ms['id_misi']; ?>" id="id_misi" <?= old('id_misi') == $ms['id_misi'] ? 'selected' : ''; ?>>
                                    <?= $ms['nama_misi']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_misi'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                    
                        <label for="id_ikudanikd1621"><b>IKU / IKD</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                            <!-- tambahkan input teks untuk pencarian -->

                            <!-- tambahkan daftar item -->
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="search-box" placeholder="Cari indikator...">
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control <?= $validation->hasError('id_ikudanikd1621') ? 'is-invalid' : ''; ?>" id="id_ikudanikd1621" name="id_ikudanikd1621">
                                    <?php foreach ($ikudanikd1621 as $ikudanikd1621_1) : ?>
                                        
                                        <option value="<?= $ikudanikd1621_1['id_ikudanikd1621'] ?>" selected>
                                            <?= $ikudanikd1621_1['nama_indikator'] ?>
                                        </option>
                                       
                                    <?php endforeach; ?>
                                    <?php foreach ($ikudanikd1621 as $ikudanikd1621_1) : ?>
                                        <option value="<?= $ikudanikd1621_1['id_ikudanikd1621'] ?>">
                                            <?= $ikudanikd1621_1['nama_indikator']  ?>
                                        </option>
                                         <?php endforeach; ?>
                                    </select>
                                </div>
                                </div>

                        <div class="invalid-feedback">
                            <?= $validation->getError('id_ikudanikd1621'); ?>
                        </div>
                    </div>
                </div>




                <div class="row mb-3">
                    <div class="col">
                        <label for="t17"><b>Target 2017</b></label></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="t17" name="t17" for="t17" class="form-control <?= $validation->hasError('t17') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t17'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('t17'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="r17"><b>Realisasi 2017</b></label><input id="r17" name="r17" for="r17" class="form-control <?= $validation->hasError('r17') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('r17'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('r17'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="t18"><b>Target 2018</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label><input id="t18" name="t18" for="t18" class="form-control <?= $validation->hasError('t18') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t18'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('t18'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="r18"><b>Realisasi 2018</b></label><input id="r18" name="r18" for="r18" class="form-control <?= $validation->hasError('r18') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('r18'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('r18'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="t19"><b>Target 2019</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label><input id="t19" name="t19" for="t19" class="form-control <?= $validation->hasError('t19') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t19'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('t19'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="r19"><b>Realisasi 2019</b></label><input id="r19" name="r19" for="r19" class="form-control <?= $validation->hasError('r19') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('r19'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('r19'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="t20"><b>Target 2020</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label><input id="t20" name="t20" for="t20" class="form-control <?= $validation->hasError('t20') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t20'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('t20'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="r20"><b>Realisasi 2020</b></label><input id="r20" name="r20" for="r20" class="form-control <?= $validation->hasError('r20') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('r20'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('r20'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="t21"><b>Target 2021</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label><input id="t21" name="t21" for="t21" class="form-control <?= $validation->hasError('t21') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t21'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('t21'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="r21"><b>Realisasi 2021</b></label><input id="r21" name="r21" for="r21" class="form-control <?= $validation->hasError('r21') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('r21'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('r21'); ?>
                        </div>
                    </div>
                </div>

                <button type='submit' class="btn btn-primary" href="/rpjmd1621/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>