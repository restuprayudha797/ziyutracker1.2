<!-- ====== Banner Start ====== -->
<section class="ud-page-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ud-banner-content">
                    <h1>Selamat Datang👋</h1>
                    <p class="text-light fs-1 fw-lighter pt-3">Senang melihat Anda!

                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== Banner End ====== -->
<!-- ====== Login Start ====== -->
<section>
    <?= $this->session->userdata('email') ?>
    
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-lg-4">
                <div class="ud-login-logo text-center mb-3">
                    <h1><?= $title; ?></h1>
                </div>
                <?= $this->session->flashdata('auth_message'); ?>

                <form class="ud-login-form" action="<?= base_url('login') ?>" method="post">
                    <div class="ud-form-group">
                        <label for="email" class="form-label float-start">Email</label>
                        <input type="email" autofocus autocomplete="OFF" name="email" id="email" value="<?= set_value('email'); ?>" placeholder="example@gmail.com" required />
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

                    </div>
                    <div class="ud-form-group">
                        <label for="password" class="form-label float-start">Password</label>
                        <input type="password" name="password" id="password" placeholder="*********" required />
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="ud-form-group">
                        <button type="submit" class="ud-main-btn w-100">Login</button>
                    </div>
                </form>
                <div class="text-center ">
                    <a class="forget-pass" href="<?= base_url('auth/forgetPass') ?>">
                        Lupa kata sandi ?
                    </a>
                    <p class="signup-option">
                        Tidak punya akun ? <a href="<?= base_url('register') ?>">Daftar akun baru</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== Login End ====== -->