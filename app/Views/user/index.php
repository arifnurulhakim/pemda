<?= $this->extend('templates/dashboard/dashboard'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <div class="row">
        <div class="col">
            <div class="card" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('/img/user/' . user()->user_image); ?>" class="img-fluid rounded-start" alt="<?= user()->username; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><?= user()->username; ?></h4>
                                </li>
                                <?php if (user()->fullname) : ?>
                                    <li class="list-group-item"><?= user()->fullname; ?></li>
                                <?php endif; ?>

                                <li class="list-group-item"><?= user()->email; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- produk jumlah -->
        <div class="col-lg">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs-12 font-weight-bold text-warning text-uppercase mb-1">
                                Data Produk</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800"><?= countData('produk'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-6x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- event jumlah -->
        <div class="col-lg">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs-12 font-weight-bold text-warning text-uppercase mb-1">
                                Data Event</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800"><?= countData('event'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-6x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- wisata jumlah -->
        <div class="col-lg">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs-12 font-weight-bold text-warning text-uppercase mb-1">
                                Data Wisata</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800"><?= countData('wisata'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-6x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Pending Requests Card Example -->

    </div>


    <!-- Content Row -->

</div>

<?= $this->endSection(); ?>