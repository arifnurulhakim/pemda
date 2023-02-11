<?= $this->extend('templates/masterData/masterData'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data IKU/IKD 2021-2026</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/ikudanikd2126/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_indikator"><b>Nama Indikator</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="nama_indikator" name="nama_indikator" for="nama_indikator" class="form-control <?= $validation->hasError('nama_indikator') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('nama_indikator'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_indikator'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="jenis_indikator"><b>Jenis Indikator</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span>
                        <select class="form-control <?= $validation->hasError('jenis_indikator') ? 'is-invalid' : ''; ?>" id="jenis_indikator" name="jenis_indikator">

                            <option value="">- Pilih Jenis Indikator -</option>

                            <option value="IKD" id="jenis_indikator">
                                IKD
                            </option>
                            <option value="IKU" id="jenis_indikator">
                                IKU
                            </option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jenis_indikator'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="id_satuan"><b>Satuan</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span>
                        <input type="text" style="width: 100%; background: #ffff;" name="nama_satuan" id="nama_satuan" onclick="myFunction()" class="form-control " placeholder="-Pilih Satuan-" readonly style="width:200px" />
                        <input type="hidden" name="id_satuan" id="id_satuan" class="form-control <?= $validation->hasError('id_satuan') ? 'is-invalid' : ''; ?>" />
                        <div id="myDropdown" class="dropdown-content" style="height: 200px; width: 300px; overflow-y: scroll;">
                            <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                            <a onclick="empty()">-Pilih Satuan-</a>
                            <!-- ni untuk selectnya, boleh disesuaikan dengan kaurang punya, saya disini pakai mysqli_fetch_array dan kau rang beda, jadi sesuaikan aja -->
                            <?php foreach ($satuan as $st) : ?>
                                <a onclick="autofill_choose('<?= $st['id_satuan']; ?>','<?= $st['nama_satuan']; ?>')">
                                    <?= $st['nama_satuan']; ?>
                                </a>

                            <?php endforeach; ?>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_satuan'); ?>
                        </div>
                    </div>
                </div>



                <button type='submit' class="btn btn-primary" href="/ikudanikd2126/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>