<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data Renstra-PD 2022-2026</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/renstra2126/save" method="POST" enctype="multipart/form-data">
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
                        <label for="t22"><b>Target 2022</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="t22" name="t22" for="t22" class="form-control <?= $validation->hasError('t22') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t22'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('t22'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="r22"><b>Realisasi 2022</b></label><input id="r22" name="r22" for="r22" class="form-control <?= $validation->hasError('r22') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('r22'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('r22'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="t23"><b>Target 2023</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="t23" name="t23" for="t23" class="form-control <?= $validation->hasError('t23') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t23'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('t23'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="r23"><b>Realisasi 2023</b></label><input id="r23" name="r23" for="r23" class="form-control <?= $validation->hasError('r23') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('r23'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('r23'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="t24"><b>Target 2024</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="t24" name="t24" for="t24" class="form-control <?= $validation->hasError('t24') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t24'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('t24'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="r24"><b>Realisasi 2024</b></label><input id="r24" name="r24" for="r24" class="form-control <?= $validation->hasError('r24') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('r24'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('r24'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="t25"><b>Target 2025</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-250" style="color: grey;"><b>Wajib</b></span><input id="t25" name="t25" for="t25" class="form-control <?= $validation->hasError('t25') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t25'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('t25'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="r25"><b>Realisasi 2025</b></label><input id="r25" name="r25" for="r25" class="form-control <?= $validation->hasError('r25') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('r25'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('r25'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="t26"><b>Target 2026</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="t26" name="t26" for="t26" class="form-control <?= $validation->hasError('t26') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('t26'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('t26'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="r26"><b>Realisasi 2026</b></label><input id="r26" name="r26" for="r26" class="form-control <?= $validation->hasError('r26') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('r26'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('r26'); ?>
                        </div>
                    </div>
                </div>

                <button type='submit' class="btn btn-primary" href="/renstra2126/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>