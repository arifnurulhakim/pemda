<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data Renstra-PD 2016-2021</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/renstra1621/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>



                <div class="row mb-3">
                    <div class="col">
                        <label for="id_pd"><b>Perangkat Daerah</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span>
                        <input type="text" style="width: 100%; background: #ffff;" name="nama_pd" id="nama_pd" onclick="myFunction()" class="form-control " placeholder="-Pilih Perangkat Daerah-" readonly style="width:200px" />
                        <input type="hidden" name="id_pd" id="id_pd" class="form-control <?= $validation->hasError('id_pd') ? 'is-invalid' : ''; ?>" />
                        <div id="myDropdownPD" class="dropdown-content" style="height: 200px; width: 300px; overflow-y: scroll;">
                            <input type="text" placeholder="Search.." id="myInputPD" onkeyup="filterFunction()">
                            <a id="PD" onclick="empty()">-Pilih Perangkat Daerah-</a>
                            <!-- ni untuk selectnya, boleh disesuaikan dengan kaurang punya, saya disini pakai mysqli_fetch_array dan kau rang beda, jadi sesuaikan aja -->
                            <?php foreach ($perangkatdaerah as $pd) : ?>
                                <a onclick="autofill_choose('<?= $pd['id_pd']; ?>','<?= $pd['nama_pd']; ?>')">
                                    <?= $pd['nama_pd']; ?>
                                </a>

                            <?php endforeach; ?>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_pd'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_indikator"><b>Indikator Renstra</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="nama_indikator" name="nama_indikator" for="nama_indikator" class="form-control <?= $validation->hasError('nama_indikator') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('nama_indikator'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_indikator'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="id_satuan"><b>Satuan</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span>
                        <input type="text" style="width: 100%; background: #ffff;" name="nama_satuan" id="nama_satuan" onclick="myFunction_st()" class="form-control " placeholder="-Pilih Satuan-" readonly style="width:200px" />
                        <input type="hidden" name="id_satuan" id="id_satuan" class="form-control <?= $validation->hasError('id_satuan') ? 'is-invalid' : ''; ?>" />
                        <div id="myDropdown" class="dropdown-content" style="height: 200px; width: 300px; overflow-y: scroll;">
                            <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction_st()">
                            <a onclick="empty_st()">-Pilih Satuan-</a>
                            <!-- ni untuk selectnya, boleh disesuaikan dengan kaurang punya, saya disini pakai mysqli_fetch_array dan kau rang beda, jadi sesuaikan aja -->
                            <?php foreach ($satuan as $st) : ?>
                                <a onclick="autofill_choose_st('<?= $st['id_satuan']; ?>','<?= $st['nama_satuan']; ?>')">
                                    <?= $st['nama_satuan']; ?>
                                </a>

                            <?php endforeach; ?>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_satuan'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="t17"><b>Target 2017</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="t17" name="t17" for="t17" class="form-control <?= $validation->hasError('t17') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t17'); ?>">
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
                        <label for="t18"><b>Target 2018</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="t18" name="t18" for="t18" class="form-control <?= $validation->hasError('t18') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t18'); ?>">
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
                        <label for="t19"><b>Target 2019</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="t19" name="t19" for="t19" class="form-control <?= $validation->hasError('t19') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t19'); ?>">
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
                        <label for="t20"><b>Target 2020</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="t20" name="t20" for="t20" class="form-control <?= $validation->hasError('t20') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t20'); ?>">
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
                        <label for="t21"><b>Target 2021</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="t21" name="t21" for="t21" class="form-control <?= $validation->hasError('t21') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t21'); ?>">
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

                <button type='submit' class="btn btn-primary" href="/renstra1621/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>