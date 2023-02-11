<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wonderful Baubau</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="<?= base_url(); ?>/css/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="<?= base_url(); ?>/font-awesome/css/fontawesome-all.min.css">
    <script src="https://kit.fontawesome.com/bbd258fd77.js" crossorigin="anonymous"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Header -->
        <?= $this->include('views/front-templates/header_market'); ?>
        <!-- End of Header -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <?= $this->renderSection('content'); ?>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

        <!-- Footer -->
        <?= $this->include('views/front-templates/footer'); ?>
        <!-- End of Footer -->
    </div>
    <!-- End of Page Wrapper -->

    <script src="<?= base_url(); ?>/layout/scripts/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/layout/scripts/jquery.backtotop.js"></script>
    <script src="<?= base_url(); ?>/layout/scripts/jquery.mobilemenu.js"></script>
    <script src="<?= base_url(); ?>/layout/scripts/jquery.mobilemenu.js"></script>
    <script src="<?= base_url(); ?>/js/jquery.3.2.1.min.js"></script>
    <script src="<?= base_url(); ?>/js/scripts.js"></script>

    <!-- Summernote Plugins -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="<?= base_url(); ?>js/summernote-image-list.min.js"></script>
    <script>
    $('.summernote').summernote({

        dialogsInBody: true,
        placeholder: 'Klik disini untuk memulai mengetik',
        tabsize: 2,
        height: 120,
        fontNames: ['Open Sans'],
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'imageList',
                'picture', 'video'
            ]],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        dialogsInBody: true,
        imageList: {
            endpoint: "<?php echo site_url('artikel/listGambar') ?>",
            fullUrlPrefix: "<?php echo base_url('uploads/artikel') ?>/",
            thumbUrlPrefix: "<?php echo base_url('uploads/artikel') ?>/"
        },
        callbacks: {
            onImageUpload: function(files) {
                for (let i = 0; i < files.length; i++) {
                    $.upload(files[i]);
                }
            },
            onMediaDelete: function(target) {
                $.delete(target[0].src);
            }
        },
    });

    $.upload = function(file) {
        let out = new FormData();
        out.append('file', file, file.name);
        $.ajax({
            method: 'POST',
            url: '<?php echo site_url('artikel/uploadGambar') ?>',
            contentType: false,
            cache: false,
            processData: false,
            data: out,
            success: function(img) {
                $('.summernote').summernote('insertImage', img);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    };
    $.delete = function(src) {
        $.ajax({
            method: 'POST',
            url: '<?php echo site_url('artikel/deleteGambar') ?>',
            cache: false,
            data: {
                src: src
            },
            success: function(response) {
                console.log(response);
            }
        });
    };
    // $('.note-status-output').html(
    //     'Text Information'
    // );
    </script>

</body>

</html>