<?= $this->extend('templates/kolaboratif/kolaboratif'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data Sanitasi dan Penyehatan Lingkungan</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/ikudanikd1621/update/<?= $result['id_ikudanikd1621']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $result['slug']; ?>" name="slug">
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_indikator"><b>Nama Indikator</b></label><input id="nama_indikator" name="nama_indikator" for="nama_indikator" class="form-control <?= $validation->hasError('nama_indikator') ? 'is-invalid' : ''; ?>" type="text" placeholder="" value="<?= old('nama_indikator', $result['nama_indikator']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_indikator'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="jenis_indikator"><b>Jenis Indikator</b></label>
                        <select class="form-control <?= $validation->hasError('jenis_indikator', $result['jenis_indikator']) ? 'is-invalid' : ''; ?>" id="jenis_indikator" name="jenis_indikator">

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
                        <label for="id_satuan"><b>Satuan</b></label>
                        <select class="form-control <?= $validation->hasError('id_satuan', $result['id_satuan']) ? 'is-invalid' : ''; ?>" id="id_satuan" name="id_satuan">

                            <option value="">- Pilih Satuan -</option>
                            <?php foreach ($satuan as $st) : ?>
                                <option value="<?= $st['id_satuan']; ?>" id="id_satuan" <?= old('id_satuan') == $st['id_satuan'] ? 'selected' : ''; ?>>
                                    <?= $st['nama_satuan']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_satuan'); ?>
                        </div>
                    </div>
                </div>


                <button type='submit' class="btn btn-primary" href="/ikudanikd1621/edit">Ubah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>