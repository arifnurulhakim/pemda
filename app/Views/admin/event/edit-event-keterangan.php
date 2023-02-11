<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-700"><b>Edit Event</b></h1>

  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="/event/update/<?= $result['id_event']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="slug" value="<?= $result['slug']; ?>" name="slug">
        <input type="hidden" name="gambarEventLama" value="<?= $result['gambar_event']; ?>">


        <div class="row mb-3">
          <div class="col">
            <label for="keterangan"><b>keterangan</b></label><textarea class="form-control summernote <?= $validation->hasError('keterangan') ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" for='keterangan' rows="3" value="<?= old('keterangan'); ?>"><?= $result['keterangan']; ?></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('keterangan'); ?>
            </div>
          </div>
        </div>


        <div class="row mb-3">
          <div class="col">
            <p>Preview Gambar<br>
              <img id="imgPreview" width="200px" src="/img/event/<?= $result['gambar_event']; ?>" class="img-thumbnail img-preview">
            </p>
          </div>
        </div>
        <button type='submit' class="btn btn-primary" href="/event/edit">Update Data</button>
        <button class="btn btn-danger" type="reset">Batal</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>