<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Profil</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/user/update/<?= user_id() ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field();?>
                <div class="row mb-3">

                    <div class="col">
                        <label for="email"><b>Email</b></label><input class="form-control" id="email" type="email"
                            placeholder="" value="<?= $result['email']; ?>" name="email" readonly>
                    </div>
                    <div class="col">
                        <label for="username"><b>Username</b></label><input class="form-control" id="username"
                            type="text" placeholder="" value="<?= $result['username']; ?>" name="username" readonly>
                        <div class="invalid-feedback">
                            <?= $validation-> getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="fullname"><b>Nama</b></label>
                        <input class="form-control <?= $validation->hasError('fullname') ? 'is-invalid' : ''; ?>" id=""
                            type="text" placeholder="" value="<?= old('fullname', $result['fullname']); ?>"
                            name="fullname">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('fullname'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="no_telepon"><b>Nomor Telepon (Whatsapp)</b></label><input class="form-control" id=""
                            type="number" placeholder="contoh: 08xx-xxxx-xxxx"
                            value="<?= old('no_telepon', $result['no_telepon']); ?>" name="no_telepon">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('no_telepon'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alamat"><b>Alamat</b></label><input class="form-control" id="" type="text"
                            placeholder="" value="<?= old('alamat', $result['alamat']); ?>" name="alamat">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi"><b>Deskripsi</b>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><textarea
                            class="form-control summernote <?= $validation->hasError('deskripsi') ? 'is-invalid' : ''; ?>"
                            id="deskripsi" name="deskripsi" for='deskripsi' rows="3"
                            value="<?= old('deskripsi'); ?>"><?= $result['deskripsi']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation-> getError('deskripsi'); ?>
                        </div>
                    </div>
                </div>

                <!-- <div class="row mb-3">
                    <div class="col">
                        <label for=""><b>Password</b></label><input class="form-control" id="" type="text"
                            placeholder="Diisi jika mengubah password">
                    </div>
                    <div class="col">
                        <label for=""><b>Konfirmasi Password</b></label><input class="form-control" id="" type="text"
                            placeholder="Diisi jika mengubah password">
                    </div>
                </div> -->
                <div class="row mb-3">
                    <div class="col">
                        <div class="custom-file">
                            <input type="file"
                                class="custom-file-input <?= $validation->hasError('user_image') ? 'is-invalid' : ''; ?>"
                                id="user_image" value="user_image" name="user_image" onchange="previewImgUser()">
                            <div class="invalid-feedback">
                                <?= $validation-> getError('user_image'); ?>
                            </div>
                            <label class="custom-file-label" for="customFile">Upload Gambar&nbsp;&nbsp;<span
                                    class="badge badge-light bg-gray-200"
                                    style="color: grey;"><b>Wajib</b></span></label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p>Preview Gambar<br>
                            <img id="imgPreview" width="200px" src="/img/user/<?= $result['user_image']; ?>"
                                class="img-thumbnail img-preview">
                        </p>
                    </div>
                </div>

                <button type='submit' class="btn btn-success" href="/produk/create">Update</button>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>