<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data User</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/admin/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field();?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="email"><b>Email</b></label><input id="email" name="email" for="email"
                            class="form-control <?= $validation->hasError('email') ? 'is-invalid' : ''; ?>" type="text"
                            placeholder="" value="<?= old('email'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('email'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="username"><b>Username</b></label><input id="username" name="username" for="username"
                            class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?>"
                            type="text" placeholder="" value="<?= old('username'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="fullname"><b>Nama</b></label><input id="fullname" name="fullname" for="fullname"
                            class="form-control <?= $validation->hasError('fullname') ? 'is-invalid' : ''; ?>"
                            type="text" placeholder="" value="<?= old('fullname'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('fullname'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="no_telepon"><b>No Telepon</b></label><input id="no_telepon" name="no_telepon"
                            for="no_telepon"
                            class="form-control <?= $validation->hasError('no_telepon') ? 'is-invalid' : ''; ?>"
                            type="text" placeholder="" value="<?= old('no_telepon'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('no_telepon'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="alamat"><b>Alamat</b></label><input id="alamat" name="alamat" for="alamat"
                            class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : ''; ?>" type="text"
                            placeholder="" value="<?= old('alamat'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">

                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="role"><b>Kategori</b></label><select
                            class="form-control <?= $validation->hasError('role') ? 'is-invalid' : ''; ?>" name="role"
                            id="role" value="<?= old('role'); ?>">
                            <option value="">- Pilih Role -</option>
                            <option value="Admin">Admin</option>
                            <option value="Penjual">Penjual</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation-> getError('stok'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi"><b>Deskripsi</b></label><input id="deskripsi" name="deskripsi"
                            for="deskripsi"
                            class="form-control summernote <?= $validation->hasError('deskripsi') ? 'is-invalid' : ''; ?>"
                            type="text" placeholder="" value="<?= old('deskripsi'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('deskripsi'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="custom-file">
                            <input type="file"
                                class="custom-file-input <?= $validation->hasError('user_image') ? 'is-invalid' : ''; ?>"
                                id="user_image" value="user_image" name="user_image" onchange="previewImgUser()">
                            <div class="invalid-feedback">
                                <?= $validation-> getError('user_image'); ?>
                            </div>
                            <label class="custom-file-label" for="customFile">Upload Gambar</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p>Preview Gambar<br>
                            <img id="imgPreview" width="200px" src="/img/user/default.jpg"
                                class="img-thumbnail img-preview">
                        </p>
                    </div>
                </div>
                <button type='submit' class="btn btn-primary" href="/admin/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>