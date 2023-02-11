    <!-- <div class="bgded" style="background-image:url('/img/bg.jpg'); background-size: cover;"> -->
    <!-- ################################################################################################ -->
    <div class="header">
        <div class="wrapper row1">
            <header id="header" class="hoc clear">
                <div id="logo" class="fl_left">
                    <!-- ################################################################################################ -->
                    <h1><a href="/"> <img src="/img/front/header-logo.png" alt=""></a></h1>
                    <!-- ################################################################################################ -->
                </div>
                <nav id="mainav" class="fl_right">
                    <!-- ################################################################################################ -->
                    <ul class="clear">
                        <li class="active"><a href="<?= base_url(); ?>/">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?= base_url(); ?>/view/wisata" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                DESTINASI
                            </a>
                        </li>
                        <li><a class="" href="<?= base_url(); ?>/view/event">EVENT</a></li>
                        <li><a class="" href="<?= base_url(); ?>/view/artikel">ARTIKEL</a></li>
                        <li><a class="" href="<?= base_url(); ?>/view/marketplace">MARKETPLACE</a></li>
                    </ul>

                    <!-- ################################################################################################ -->
                </nav>

            </header>
            <!-- <nav class="py-1" style="background-color: #1CCAA1 !important;">
                <div class="container header2">
                    Marketplace
                </div>
            </nav> -->
        </div>
    </div>



    <!-- <script>
document.addEventListener("DOMContentLoaded", function() {
    window.addEventListener('scroll', function() {
        if (window.scrollY > 200) {
            document.getElementById('header').classList.add('fixed-top');
            // add padding top to show content behind navbar
            navbar_height = document.querySelector('.navbar').offsetHeight;
            document.body.style.paddingTop = navbar_height + 'px';
        } else {
            document.getElementById('header').classList.remove('fixed-top');
            // remove padding top from body
            document.body.style.paddingTop = '0';
        }
    });
});
    </script> -->

    <!-- </div> -->