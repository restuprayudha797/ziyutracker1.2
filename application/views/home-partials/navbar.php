  <!-- ====== Header Start ====== -->
  <header class="ud-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg">
            <a class="" href="<?= base_url('home') ?>">
              <img class="py-3" src="https://tracker.ziyutechno.com/front_ass/icon/ziyutracker.png" alt="Logo" width="130px" />

            </a>
            <!-- Hamburger -->
            <button class="navbar-toggler">
              <span class="toggler-icon"> </span>
              <span class="toggler-icon"> </span>
              <span class="toggler-icon"> </span>
            </button>
            <!-- End Hamburger -->

            <div class="navbar-collapse">
              <ul id="nav" class="navbar-nav mx-auto">
                <?php if ($title == 'Masuk' || $title == 'Informasi Pembayaran') : ?>
                  <li class="nav-item">
                    <a class="" href="<?= base_url('beranda/') ?>">Beranda</a>
                  <li class="nav-item">
                    <a class="" href="<?= base_url('beranda/') ?>#features">Fitur</a>
                  </li>
                  <li class="nav-item">
                    <a class="" href="<?= base_url('beranda/') ?>#pricing">Langganan</a>
                  </li>
                  <li class="nav-item">
                    <a class="" href="<?= base_url('beranda/') ?>#faq">FAQ</a>
                  </li>
                  <li class="nav-item">
                    <a class="" href="<?= base_url('beranda/') ?>#team">Developer </a>
                  </li>
                  <li class="nav-item">
                    <a class="" href="<?= base_url('beranda/') ?>#contact">Kontak</a>
                  </li>
                  <li class="d-flex align-items-center">
                    <?php if ($this->session->userdata('email')) : ?>
                      <a class="btn btn-danger" href="<?= base_url('logout') ?>">
                        Keluar
                      </a>
                    <?php endif ?>
                  </li>

                <?php else : ?>

                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#home">Beranda</a>
                  </li>
                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#features">Fitur</a>
                  </li>
                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#pricing">Langganan</a>
                  </li>
                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#faq">FAQ</a>
                  </li>
                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#team">Developer </a>
                  </li>
                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#contact">Kontak</a>
                  </li>
                  <li class="d-flex align-items-center">
                    <?php if ($this->session->userdata('email')) : ?>
                      <a class="btn btn-primary" href="<?= base_url('login') ?>">
                        Dashboard
                      </a>
                      <a class="btn btn-danger" href="<?= base_url('logout') ?>">
                        Keluar
                      </a>
                    <?php else : ?>
                      <a class="btn btn-primary" href="<?= base_url('login') ?>">
                        Masuk
                      </a>
                    <?php endif ?>

                  </li>

                <?php endif; ?>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ====== Header End ====== -->