<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Edit Data RPJMD 2016-2021</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/kolaboratif/update/<?= $id_kolaboratif?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="row mb-3">
                    <div class="col">
                        <label for="id_kode_rekening"><b>PD</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select class="form-control <?= $validation->hasError('id_kode_rekening') ? 'is-invalid' : ''; ?>" id="id_kode_rekening" name="id_kode_rekening" >
                            <?php foreach ($rekening as $r) : ?>
                                <?php if ($kode_rekening == $r['id_kode_rekening']) : ?>
                                    <option value="<?= $r['id_kode_rekening'] ?>" selected>
                                        <?= $r['kode_rekening'] ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php foreach ($rekening as $r) : ?>
                                <?php if ($kode_rekening != $r['id_kode_rekening']) : ?>
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
                        <label for="id_pd"><b>PD</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select class="form-control <?= $validation->hasError('id_pd') ? 'is-invalid' : ''; ?>" id="id_pd" name="id_pd" >
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
                        <label for="id_jenis_program"><b>jenis Program</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select class="form-control <?= $validation->hasError('id_jenis_program') ? 'is-invalid' : ''; ?>" id="id_jenis_program" name="id_jenis_program">
                            <?php foreach ($jenis_program as $js) : ?>
                                <?php if ($id_jenis_program == $js['id_jenis_program']) : ?>
                                    <option value="<?= $js['id_jenis_program'] ?>" selected>
                                        <?=$js['jenis_program'].'-'. $js['tahun_program']; ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php foreach ($jenis_program as $js) : ?>
                                <?php if ($id_jenis_program != $js['id_jenis_program']) : ?>
                                    <option value="<?= $js['id_jenis_program'] ?>">
                                        <?= $js['jenis_program'].'-'. $js['tahun_program'];  ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_jenis_program'); ?>
                        </div>
                    </div>
                    </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_program"><b>nama_program</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="nama_program" name="nama_program" for="nama_program" class="form-control <?= $validation->hasError('nama_program') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= $nama_program ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_program'); ?>
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
                        <label for="kecamatan"><b>kecamatan</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select class="form-control <?= $validation->hasError('kecamatan') ? 'is-invalid' : ''; ?>" id="kecamatan" name="kecamatan">
                            <?php foreach ($kecamatan as $kec) : ?>
                                <?php if ($id_kecamatan == $kec['id_kecamatan']) : ?>
                                    <option value="<?= $kec['id_kecamatan'] ?>" selected>
                                    <?= $kec['kecamatan'] ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php foreach ($kecamatan as $kec) : ?>
                                <?php if ($id_kecamatan != $kec['id_kecamatan']) : ?>
                                    <option value="<?= $kec['id_kecamatan'] ?>">
                                    <?= $kec['kecamatan'] ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('kecamatan'); ?>
                        </div>
                    </div>
                <div class="col">
                        <label for="desa"><b>desa</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select class="form-control <?= $validation->hasError('desa') ? 'is-invalid' : ''; ?>" id="desa" name="desa">
                            <?php foreach ($desa as $des) : ?>
                                <?php if ($id_desa == $des['id_desa']) : ?>
                                    <option value="<?= $des['id_desa'] ?>" selected>
                                    <?= $des['desa'] ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php foreach ($desa as $des) : ?>
                                <?php if ($id_desa != $des['id_desa']) : ?>
                                    <option value="<?= $des['id_desa'] ?>">
                                    <?= $des['desa'] ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('desa'); ?>
                        </div>
                    </div>
                        <div class="col">
                        <label for="alamat"><b>Alamat</b></label>
                        <input id="alamat" name="alamat" for="alamat" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= $alamat ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                   
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sumber_pendanaan"><b>Sumber Dana</b></label>
                        <input id="sumber_pendanaan" name="sumber_pendanaan" for="sumber_pendanaan" class="form-control <?= $validation->hasError('sumber_pendanaan') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= $sumber_pendanaan ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('sumber_pendanaan'); ?>
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
                        <label for="progres"><b>progres</b></label>
                        <input id="progres" name="progres" for="progres" class="form-control <?= $validation->hasError('progres') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= $progres ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('progres'); ?>
                        </div>
                    </div>
                </div>
                <button type='submit' class="btn btn-primary" href="">update Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>