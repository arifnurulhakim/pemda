<?= $this->extend('views/front-templates/index'); ?>

<?= $this->section('content'); ?>
<div class="overlay">
    <div id="breadcrumb" class="hoc clear">
        <!-- ################################################################################################ -->
        <h6 class="heading heading-top">Event</h6>
        <br>
        <ul>
            <li class="heading-top">Event seputar Kota Baubau dan sekitarnya</li>
        </ul>
        <!-- ################################################################################################ -->
    </div>
</div>


<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="content">
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <p class="heading underline font-x2"><?= $event['nama_event']; ?></p>
            </div>
            <section class="group">
                <div class="one_half first"><img class="inspace-15 borderedbox"
                        src="/img/event/<?= $event['gambar_event']; ?>" alt=""></div>
                <div class="one_half">
                    <ul class="nospace group inspace-15">
                        <li>
                            <article>
                                <table>
                                    <div class="scrollable">
                                        <tr>
                                            <td>
                                                <p> Deskripsi : <?= $event['deskripsi_event']; ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Lokasi : <?= $event['lokasi_event']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Rating : </td>
                                        </tr>
                                    </div>
                                </table>

                            </article>
                        </li>
                    </ul>
                </div>
            </section> <br> <br>
            <!-- ################################################################################################ -->
            <hr class="btmspace-80">
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->

        </div>
        <!-- ################################################################################################ -->
        <div id="comments">
            <h2>Comments</h2>
            <ul>
                <li>
                    <article>
                        <header>
                            <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                            <address>
                                By <a href="#">A Name</a>
                            </address>
                            <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045
                                @08:15:00</time>
                        </header>
                        <div class="comcont">
                            <p>This is an example of a comment made on a post. You can either edit the comment,
                                delete the comment or reply to the comment. Use this as a place to respond to the
                                post or to share what you are thinking.</p>
                        </div>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                            <address>
                                By <a href="#">A Name</a>
                            </address>
                            <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045
                                @08:15:00</time>
                        </header>
                        <div class="comcont">
                            <p>This is an example of a comment made on a post. You can either edit the comment,
                                delete the comment or reply to the comment. Use this as a place to respond to the
                                post or to share what you are thinking.</p>
                        </div>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                            <address>
                                By <a href="#">A Name</a>
                            </address>
                            <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045
                                @08:15:00</time>
                        </header>
                        <div class="comcont">
                            <p>This is an example of a comment made on a post. You can either edit the comment,
                                delete the comment or reply to the comment. Use this as a place to respond to the
                                post or to share what you are thinking.</p>
                        </div>
                    </article>
                </li>
            </ul>
            <h2>Write A Comment</h2>
            <form action="#" method="post">
                <div class="one_third first">
                    <label for="name">Name <span>*</span></label>
                    <input type="text" name="name" id="name" value="" size="22" required>
                </div>
                <div class="one_third">
                    <label for="email">Mail <span>*</span></label>
                    <input type="email" name="email" id="email" value="" size="22" required>
                </div>
                <div class="one_third">
                    <label for="url">Website</label>
                    <input type="url" name="url" id="url" value="" size="22">
                </div>
                <div class="block clear">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment" id="comment" cols="25" rows="10"></textarea>
                </div>
                <div>
                    <input type="submit" name="submit" value="Submit Form">
                    &nbsp;
                    <input type="reset" name="reset" value="Reset Form">
                </div>
            </form>
        </div>
        <!-- ################################################################################################ -->
</div>


<?= $this->endSection(); ?>