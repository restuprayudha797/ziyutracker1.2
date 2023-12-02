<!-- Top-header opened -->
<div class="header-main header sticky">
    <div class="app-header header top-header navbar-collapse ">
        <div class="container">
            <a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a><!-- sidebar-toggle-->
            <div class="d-flex">
                <a class="header-brand" href="index.html">
                    <img src="<?= base_url('front_ass') ?>/icon/ziyutracker.png" class="header-brand-img desktop-logo " alt="Dashlot logo" width="400px=">
                </a>
                <div class="d-flex header-right ml-auto">
                    <div class="dropdown header-fullscreen">
                        <a class="nav-link icon full-screen-link" id="fullscreen-button">
                            <i class="mdi mdi-arrow-collapse fs-20"></i>
                        </a>
                    </div><!-- Fullscreen -->
                    <div class="dropdown d-md-flex message">
                        <a class="nav-link icon" data-toggle="dropdown">
                            <i class="typcn typcn-messages"></i>
                            <span class="badge badge-secondary pulse-secondary">1</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animated bounceInDown dropdown-menu-arrow">
                            <div class="dropdown-header bg-header-image text-white w-300 p-5 mb-2">
                                <h5 class="dropdown-title mb-1 font-weight-semibold text-drak">Messages</h5>
                                <p class="dropdown-title-text subtext mb-0 pb-0 fs-13 ">Anda memiliki 1 pesan</p>
                            </div>
                            <div class="drop-scroll">
                                <a href="#" class="p-3 d-flex border-bottom">
                                    <div class="avatar avatar-md  mr-3 d-block cover-image brround default-shadow" data-image-src="<?= base_url('front_ass') ?>/icon/logotrack.png">
                                        <span class="avatar-status bg-success"></span>
                                    </div>
                                    <div class="w-80">
                                        <div class="d-flex">
                                            <h5 class="mb-2">Administrator</h5>
                                            <i class="fa fa-circle-thin text-right ml-auto fs-10 text-success float-right"></i>
                                        </div>
                                        <p class="mb-1">Selamat datang <?= $user['name'] ?></p>
                                        <span class="font-weight-normal fs-13 text-muted"><?= date('d-m, Y', time()) ?></span>
                                    </div>
                                </a>

                            </div>
                            <div class="dropdown-divider mb-0 mt-0"></div>
                            <!-- <a href="#" class="dropdown-item text-center p-3">See all Messages</a> -->
                        </div>
                    </div><!-- Message-box -->
                    <div class="dropdown drop-profile">
                        <a class="nav-link pr-0 leading-none" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile-details mt-1">
                                <span class="mr-3 mb-0  fs-15 font-weight-semibold">Ziyu Tracker</span>
                                <small class="text-muted mr-3"><b><?= $user['name'] ?></small>
                            </div>
                            <img class="avatar avatar-md brround" src="<?= base_url('front_ass') ?>/icon/user_default.png" alt="image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated bounceInDown w-auto">
                            <div class="user-profile bg-header-image border-bottom p-3">
                                <div class="user-image text-center">
                                    <img class="user-images" src="<?= base_url('front_ass') ?>/icon/user_default.png" alt="image">
                                </div>
                                <div class="user-details text-center">
                                    <h4 class="mb-0"><?= $user['name'] ?></h4>
                                    <p class="mb-1 fs-13 text-white-50"><?= $user['email'] ?></p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-icon mdi mdi-account-outline "></i> Profile <i class="badge badge-warning text-dark">Segera</i>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-icon mdi mdi-whatsapp "></i> Tanya Admin ?
                            </a>
                            <a class="dropdown-item" href="<?= base_url('#faq') ?>">
                                <i class="dropdown-icon mdi mdi-compass"></i> Butuh bantuan?
                            </a>
                            <a class="dropdown-item mb-1" href="<?= base_url('keluar') ?>">
                                <i class="dropdown-icon mdi  mdi-logout-variant"></i> Keluar
                            </a>
                        </div>
                    </div><!-- Profile -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top-header closed -->