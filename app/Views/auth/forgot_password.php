    <?= $this->extend('auth/templates/index'); ?>
    <?= $this->section('content'); ?>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-password-image"></div> -->

                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img class="h4 login-img mb-4" src="/img/front/header-logo.png">
                                    </div>
                                    <?= view('Myth\Auth\Views\_message_block') ?>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Lupa Sandi?</h1>
                                        <p class="mb-4">Masukkan email akun anda</p>
                                    </div>
                                    <form action="<?= url_to('forgot') ?>" method="post">
                                        <?= csrf_field() ?>

                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                                name="email" aria-describedby="emailHelp"
                                                placeholder="<?=lang('Auth.email')?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.email') ?>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Reset Password
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small"
                                            href="<?= url_to('register') ?>"><?=lang('Auth.needAnAccount')?></a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small"
                                            href="<?= url_to('login') ?>"><?=lang('Auth.alreadyRegistered')?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <?= $this->endSection(); ?>