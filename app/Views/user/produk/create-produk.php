<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Produk</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/produk/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field();?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_produk"><b>Nama Produk</b>&nbsp;&nbsp;<span
                                class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><input id="nama_produk"
                            name="nama_produk" for="nama_produk"
                            class="form-control <?= $validation->hasError('nama_produk') ? 'is-invalid' : ''; ?>"
                            type="text" placeholder="" value="<?= old('nama_produk'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('nama_produk'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi_produk"><b>Deskripsi</b>&nbsp;&nbsp;<span
                                class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <textarea
                            class="form-control summernote <?= $validation->hasError('deskripsi_produk') ? 'is-invalid' : ''; ?>"
                            id="deskripsi_produk" name="deskripsi_produk" for='deskripsi_produk' rows="3"
                            value="<?= old('deskripsi_produk'); ?>">
                            <?= old('deskripsi_produk'); ?>
                        </textarea>
                        <div class="invalid-feedback">
                            <?= $validation-> getError('deskripsi_produk'); ?>
                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="harga"><b>Harga</b>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label>
                        <input class="form-control<?= $validation->hasError('harga') ? 'is-invalid' : ''; ?>" id="harga"
                            name="harga" for='harga' type="number" placeholder="" value="<?= old('harga'); ?>"><small
                            id="priceHelp" class="form-text text-muted">Isikan tanpa tanda pemisah. Contoh
                            pengisian 300000</small>
                        <div class="invalid-feedback">
                            <?= $validation-> getError('harga'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="berat"><b>Berat (gram)</b>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><input
                            class="form-control <?= $validation->hasError('berat') ? 'is-invalid' : ''; ?>" id="berat"
                            name="berat" for='berat' type="number" placeholder="" value="<?= old('berat'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('berat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="stok"><b>Stok</b>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><input
                            class="form-control <?= $validation->hasError('stok') ? 'is-invalid' : ''; ?>" id="stok"
                            name="stok" for='stok' type="number" placeholder="" value="<?= old('stok'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('stok'); ?>
                        </div>
                    </div>
                    <!-- <div class="col">
                        <label for="stok"><b>Stok</b>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><select
                            class="form-control <?= $validation->hasError('stok') ? 'is-invalid' : ''; ?>" name="stok"
                            id="stok" value="<?= old('stok'); ?>">
                            <option value="">- Pilih Stok -</option>
                            <option value="Ada">Ada</option>
                            <option value="Kosong">Kosong</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation-> getError('stok'); ?>
                        </div>
                    </div> -->
                    <div class="col">
                        <label for="id_kategori_produk"><b>Kategori</b>&nbsp;&nbsp;<span
                                class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select
                            class="form-control <?= $validation->hasError('id_kategori_produk') ? 'is-invalid' : ''; ?>"
                            id="id_kategori_produk" name="id_kategori_produk" onchange="enabledSize(this)">

                            <option value="1">- Pilih Kategori Produk -</option>
                            <?php foreach($kategori_produk as $kb) : ?>
                            <option value="<?= $kb['id_kategori_produk']; ?>" id="id_kategori_produk"
                                <?= old('id_kategori_produk') == $kb['id_kategori_produk'] ? 'selected' : ''; ?>>
                                <?= $kb['nama_kategori_produk']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation-> getError('id_kategori_produk'); ?>
                        </div>
                    </div>

                    <div class="col d-none" id="ukuran">
                        <label for="ukuran"><b>Ukuran</b>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><input name="ukuran" for="ukuran"
                            class="form-control <?= $validation->hasError('ukuran') ? 'is-invalid' : ''; ?>" type="text"
                            placeholder="" value="<?= old('ukuran'); ?>"><small id="sizeHelp"
                            class="form-text text-muted">Isikan menggunakan tanda pemisah. Contoh
                            pengisian S,M,L,XL</small>

                        <div class="invalid-feedback">
                            <?= $validation-> getError('id_kategori_produk'); ?>
                        </div>
                    </div>

                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="custom-file">
                            <input type="file"
                                class="custom-file-input <?= $validation->hasError('gambar_produk') ? 'is-invalid' : ''; ?>"
                                id="gambar_produk" value="gambar_produk" name="gambar_produk"
                                onchange="previewImgProduk()">
                            <div class="invalid-feedback">
                                <?= $validation-> getError('gambar_produk'); ?>
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
                            <img id="imgPreview" width="200px" src="/img/produk/default.jpg"
                                class="img-thumbnail img-preview">
                        </p>
                    </div>
                </div>

                <button type='submit' class="btn btn-primary" href="/produk/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>

                <!-- <div class="mb-3"><label for="">Nama Produk</label><input class="form-control" id="" type="text"
                        placeholder="">
                </div>
                <div class="mb-3"><label for="exampleFormControlTextarea1">Deskripsi</label><textarea
                        class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3"><label for="">Harga</label><input class="form-control" id="" type="text"
                        placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelect1">Kategori</label><select class="form-control"
                        id="exampleFormControlSelect1">
                        <option>- Pilih Kategori -</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelect2">Example multiple select</label><select class="form-control"
                        id="exampleFormControlSelect2" multiple="">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div> -->
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>