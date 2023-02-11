<?= $this->extend('views/front-templates/index'); ?>

<?= $this->section('content'); ?>
<div class="overlay" style="background-image: url(/img/wisata/<?= $wisata['gambar_wisata']; ?>);height: 600px;">
    <div id="pageintro" class="hoc clear">

    </div>
</div>

<?= $this->endSection(); ?>