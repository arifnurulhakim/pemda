<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Event</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/event/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field();?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_event"><b>Nama Event</b>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><input id="nama_event" name="nama_event"
                            for="nama_event"
                            class="form-control <?= $validation->hasError('nama_event') ? 'is-invalid' : ''; ?>"
                            type="text" placeholder="" value="<?= old('nama_event'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('nama_event'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_penyelenggara"><b>Penyelenggara</b>&nbsp;&nbsp;<span
                                class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><input id="nama_penyelenggara"
                            name="nama_penyelenggara" for="nama_penyelenggara"
                            class="form-control <?= $validation->hasError('nama_penyelenggara') ? 'is-invalid' : ''; ?>"
                            type="text" placeholder="" value="<?= old('nama_penyelenggara'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('nama_penyelenggara'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="id_kategori_event"><b>Kategori</b>&nbsp;&nbsp;<span
                                class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select
                            class="form-control <?= $validation->hasError('id_kategori_event') ? 'is-invalid' : ''; ?>"
                            id="id_kategori_event" name="id_kategori_event">

                            <option value="">- Pilih Kategori Event -</option>
                            <?php foreach($kategori_event as $ke) : ?>
                            <option value="<?= $ke['id_kategori_event']; ?>" id="id_kategori_event"
                                <?= old('id_kategori_event') == $ke['id_kategori_event'] ? 'selected' : ''; ?>>
                                <?= $ke['nama_kategori_event']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation-> getError('id_kategori_event'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="lokasi_event"><b>Lokasi Event</b>&nbsp;&nbsp;<span
                                class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><input id="lokasi_event"
                            name="lokasi_event" for="lokasi_event"
                            class="form-control <?= $validation->hasError('lokasi_event') ? 'is-invalid' : ''; ?>"
                            type="text" placeholder="" value="<?= old('lokasi_event'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('lokasi_event'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="tgl_event_mulai"><b>Tanggal Mulai Event</b>&nbsp;&nbsp;<span
                                class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><input id="tgl_event_mulai"
                            name="tgl_event_mulai" for="tgl_event_mulai"
                            class="form-control <?= $validation->hasError('tgl_event_mulai') ? 'is-invalid' : ''; ?>"
                            type="date" placeholder="" value="<?= old('tgl_event_mulai'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('tgl_event_mulai'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="tgl_event_berakhir"><b>Tanggal Berakhir Event</b>&nbsp;&nbsp;<span
                                class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><input id="tgl_event_berakhir"
                            name="tgl_event_berakhir" for="tgl_event_berakhir"
                            class="form-control <?= $validation->hasError('tgl_event_berakhir') ? 'is-invalid' : ''; ?>"
                            type="date" placeholder="" value="<?= old('tgl_event_berakhir'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('tgl_event_berakhir'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi_event"><b>Deskripsi</b>&nbsp;&nbsp;<span
                                class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><textarea
                            class="form-control summernote <?= $validation->hasError('deskripsi_event') ? 'is-invalid' : ''; ?>"
                            id="deskripsi_event" name="deskripsi_event" for='deskripsi_event' rows="3"
                            value="<?= old('deskripsi_event'); ?>"><?= old('deskripsi_event'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation-> getError('deskripsi_event'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="custom-file">
                            <input type="file"
                                class="custom-file-input <?= $validation->hasError('gambar_event') ? 'is-invalid' : ''; ?>"
                                id="gambar_event" value="gambar_event" name="gambar_event" onchange="previewImgEvent()">
                            <div class="invalid-feedback">
                                <?= $validation-> getError('gambar_event'); ?>
                            </div>
                            <label class="custom-file-label" for="customFile">Upload Gambar&nbsp;<span
                                    class="badge badge-light bg-gray-200"
                                    style="color: grey;"><b>Wajib</b></span></label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p>Preview Gambar<br>
                            <img id="imgPreview" width="200px" src="/img/event/default.jpg"
                                class="img-thumbnail img-preview">
                        </p>
                    </div>
                </div>
                <button type='submit' class="btn btn-primary" href="/event/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>