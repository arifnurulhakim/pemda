<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data Kolaboratif</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="store" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="row mb-3">
                    <div class="col">
                        <label for="id_kode_rekening"><b>kode rekening</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select class="form-control <?= $validation->hasError('id_kode_rekening') ? 'is-invalid' : ''; ?>" id="id_kode_rekening" name="id_kode_rekening">

                            <option value="">- Pilih Kode Rekening -</option>
                            <?php foreach ($rekening as $rek) : ?>
                                <option value="<?= $rek['id_kode_rekening']; ?>" id="id_kode_rekening" <?= old('id_kode_rekening') == $rek['id_kode_rekening'] ? 'selected' : ''; ?>>
                                    <?= $rek['kode_rekening']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_kode_rekening'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="id_pd"><b>Nama PD</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select class="form-control <?= $validation->hasError('id_pd') ? 'is-invalid' : ''; ?>" id="id_pd" name="id_pd">
                        <option value="">- Pilih Nama PD -</option>
                        <?php foreach ($pd as $p) : ?>
                            <option value="<?= $p['id_pd']; ?>" <?= old('id_pd') == $p['id_pd'] ? 'selected' : ''; ?>>
                            <?= $p['nama_pd']; ?>
                            </option>
                        <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                        <?= $validation->getError('id_pd'); ?>
                        </div>
                    </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="id_satuan"><b>Satuan</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                            <select class="form-control <?= $validation->hasError('id_satuan') ? 'is-invalid' : ''; ?>" id="id_satuan" name="id_satuan">
                                <option value="">- Pilih Satuan -</option>
                                <?php foreach ($satuan as $stn) : ?>
                                    <option value="<?= $stn['id_satuan']; ?>" id="id_satuan" <?= old('id_satuan') == $stn['id_satuan'] ? 'selected' : ''; ?>>
                                        <?= $stn['nama_satuan']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_satuan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="id_jenis_program"><b>Jenis Program</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                            <select class="form-control <?= $validation->hasError('id_jenis_program') ? 'is-invalid' : ''; ?>" id="id_jenis_program" name="id_jenis_program">
                                <option value="">- Pilih jenis Program -</option>
                                <?php foreach ($jenis_program as $jp) : ?>
                                    <option value="<?= $jp['id_jenis_program']; ?>" id="id_jenis_program" <?= old('id_jenis_program') == $jp['id_jenis_program'] ? 'selected' : ''; ?>>
                                        <?= $jp['jenis_program'].'-'. $jp['tahun_program']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_jenis_program'); ?>
                            </div>
                        </div>
                    </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_program"><b>Nama Program</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="nama_program" name="nama_program" for="nama_program" class="form-control <?= $validation->hasError('nama_program') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('nama_program'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_program'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="indikator"><b>Indikator</b></label><input id="indikator" name="indikator" for="indikator" class="form-control <?= $validation->hasError('indikator') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('indikator'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('indikator'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="target"><b>Target</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span>
                        <input id="target" name="target" for="target" class="form-control <?= $validation->hasError('target') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('target'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('target'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                <div class="col">
                        <label for="id_kecamatan"><b>Kecamatan</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span>
                        <select name="kecamatan" id="kecamatan" class="form-control <?= $validation->hasError('id_kecamatan') ? 'is-invalid' : ''; ?>">
                            <option value="0" selected disabled>-Pilih Kecamatan-</option>
                            <?php foreach ($kecamatan as $kec) :?>
                                <option value="<?=$kec['id_kecamatan']; ?>" rel="<?=$kec['id_kecamatan']; ?>"><?=$kec['kecamatan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!-- <input id="id_kecamatan" name="id_kecamatan" for="id_kecamatan" class="form-control <?= $validation->hasError('id_kecamatan') ? 'is-invalid' : ''; ?>" type="text" placeholder="-Pilih Kecamatan-" value="<?= old('id_kecamatan'); ?>"> -->
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_kecamatan'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="id_desa"><b>Desa</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span>
                        <select name="desa" id="desa" class="form-control <?= $validation->hasError('id_desa') ? 'is-invalid' : ''; ?>">
                            <option value="0" selected disabled>-Pilih Kecamatan Dahulu-</option>
                            <?php foreach ($desa as $des) :?>
                                <option value="<?=$des['id_desa'];?>" class="<?=$des['id_kecamatan']?>" ><?=$des['desa']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!-- <input id="id_desa" name="id_desa" for="id_desa" class="form-control <?= $validation->hasError('id_desa') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('id_desa'); ?>"> -->
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_desa'); ?>
                        </div>
                    </div>
>
                    <div class="col">
                        <label for="alamat"><b>alamat</b></label>
                        <input id="alamat" name="alamat" for="alamat" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('alamat'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                   
                </div>
                <div class="row mb-3">
                <div class="col">
                        <label for="sumber_pendanaan"><b>Sumber Dana</b></label>
                        <input id="sumber_pendanaan" name="sumber_pendanaan" for="sumber_pendanaan" class="form-control <?= $validation->hasError('sumber_pendanaan') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('sumber_pendanaan'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('sumber_pendanaan'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="pagu"><b>pagu</b></label>
                        <input id="pagu" name="pagu" for="pagu" class="form-control <?= $validation->hasError('pagu') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('pagu'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('pagu'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="progres"><b>progres</b></label>
                        <input id="progres" name="progres" for="progres" class="form-control <?= $validation->hasError('progres') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('progres'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('progres'); ?>
                        </div>
                    </div>
                </div>
                <button type='submit' class="btn btn-primary" href="">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
        var $kecamatan = $('select[name=kecamatan'),
        $desa = $('select[name=desa]');
        $desa.find("option").hide();

        $kecamatan.change(function(){
            var $this = $(this).find(':selected'),
            rel = $this.attr('rel');

            // Hide semua
            $desa.find("option").hide();

            $set = $desa.find('option.' + rel);
            $set.show().first().prop('selected', true);
        });
    });
</script>


<?= $this->endSection(); ?>