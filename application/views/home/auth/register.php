    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <h1 class="wow fadeInUp" data-wow-delay=".2s">Create Account</h1>
                        <p class="text-light fs-1 fw-lighter pt-3 wow fadeInUp" data-wow-delay=".25s">to get started now!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->
    <!-- ====== Register Start ====== -->
    <section>
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-lg-6 ">
                    <div class="ud-login-logo text-center mb-3">
                        <h1><?= $title; ?></h1>
                    </div>
                    <form class="ud-login-form" action="<?= base_url('auth/register') ?>" method="post">
                        <div class="ud-form-group">
                            <label for="name" class="form-label float-start">Nama</label>
                            <input type="text" name="name" id="name" autofocus autocomplete="OFF" value="<?= set_value('name'); ?>" placeholder="Masukkan nama" />
                            <i class="text-danger fw-light">
                                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </i>
                        </div>
                        <div class="ud-form-group">
                            <label for="email" class="form-label float-start">Email</label>
                            <input type="email" name="email" id="email" autocomplete="OFF" value="<?= set_value('email'); ?>" placeholder="emailanda@gmail.com" />
                            <i class="text-danger fw-light">
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </i>
                        </div>
                        <div class="ud-form-group">
                            <label for="contact" class="form-label float-start">No Telepon</label>
                            <input type="text" name="contact" id="contact" autocomplete="OFF" value="<?= set_value('contact'); ?>" placeholder="081 234 679 101" />
                            <i class="text-danger fw-light">
                                <?= form_error('contact', '<small class="text-danger">', '</small>'); ?>
                            </i>
                        </div>
                        <div class="row">
                            <div class="col ud-form-group">
                                <label for="password" class="form-label float-start">Password</label>
                                <input type="password" name="password" id="password" placeholder="*********" />
                                <i class="text-danger fw-light">
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>

                                </i>
                            </div>
                            <div class="col-sm ud-form-group">
                                <label for="password2" class="form-label float-start">Konfirmasi Password</label>
                                <input type="password" name="password2" id="password2" placeholder="*********" />
                                <i class="text-danger fw-light">
                                    <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                </i>
                            </div>
                        </div>
                        <div class="ud-form-group">
                            <button type="submit" class="ud-main-btn w-100">Daftar Sekarang</button>
                        </div>

                    </form>
                    <div class="text-center">
                        <p class="signup-option">
                            Sudah Memiliki Akun? <a href="<?= base_url('auth') ?>">Masuk Sekarang</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Register End ====== -->