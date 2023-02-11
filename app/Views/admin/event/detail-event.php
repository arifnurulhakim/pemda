<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Detail Event</b></h1>

    <div class="card shadow mb-4">

        <div class="card-body">

            <div class="row">
                <img src="/img/event/<?= $event['gambar_event']; ?>" width="400" class="rounded-start" alt="...">
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-body-desc">


                            <h3 class="card-title"><?= $event['nama_event'] ?></h3>
                            <p class="card-text">Penyelenggara : <?= $event['nama_penyelenggara'] ?></p>
                            <p class="card-text">Lokasi Event : <?= $event['lokasi_event'] ?></p>
                            <h4 class="card-title">Deskripsi</h4>
                            <p class="card-text"><?= word_limiter($event['deskripsi_event'], 1) ?></p>
                            <p class="card-text">Event dimulai :<?= $event['tgl_event_mulai'] ?></p>
                            <p class="card-text">Event berakhir :<?= $event['tgl_event_berakhir'] ?></p><br>
                            <p class="card-text"><small class="text-muted">Terakhir diupdate
                                    : <?= $event['updated_at'] ?></small></p>
                            <?php if ($event['status_event'] == 0) { ?>
                                <a type="button" href="#" class="btn btn-success" data-toggle="modal" data-target="#verifikasiModal"><i class="fas fa-check"></i>
                                    Approve</a>
                                <a type="button" href="#" class="btn btn-danger" data-toggle="modal" data-target="#penolakanModal"><i class="fas fa-window-close"></i> Tolak</a>
                            <?php } ?>
                            <!-- <a href="/event" class="btn btn-danger"><i class="fas fa-window-close"></i> Tolak</a>;
                            <a href="/event" class="btn btn-danger"><i class="fas fa-window-close"></i> Tolak</a>; -->

                            <br><br>
                            <a href="/event" class="btn btn-info"><i class="fas fa-chevron-left"></i> Kembali</a>
                            <a href="<?= base_url('admin/event/edit-event/' . $event['slug']); ?>" class="btn btn-warning">Update</a>
                            <a type='button' class="btn btn-danger" href="#" data-toggle="modal" data-target="#hapusModal">
                                Hapus
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Hapus Modal-->

    <?= csrf_field(); ?>


    <div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin mengapprove event ini?
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <form action="/event/verifikasi/<?= $event['id_event']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <input type="hidden" name="_method" value="PUT">
                        <button type="submit" class="btn btn-primary" href="">Approve</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                    <form action="/event/delete/<?= $event['id_event']; ?>" method="post">
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

    <!-- penolakan event -->
    <div class="modal fade" id="penolakanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menolak event ini?
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <form action="/event/penolakan/<?= $event['id_event']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <input type="hidden" name="_method" value="PUT">
                        <button type="submit" class="btn btn-danger" href="">Tolak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- </form> -->
</div>


<?= $this->endSection(); ?>