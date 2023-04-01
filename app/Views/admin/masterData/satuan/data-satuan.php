<?= $this->extend('templates/masterData/masterData'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Data Satuan</b></h1>

    <!-- Alert -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    <!-- /Alert -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="<?= base_url('admin/satuan/create'); ?>"><i class="fas fa-plus-circle"></i>
                Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableSatuan" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Satuan</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($satuan as $st) : ?>
                            <tr>
                                <td> <?= $st['nama_satuan'] ?></td>
                                <td> <?= $st['deskripsi_satuan'] ?></td>
                                <td>


                                        <a type='button' class="btn btn-warning" href="/satuan/edit/<?=$st['id_satuan']; ?>" aria-placeholder="">
                                <i class="fas fa-edit"></i>
                            </a>
                                        <a type='button' class="btn btn-danger" href="#" data-toggle="modal" data-target="#hapusModal" data-id_satuan="<?= $st['id_satuan']; ?>">
                                <i class="fas fa-trash-alt"></i>
                            </a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
                
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        
                        <a type="submit" class="btn btn-danger del-button" href="">Hapus</a>

                </div>
            </div>
        </div>
    </div>
    <!-- </Hapus Modal> -->


</div>

<script src="path/to/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#hapusModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id_satuan = button.data('id_satuan')
        var modal = $(this)
        modal.find('.del-button').attr('href', '/satuan/delete/' + id_satuan)
    })
})
</script>

<script>
    $.ajax({
    type: "POST",
    url: "<?= base_url('satuan/getDataUpdate') ?>",
    data: {id_satuan: "<?= $st['id_satuan']; ?>"},
    success: function (response) {
        // action to be performed on success
    }
});
</script>
<?= $this->endSection(); ?>