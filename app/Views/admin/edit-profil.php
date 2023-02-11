<?= $this->extend('templates/dashboard/dashboard'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Profil</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form>
                <div class="row mb-3">
                    <div class="col">
                        <label for=""><b>Nama</b></label><input class="form-control" id="" type="text" placeholder="" value="<?= $result['fullname']; ?>">
                    </div>
                    <div class="col">
                        <label for=""><b>Username</b></label><input class="form-control" id="" type="text" placeholder="" value="<?= $result['username']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for=""><b>Email</b></label><input class="form-control" id="" type="email" placeholder="emailanda@mail.com" value="<?= $result['email']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for=""><b>Password</b></label><input class="form-control" id="" type="text" placeholder="Diisi jika mengubah password">
                    </div>
                    <div class="col">
                        <label for=""><b>Konfirmasi Password</b></label><input class="form-control" id="" type="text" placeholder="Diisi jika mengubah password">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for=""><b>Pilih Gambar</b></label><input class="form-control" id="" type="file" onchange="readURL(this);">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p>Preview Gambar<br>
                            <img id="imgPreview" width="350px" src="">
                        </p>
                    </div>
                </div>

                <button type='submit' class="btn btn-success" href="/produk/create">Update</button>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>