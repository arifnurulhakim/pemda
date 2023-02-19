<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data RPJMD 2016-2021</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/rkpd/edit/<?= $id_rkpd?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="row mb-3">
                    <div class="col">
                        <label for="id_kode_rekening"><b>Kode Rekening</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select class="form-control <?= $validation->hasError('id_kode_rekening') ? 'is-invalid' : ''; ?>" id="id_kode_rekening" name="id_kode_rekening" >
                            <?php foreach ($kode_rekening as $r) : ?>
                                <?php if ($id_kode_rekening == $r['id_kode_rekening']) : ?>
                                    <option value="<?= $r['id_kode_rekening'] ?>" selected>
                                        <?= $r['kode_rekening'] ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php foreach ($kode_rekening as $r) : ?>
                                <?php if ($id_kode_rekening != $r['id_kode_rekening']) : ?>
                                    <option value="<?= $r['id_kode_rekening'] ?>">
                                        <?= $r['kode_rekening'] ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                        <?= $validation->getError('id_kode_rekening'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="id_pd"><b>ID PD</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select class="form-control <?= $validation->hasError('id_pd') ? 'is-invalid' : ''; ?>" id="id_pd" name="id_pd">
                            <?php foreach ($pd as $p) : ?>
                                <?php if ($id_pd == $p['id_pd']) : ?>
                                    <option value="<?= $p['id_pd'] ?>" selected>
                                        <?= $p['nama_pd'] ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php foreach ($pd as $p) : ?>
                                <?php if ($id_pd != $p['id_pd']) : ?>
                                    <option value="<?= $p['id_pd'] ?>">
                                        <?= $p['nama_pd'] ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_pd'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="id_satuan"><b>satuan</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select class="form-control <?= $validation->hasError('id_satuan') ? 'is-invalid' : ''; ?>" id="id_satuan" name="id_satuan">
                            <?php foreach ($satuan as $s) : ?>
                                <?php if ($id_satuan == $s['id_satuan']) : ?>
                                    <option value="<?= $s['id_satuan'] ?>" selected>
                                        <?= $s['nama_satuan'] ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php foreach ($satuan as $s) : ?>
                                <?php if ($id_satuan != $s['id_satuan']) : ?>
                                    <option value="<?= $s['id_satuan'] ?>">
                                        <?= $s['nama_satuan'] ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_satuan'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="program"><b>Program</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="program" name="program" for="program" class="form-control <?= $validation->hasError('program') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= $program ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('program'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="indikator"><b>Indikator</b></label><input id="indikator" name="indikator" for="indikator" class="form-control <?= $validation->hasError('indikator') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= $indikator?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('indikator'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="target"><b>Target</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span>
                        <input id="target" name="target" for="target" class="form-control <?= $validation->hasError('target') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= $target?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('target'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="id_kab"><b>id_kab</b></label>
                        <input id="id_kab" name="id_kab" for="id_kab" class="form-control <?= $validation->hasError('id_kab') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= $id_kab ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_kab'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="pagu"><b>pagu</b></label>
                        <input id="pagu" name="pagu" for="pagu" class="form-control <?= $validation->hasError('pagu') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= $pagu ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('pagu'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="sumber_dana"><b>Sumber Dana</b></label>
                        <input id="sumber_dana" name="sumber_dana" for="sumber_dana" class="form-control <?= $validation->hasError('sumber_dana') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= $sumber_dana ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('sumber_dana'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="prioritas_nasional"><b>prioritas_nasional</b></label>
                        <input id="prioritas_nasional" name="prioritas_nasional" for="prioritas_nasional" class="form-control <?= $validation->hasError('prioritas_nasional') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= $prioritas_nasional ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('prioritas_nasional'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="prioritas_daerah"><b>prioritas_daerah</b></label>
                        <input id="prioritas_daerah" name="prioritas_daerah" for="prioritas_daerah" class="form-control <?= $validation->hasError('prioritas_daerah') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= $prioritas_daerah ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('prioritas_daerah'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="kelompok_sasaran"><b>kelompok_sasaran</b></label>
                        <input id="kelompok_sasaran" name="kelompok_sasaran" for="kelompok_sasaran" class="form-control <?= $validation->hasError('kelompok_sasaran') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= $kelompok_sasaran ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kelompok_sasaran'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="tahun_rkpd"><b>tahun</b></label>
                        <input id="tahun_rkpd" name="tahun_rkpd" for="tahun_rkpd" class="form-control <?= $validation->hasError('tahun_rkpd') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= $tahun_rkpd ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tahun_rkpd'); ?>
                        </div>
                    </div>
                </div>



                <button type='submit' class="btn btn-primary" href="/rkpd/update">edit Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>