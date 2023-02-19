<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Detail Wisata</b></h1>


    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="row">
                <img src="/img/wisata/<?= $wisata['gambar_wisata']; ?>" width="400" class="rounded-start" alt="...">
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title"><b><?= $wisata['nama_wisata'] ?></b></h3>
                        <p class="card-text"><?= $wisata['alamat_wisata'] ?></p>
                        <br><br>
                        <h5><b>Deskripsi</b></h5>
                        <p style="text-align: justify;" class="card-text"><?= $wisata['deskripsi_wisata'] ?></p>
                        <p class="card-text"><small class="text-muted">Terakhir diupdate
                                : <?= $wisata['updated_at'] ?></small></p>
                        <a href="/admin/wisata" class="btn btn-info"><i class="fas fa-chevron-left"></i> Kembali</a>
                        <a href="<?= base_url('admin/wisata/edit-wisata/' . $wisata['slug']); ?>" class="btn btn-warning">Update</a>
                        <a type='button' class="btn btn-danger" href="#" data-toggle="modal" data-target="#hapusModal">
                            Hapus
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Hapus Modal-->

    


    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang anda hapus tidak dapat
                    kembali.</div>

                <div class="modal-footer">
                    <form action="/wisata/delete/<?= $wisata['id_wisata']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" href="">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- </form> -->
</div>


<?= $this->endSection(); ?>