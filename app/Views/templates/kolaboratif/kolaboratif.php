<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles-->
  <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Summernote plugin -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url(); ?>/css/summernote-image-list.min.css">

  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
  </script>

  <!-- Load librari/plugin jquery nya -->
  <script src="js/jquery.min.js" type="text/javascript"></script>

  <!-- Load File javascript config.js -->
  <script src="js/config.js" type="text/javascript"></script>

  <style>
    .note-editor .dropdown-toggle::after {
      all: unset;
    }

    .note-editor .note-dropdown-menu {
      box-sizing: content-box;
    }

    .note-editor .note-modal-footer {
      box-sizing: content-box;
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?= $this->include('templates/kolaboratif/sidebarKolaboratif'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?= $this->include('templates/topbar'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <?= $this->renderSection('page-content'); ?>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SI-PORATIF <?= date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingin Logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tekan "Logout" untuk keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>

  <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url(); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url(); ?>/js/demo/datatables-demo.js"></script>

  <!-- JQuery Mask -->
  <script src="<?= base_url(); ?>/vendor/jquery/jquery.mask.min.js"></script>


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
    // $('.text').summernote('disable');
  </script>

  <script>
    function previewImgArtikel() {
      const gambarArtikel = document.querySelector('#gambar_artikel');
      const gambarArtikelLabel = document.querySelector('.custom-file-label');
      const imgPreview = document.querySelector('.img-preview');

      gambarArtikelLabel.textContent = gambarArtikel.files[0].name; //sampul -> fiels -> index ke 0 -> namanya

      const fileGambarArtikel = new FileReader();
      fileGambarArtikel.readAsDataURL(gambarArtikel.files[0]);
      fileGambarArtikel.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    }
  </script>

  <script>
    function previewImgWisata() {
      const gambarWisata = document.querySelector('#gambar_wisata');
      const gambarWisataLabel = document.querySelector('.custom-file-label');
      const imgPreview = document.querySelector('.img-preview');

      gambarWisataLabel.textContent = gambarWisata.files[0].name; //sampul -> fiels -> index ke 0 -> namanya

      const fileGambarWisata = new FileReader();
      fileGambarWisata.readAsDataURL(gambarWisata.files[0]);
      fileGambarWisata.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    }
  </script>

  <script>
    function previewImgProduk() {
      const gambarProduk = document.querySelector('#gambar_produk');
      const gambarProdukLabel = document.querySelector('.custom-file-label');
      const imgPreview = document.querySelector('.img-preview');

      gambarProdukLabel.textContent = gambarProduk.files[0].name; //sampul -> fiels -> index ke 0 -> namanya

      const fileGambarProduk = new FileReader();
      fileGambarProduk.readAsDataURL(gambarProduk.files[0]);
      fileGambarProduk.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    }
  </script>

  <script>
    function previewImgEvent() {
      const gambarEvent = document.querySelector('#gambar_produk');
      const gambarEventLabel = document.querySelector('.custom-file-label');
      const imgPreview = document.querySelector('.img-preview');

      gambarEventLabel.textContent = gambarEvent.files[0].name; //sampul -> fiels -> index ke 0 -> namanya

      const fileGambarEvent = new FileReader();
      fileGambarEvent.readAsDataURL(gambarEvent.files[0]);
      fileGambarEvent.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    }
  </script>

  <script>
    function previewImgEvent() {
      const gambarEvent = document.querySelector('#gambar_event');
      const gambarEventLabel = document.querySelector('.custom-file-label');
      const imgPreview = document.querySelector('.img-preview');

      gambarEventLabel.textContent = gambarEvent.files[0].name; //sampul -> fiels -> index ke 0 -> namanya

      const fileGambarEvent = new FileReader();
      fileGambarEvent.readAsDataURL(gambarEvent.files[0]);
      fileGambarEvent.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    }
  </script>



  <script>
    function previewImgUser() {
      const gambarUser = document.querySelector('#user_image');
      const gambarUserLabel = document.querySelector('.custom-file-label');
      const imgPreview = document.querySelector('.img-preview');

      gambarUserLabel.textContent = gambarUser.files[0].name; //sampul -> fiels -> index ke 0 -> namanya

      const fileGambarUser = new FileReader();
      fileGambarUser.readAsDataURL(gambarUser.files[0]);
      fileGambarUser.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    }
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      // get Delete Page
      $('.btn-active-users').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        const active = $(this).data('active');

        // Set data to Form Edit
        $('.id').val(id);
        $('.active').val(active);
        // Call Modal Edit
        $('#activateModal').modal('show');
      });

    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {

      // Format mata uang.
      $('.rupiahs').mask('000.000.000', {
        reverse: true
      });

    })
  </script>


  <script type="text/javascript">
    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function(e) {
      tanpa_rupiah.value = formatRupiah(this.value);
    });

    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e) {
      dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  </script>

  <script type="text/javascript">
    function enabledSize(answer) {
      console.log(answer.value);
      if (answer.value == 2) {
        document.getElementById('ukuran').classList.remove('d-none');
      } else {
        document.getElementById('ukuran').classList.add('d-none');
      }
    };
  </script>


  <!-- satuan dropwdown searching -->
  <script>
    function myFunction_st() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    function filterFunction_st() {
      var input, filter, ul, li, a, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      div = document.getElementById("myDropdown");
      a = div.getElementsByTagName("a");
      for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          a[i].style.display = "";
        } else {
          a[i].style.display = "none";
        }
      }
    }

    function autofill_choose_st(id_satuan, nama_satuan) {

      document.getElementById('id_satuan').value = id_satuan;
      document.getElementById('nama_satuan').value = nama_satuan;
      myFunction_st();

    }

    function empty_st() {
      var value = "";
      var value_nam = "-Pilih Satuan-";
      document.getElementById('nama_satuan').value = value_nam;
      document.getElementById('id_satuan').value = value;

    }
  </script>

  <!-- Perangkat dropwdown searching -->
  <script>
    function myFunction() {
      document.getElementById("myDropdownPD").classList.toggle("show");
    }

    function filterFunction() {
      var input, filter, ul, li, a, i;
      input = document.getElementById("myInputPD");
      filter = input.value.toUpperCase();
      div = document.getElementById("myDropdownPD");
      a = div.getElementsByTagName("a");
      for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          a[i].style.display = "";
        } else {
          a[i].style.display = "none";
        }
      }
    }

    function autofill_choose(id_pd, nama_pd) {

      document.getElementById('id_pd').value = id_pd;
      document.getElementById('nama_pd').value = nama_pd;
      myFunction();

    }

    function empty() {
      var value = "";
      var value_nam = "-Pilih Perangkat Daerah-";
      document.getElementById('nama_pd').value = value_nam;
      document.getElementById('id_pd').value = value;

    }
  </script>


  <!-- kode rekening dropwdown searching -->
  <script>
    function myFunction_kr() {
      document.getElementById("myDropdownKr").classList.toggle("show");
    }

    function filterFunction_st() {
      var input, filter, ul, li, a, i;
      input = document.getElementById("myInputKr");
      filter = input.value.toUpperCase();
      div = document.getElementById("myDropdownKr");
      a = div.getElementsByTagName("a");
      for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          a[i].style.display = "";
        } else {
          a[i].style.display = "none";
        }
      }
    }

    function autofill_choose_kr(id_kode_rekening, kode_rekening) {

      document.getElementById('id_kode_rekening').value = id_kode_rekening;
      document.getElementById('kode_rekening').value = kode_rekening;
      myFunction_st();

    }

    function empty_kr() {
      var value = "";
      var value_nam = "-Pilih Kode Rekening-";
      document.getElementById('kode_rekening').value = value_nam;
      document.getElementById('id_kode_rekening').value = value;
      // document.getElementById('program').value = value;
    }
  </script>
</body>

</html>