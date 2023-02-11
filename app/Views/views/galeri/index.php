<?= $this->extend('views/front-templates/index'); ?>

<?= $this->section('content'); ?>
<div class="overlay">
    <div id="breadcrumb" class="hoc clear">
        <!-- ################################################################################################ -->
        <h6 class="heading heading-top">Gallery</h6>
        <br>
        <ul>
            <!-- <li class="heading-top">Artikel seputar Kota Baubau dan sekitarnya</li> -->
        </ul>
        <!-- ################################################################################################ -->
    </div>
</div>

<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <?php foreach ($galeri as $g) : ?>
        <div class="gallery-container" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <div class="image">
                <img src="/img/galeri/<?= $g['gambar_galeri']; ?>" alt="art">
            </div>
            <div class="text">
                <div class="title">
                    <h2><a href="btn-view"><?= $g['nama_gambar']; ?></a>
                    </h2>
                </div>
                <div class="date">
                    <h5><?= date('d F Y',strtotime($g['created_at'])); ?></h5>
                </div>
            </div>
            <!-- <hr class="btmspace-80"> -->
        </div>
        <?php endforeach; ?>

        <?= $pager-> links('galeri','custom_pagination'); ?>

        <!-- / main body -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $g['nama_gambar']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="image">
                            <img src="<?= $g['gambar_galeri']; ?>" alt="<?= $g['nama_gambar']; ?>">
                        </div>
                        <div class="text">
                            <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis
                                in,
                                egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>

                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                                lacus
                                vel augue laoreet rutrum faucibus dolor auctor.</p>

                            <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                                scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus
                                auctor fringilla.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
$(document).ready(function() {
    // get Edit Product
    $('.btn-view').on('click', function() {
        // get data from button edit
        const id_galeri = $(this).data('id_galeri');
        const nama_gambar = $(this).data('nama_gambar');
        const gambar_galeri = $(this).data('gambar_galeri');
        // Set data to Form Edit
        $('.id_galeri').val(id);
        $('.product_name').val(name);
        $('.product_price').val(price);
        $('.product_category').val(category).trigger('change');
        // Call Modal Edit
        $('#editModal').modal('show');
    });

    // get Delete Product
    $('.btn-delete').on('click', function() {
        // get data from button edit
        const id = $(this).data('id_galeri');
        // Set data to Form Edit
        $('.productID').val(id);
        // Call Modal Edit
        $('#deleteModal').modal('show');
    });

});
</script>
<?= $this->endSection(); ?>