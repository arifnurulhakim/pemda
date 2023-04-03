<?= $this->extend('views/front-templates/index'); ?>
<?php
//dd(logged_in()); 
// dd($_SESSION);
?>
<?= $this->section('content'); ?>
<div class="overlay">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>



    <div id="pageintro" class="hoc clear">

        <article>
            <h3 class="heading">Selamat Datang di <br> <span class="heading-bold">SI-PORATIF</span> </h3>
            <p>BAGIAN ADMINISTRASI PEMBANGUNAN, SEKRETARIAT DAERAH KABUPATEN BANDUNG</p>
            <footer>
                <a class="btn btn1" href="#title-about">
                    <span class="button-text">Tentang kami</span>
                    <span class="button-icon"><i class="fa-solid fa-angles-right"></i></span>
                </a>
            </footer>
            <!-- <footer><a class="btn" href="wisata.php">LOGIN ADMIN</a></footer> -->
        </article>

    </div>


    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>



</div>

<div id="title-about" class="wrapper row3">
    <main id="title-about" class="hoc clear">
        <!-- main body -->
        <div class="title-about">
            <div class="sectiontitle">
                <p class="heading underline font-x2">TENTANG APLIKASI </p>
            </div>

            <div class="title-about-text">

                <p style="text-align: justify;">Sistem informasi Penyusunan Program Kolaboratif (SI-PORATIF) merupakan basis data elektronik yang menjadi wadah Bagian Administrasi Pembangunan dalam menjalankan tugas pokok, fungsi dan kewenangannya sebagaimana amanat Peraturan Bupati Bandung Nomor 5 Tahun 2022 tentang Tugas, Fungsi dan Tata Kerja Sekretariat Daerah Kabupaten Bandung. Selain itu, SI-PORATIF menjadi sarana pelaksanaan tupoksi Bagian Administrasi Pembangunan (khususnya lingkup Penyusunan Program) dalam memfasilitasi penyusunan program pembangunan daerah, melaksanakan koordinasi lintas unsur pemerintah (Pusat dan Provinsi), lintas sektor dan aktor (kolaboratif), melaksanakan penyusunan program pembangunan dalam rangka meningkatkan akses pembangunan daerah dan sebagai bahan monitoring, evaluasi dan pelaporan.</p>
            </div>
        </div>

        <hr class="">
        <div class="title-about">
            <div class="sectiontitle">
                <p class="heading underline font-x2">LAYANAN </p>
            </div>

            <div class="title-about-text">

                <p style="text-align: justify;">SI-PORATIF merupakan software yang dikembangkan untuk mengelola basis data dalam rangka fasilitasi penyusunan program pembangunan daerah yang bersifat kolaboratif. Basis data elektronik yang ditampilkan dalam SI-PORATIF meliputi data dan informasi mengenai rencana pembangunan daerah (RPJMD, Renstra Perangkat Daerah, dan RKPD) serta program dan kegiatan yang bersifat prioritas, strategis dan kolaboratif. Informasi dalam SI-PORATIF menjadi masukan atau input dalam memfasilitasi penyusunan program pembangunan daerah yang bersifat kolaboratif.
                </p>
            </div>
        </div>

        <hr class="btmspace-80">
        <div class="sectiontitle home">
            <p class="heading underline font-x2">PENGGUNA</p>
        </div>
        <div class="title-about-text">

            <p style="text-align: justify ;">Pengguna SI-PORATIF merupakan Perangkat Daerah di lingkungan Pemerintah Daerah Kabupaten Bandung, sebagaimana kedudukan dan susunan perangkat daerah yang ditetapkan dalam Peraturan Bupati Bandung Nomor 1 Tahun 2022.</p>
        </div>


        <section id="introblocks">
            <ul class="blocks nospace group d-flex justify-content-evenly">
                <div class="container text-center">
                    <div class="row row-cols-4">
                        <div class="col"> <img style="border: none; width: 150px; height: 150px;" src="/img/front/logopemda.png" class="img-thumbnail" alt="...">
                            <div class="title-about-text" style="margin-top: 10px;">

                                <p style="text-align: center;">Terdiri dari 6 Perangkat Daerah berbentuk Badan</p>
                            </div>
                        </div>
                        <div class="col"> <img style="border: none; width: 150px; height: 150px;" src="img/front/logopemda.png " class="img-thumbnail" alt="...">
                            <div class="title-about-text" style="margin-top: 10px;">

                                <p style="text-align: center;">Terdiri dari 24 Perangkat Daerah berbentuk Dinas</p>
                            </div>
                        </div>
                        <div class="col"> <img style="border: none; width: 150px; height: 150px;" src="/img/front/logopemda.png" class="img-thumbnail" alt="...">
                            <div class="title-about-text" style="margin-top: 10px;">

                                <p style="text-align: center;">Terdiri dari 3 BLUD</p>
                            </div>
                        </div>
                        <div class="col"> <img style="border: none; width: 150px; height: 150px;" src="/img/front/logopemda.png" class="img-thumbnail" alt="...">
                            <div class="title-about-text" style="margin-top: 10px;">

                                <p style="text-align: center;">Terdiri dari 31 Kecamatan yang menaungi 270 Desa dan 10 Kelurahan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
            <!-- <a href="/pages/wisata" style="font-size: 18px;">Lihat Selengkapnya</a> -->
        </section>

        <!-- <hr class="btmspace-80">
        <div class="sectiontitle home">
            <p class="heading underline font-x2">Event</p>
        </div> -->

        <!-- <section class="event group">
            <div class="one_half first"><img class="inspace-15 borderedbox " src="/images/ramadan.jpg" alt=""></div>
            <div class="one_half">
            </div>
        </section> -->
        <!-- 
        <div class="event_content">
            <div>

            </div>
        </div> -->


        <!-- / main body -->
        <div class="clear"></div>

        <section class="hoc clear">

            <div class="sectiontitle">
                <p class="heading underline font-x2">GALERI</p>

            </div>
            <div class="title-about-text">

                <p style="text-align: center ;">Narasi Galeri</p>
            </div>
            <section id="introblocks">
                <ul class="blocks nospace group btmspace-80 d-flex justify-content-evenly">

                    <li class="one_third">
                        <figure><a class="" href=""><img style="height: 340px; width: fit-content; object-fit:cover;" src="/img/front/pemandangan2.jpg" alt=""></a>
                            <figcaption>
                                <h6 class="heading">Pemandangan ...</h6>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="one_third">
                        <figure><a class="" href=""><img style="height: 340px; width: fit-content; object-fit:cover;" src="/img/front/pemandangan1.jpg" alt=""></a>
                            <figcaption>
                                <h6 class="heading">Pemandangan ...</h6>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="one_third">
                        <figure><a class="" href=""><img style="height: 340px; width: fit-content; object-fit:cover;" src="/img/front/pemandangan3.jpg" alt=""></a>
                            <figcaption>
                                <h6 class="heading">Pemandangan ...</h6>
                            </figcaption>
                        </figure>
                    </li>

                </ul>

            </section>

        </section>



        <!-- <div class="wrapper row3">
            <section class="hoc clear ">

                <div class="sectiontitle">
                    <p class="heading underline font-x2">Media Sosial</p>
                </div>
                <div data-mc-src="fe167207-28a1-422a-9303-8575ba8c148d#instagram"></div>

                <script src="https://cdn2.woxo.tech/a.js#62ea2cbc64b2e4b089d14ec5" async data-usrc>
                </script>
            </section>
        </div> -->
        <hr class="btmspace-80">
    </main>
</div>




<div class="wrapper row3">

</div>


<?= $this->endSection(); ?>