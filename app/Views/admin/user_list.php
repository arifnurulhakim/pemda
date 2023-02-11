<?= $this->extend('templates/dashboard/dashboard'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">User List</h1>
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="<?= base_url('admin/create-user'); ?>"><i class="fas fa-plus-circle"></i>
                Tambah Data</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aktif</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $user->username; ?></td>
                                        <td><?= $user->email; ?></td>
                                        <td><?= $user->name; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-circle btn-active-users" data-id="<?= $user->userid; ?>" data-active="<?= $user->active == 1 ? 1 : 0; ?>" title="Klik untuk Mengaktifkan atau Menonaktifkan">
                                                <?= $user->active == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>'; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/' . $user->userid); ?>" class="btn btn-primary btn-circle btn-sm" title="Detail">
                                                <i class="fas fa-user"></i>
                                            </a>
                                            <a href="<?= base_url('admin/changePassword/' . $user->userid); ?>" class="btn btn-warning btn-circle btn-sm" title="Ubah Password">
                                                <i class="fas fa-key"></i>
                                            </a>
                                            <a href="#" class="btn btn-success btn-circle btn-sm btn-change-role" data-id="<?= $user->userid; ?>" title="Ubah Role">
                                                <i class="fas fa-tasks"></i>
                                            </a>
                                            <a href="<?= base_url('admin/edit/' . $user->userid); ?>" class="btn btn-info btn-circle btn-sm btn-change-role" data-id="<?= $user->userid; ?>" title="Hapus User">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<form action="<?= base_url(); ?>/admin/activate" method="post">
    <div class="modal fade" id="activateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Ya" untuk mengupdate User</div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="active" class="active">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection(); ?>