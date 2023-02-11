    <?= $this->extend('templates/masterData/masterData'); ?>
    <?= $this->section('page-content'); ?>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-700"><b>Edit Data Publikasi</b></h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="/publikasi/update/<?= $result['id_publikasi']; ?>" method="POST"
                    enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" value="<?= $result['slug']; ?>" name="slug">
                    <input type="hidden" name="filePublikasiLama" value="<?= $result['file_publikasi']; ?>">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nama_file"><b>Nama File</b></label></label>&nbsp;&nbsp;<span
                                class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input
                                id="nama_file" name="nama_file" for="nama_file"
                                class="form-control <?= $validation->hasError('nama_file') ? 'is-invalid' : ''; ?>"
                                type="text" placeholder="" value="<?= old('nama_file', $result['nama_file']); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_file'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="custom-file">
                                <input type="file"
                                    class="custom-file-input <?= $validation->hasError('file_publikasi') ? 'is-invalid' : ''; ?>"
                                    id="file_publikasi" value="file_publikasi" name="file_publikasi"
                                    onchange="previewFilePublikasiEdit()">
                                <div class="invalid-feedback">
                                    <?= $validation-> getError('file_publikasi'); ?>
                                </div>
                                <label class="custom-file-label" for="customFile">Upload File&nbsp;<span
                                        class="badge badge-light bg-gray-200"
                                        style="color: grey;"><b>Wajib</b></span></label>
                            </div>
                        </div>
                        <div class="col">
                            <a href="<?= base_url('file/publikasi/'. $result['file_publikasi']); ?>"
                                target="_blank"><?= $result['file_publikasi']; ?></a>
                        </div>
                    </div>
                    <button type='submit' class="btn btn-primary" href="/publikasi/edit">Update Data</button>
                    <button class="btn btn-danger" type="reset">Batal</button>
                </form>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>