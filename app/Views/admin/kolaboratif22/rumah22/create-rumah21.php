<?= $this->extend('templates/kolaboratif/kolaboratif'); ?>
<?= $this->section('page-content'); ?>

<?php

$con = mysqli_connect('localhost', 'root', '', 'dbpemda') or die(mysqli_error($con));
if (!$con) {
    echo "Koneksi Gagal!";
}
?>

<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data Sanitasi dan Penyehatan Lingkungan</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/sanitasi/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="id_kode_rekening"><b>Kode Rekening</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span>
                        <input type="text" style="width: 100%; background: #ffff;" name="kode_rekening" id="kode_rekening" onclick="myFunction_kr()" class="form-control " placeholder="-Pilih Kode Rekening-" readonly style="width:200px" />
                        <input type="hidden" name="id_kode_rekening" id="id_kode_rekening" class="form-control <?= $validation->hasError('id_kode_rekening') ? 'is-invalid' : ''; ?>" />
                        <div id="myDropdownKr" class="dropdown-content" style="height: 200px; width: 1200px; overflow-y: scroll;">
                            <input type="text" placeholder="Search.." id="myInputKr" onkeyup="filterFunction_kr()">
                            <a id="KR" onclick="empty_kr()">-Pilih Kode Rekening-</a>
                            <!-- ni untuk selectnya, boleh disesuaikan dengan kaurang punya, saya disini pakai mysqli_fetch_array dan kau rang beda, jadi sesuaikan aja -->
                            <?php foreach ($kode_rekening as $kr) : ?>
                                <a onclick="autofill_choose_kr('<?= $kr['id_kode_rekening']; ?>','<?= $kr['kode_rekening']; ?>')">
                                    <?= $kr['kode_rekening'], '    -    ', $kr['program']; ?>
                                </a>

                            <?php endforeach; ?>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_kode_rekening'); ?>
                        </div>
                    </div>
                </div>
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

                    <div class="col">
                        <label for="id_kecamatan"><b>Kecamatan</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="id_kecamatan" name="id_kecamatan" for="id_kecamatan" class="form-control <?= $validation->hasError('id_kecamatan') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('id_kecamatan'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_kecamatan'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="id_desa"><b>Desa</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="id_desa" name="id_desa" for="id_desa" class="form-control <?= $validation->hasError('id_desa') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('id_desa'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_desa'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="alamat"><b>Alamat</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="alamat" name="alamat" for="alamat" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('alamat'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="program"><b>Program </b></label></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="program" name="program" for="program" class="form-control <?= $validation->hasError('program') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('program'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('program'); ?>
                        </div>
                    </div>
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
                        <label for="indikator_program"><b>Indikator Program/Kegiatan/Sub Kegiatan</b></label></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="indikator_program" name="indikator_program" for="indikator_program" class="form-control <?= $validation->hasError('indikator_program') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('indikator_program'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('indikator_program'); ?>
                        </div>
                    </div>

                    <div class="col">
                        <label for="sumber_pendanaan"><b>Sumber Pendanaan</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="sumber_pendanaan" name="sumber_pendanaan" for="sumber_pendanaan" class="form-control <?= $validation->hasError('sumber_pendanaan') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('sumber_pendanaan'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('sumber_pendanaan'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">

                </div>

                <div class="row mb-3">

                    <div class="col">
                        <label for="pagu"><b>Pagu(Rp.)</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="pagu" name="pagu" for="pagu" class="form-control <?= $validation->hasError('pagu') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('pagu'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('pagu'); ?>
                        </div>
                    </div>

                    <div class="col">
                        <label for="target"><b>Target</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="target" name="target" for="target" class="form-control <?= $validation->hasError('target') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('target'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('target'); ?>
                        </div>
                    </div>

                    <div class="col">
                        <label for="progres"><b>Realisasi </b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="progres" name="progres" for="progres" class="form-control <?= $validation->hasError('progres') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('progres'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('progres'); ?>
                        </div>
                    </div>
                </div>



                <button type='submit' class="btn btn-primary" href="/sanitasi/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>