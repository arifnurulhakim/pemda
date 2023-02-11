<?= $this->extend('views/front-templates/index'); ?>

<?= $this->section('content'); ?>
<div class="overlay">
    <div id="breadcrumb" class="hoc clear">
        <!-- ################################################################################################ -->
        <h6 class="heading heading-top">Event</h6>
        <br>
        <ul>
            <li class="heading-top">Event seputar Kota Baubau dan sekitarnya</li>
        </ul>
        <!-- ################################################################################################ -->
    </div>
</div>


<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->


        <form action="/view/savepengajuan" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label>Nama Event &nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <input id="nama_event" name="nama_event" for="nama_event" type="text" placeholder="" value="<?= old('nama_event'); ?>" class="form-control <?= $validation->hasError('nama_event') ? 'is-invalid' : ''; ?>" placeholder="Masukan Nama Event" required autofocus>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label>Penyelenggara Event&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <input id="nama_penyelenggara" name="nama_penyelenggara" for="nama_penyelenggara" type="text" class="form-control <?= $validation->hasError('nama_penyelenggara') ? 'is-invalid' : ''; ?>" placeholder="" value="<?= old('nama_penyelenggara'); ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="id_kategori_event"><b>Kategori</b> &nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select class="form-control <?= $validation->hasError('id_kategori_event') ? 'is-invalid' : ''; ?>" id="id_kategori_event" name="id_kategori_event">

                            <option value="">- Pilih Kategori Event -</option>
                            <?php foreach ($kategori_event as $ke) : ?>
                                <option value="<?= $ke['id_kategori_event']; ?>" id="id_kategori_event" <?= old('id_kategori_event') == $ke['id_kategori_event'] ? 'selected' : ''; ?>>
                                    <?= $ke['nama_kategori_event']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_kategori_event'); ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label>Lokasi Event &nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <input id="lokasi_event" name="lokasi_event" for="lokasi_event" rows="5" class="form-control <?= $validation->hasError('lokasi_event') ? 'is-invalid' : ''; ?>" placeholder="" value="<?= old('lokasi_event'); ?>" required></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <div class="form-group">
                        <label>Tanggal Event Mulai &nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <input id="tgl_event_mulai" name="tgl_event_mulai" for="tgl_event_mulai" type="date" class="form-control <?= $validation->hasError('tgl_event_mulai') ? 'is-invalid' : ''; ?>" placeholder="" value="<?= old('tgl_event_mulai'); ?>" required>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="form-group">
                        <label>Tanggal Event berakhir &nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <input id="tgl_event_berakhir" name="tgl_event_berakhir" for="tgl_event_berakhir" type="date" class="form-control <?= $validation->hasError('tgl_event_berakhir') ? 'is-invalid' : ''; ?>" placeholder="" value="<?= old('tgl_event_berakhir'); ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label>Deskripsi Event &nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <textarea id="deskripsi_event" name="deskripsi_event" for="deskripsi_event" class="form-control <?= $validation->hasError('nama_penyelenggara') ? 'is-invalid' : ''; ?>" placeholder="" value="<?= old('deskripsi_event'); ?>" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label>Gambar Event &nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <input type="file" class="custom-file-input <?= $validation->hasError('gambar_event') ? 'is-invalid' : ''; ?>" id="gambar_event" value="gambar_event" name="gambar_event" onchange="previewImgPengajuanEvent()" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('gambar_event'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <p>Preview Gambar<br>
                            <img id="imgPreview" width="200px" src="/img/event/default.jpg" class="img-thumbnail img-preview">
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="form-group">

                        <input type="checkbox" name="checkbox3" value="yes" style="display: inline;" required>
                        <label style="display: inline;" for="">Dengan ini saya setuju, data yang telah dimasukan adalah benar dan menyetujui jika event yang diajukan diproses lebih dari 3 hari otomatis ditolak </label>
                        </input>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-fill pull-right">Submit</button>
            <div class="clearfix"></div>
        </form>

        <!-- ################################################################################################ -->

        <!-- / main body -->
        <div class="clear"></div>
    </main>
</div>


<?= $this->endSection(); ?>