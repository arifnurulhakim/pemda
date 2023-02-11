<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Edit Kategori Event</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/kategorievent/update/<?= $result['id_kategori_event']; ?>" method="POST"
                enctype="multipart/form-data">
                <?= csrf_field();?>
                <input type="hidden" name="slug_kategori_event" value="<?= $result['slug_kategori_event']; ?>"
                    name="slug_kategori_event">
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_kategori_event"><b>Nama Kategori</b></label><input id="nama_kategori_event"
                            name="nama_kategori_event" for="nama_kategori_event"
                            class="form-control <?= $validation->hasError('nama_kategori_event') ? 'is-invalid' : ''; ?>"
                            type="text" placeholder=""
                            value="<?= old('nama_kategori_event', $result['nama_kategori_event']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('nama_kategori_event'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi_kategori_event"><b>Deskripsi</b></label><textarea
                            class="form-control <?= $validation->hasError('deskripsi_kategori_event') ? 'is-invalid' : ''; ?>"
                            id="deskripsi_kategori_event" name="deskripsi_kategori_event" for='deskripsi_kategori_event'
                            rows="3"
                            value="<?= old('deskripsi_kategori_event'); ?>"><?= $result['deskripsi_kategori_event']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation-> getError('deskripsi_kategori_event'); ?>
                        </div>
                    </div>
                </div>

                <button type='submit' class="btn btn-primary" href="/kategorievent/edit">Ubah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>