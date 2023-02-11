<?= $this->extend('views/front-templates/index'); ?>

<?= $this->section('content'); ?>
<div class="overlay">
    <div id="breadcrumb" class="hoc clear">
        <!-- ################################################################################################ -->
        <h6 class="heading heading-top">Publikasi</h6>
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

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableRenstra1621">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nama File</th>
                            <th>Jumlah Unduhan</th>
                            <th style="text-align: center;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (20 *($currentPage -1)); ?>
                        <?php foreach ($publikasi as $p) : ?>
                        <tr>
                            <td> <?= $i++; ?></td>
                            <td><?= $p['nama_file']; ?></td>
                            <td>x kali</td>
                            <td>
                                <a href="<?= base_url('file/publikasi/'. $p['file_publikasi']); ?>"
                                    class="btn btn-danger" target="_blank"><i class="fas fa-fw fa-download"></i>
                                    Download</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?= $pager-> links('publikasi','custom_pagination'); ?>

        <!-- / main body -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?food" alt="food">
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




<?= $this->endSection(); ?>