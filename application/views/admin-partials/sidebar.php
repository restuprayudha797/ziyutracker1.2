 <!-- Horizontal-menu -->
 <div class="horizontal-main hor-menu clearfix">
   <div class="horizontal-mainwrapper container clearfix">
     <nav class="horizontalMenu clearfix">
       <ul class="horizontalMenu-list">

         <?php if ($user['is_active'] == 3) : ?>


           <li aria-haspopup="true"><a href="<?= base_url('dashboard') ?>" class="sub-icon"><img src="<?= base_url('assets/root/icon/dashboard.png') ?>" alt="" width="20px"> Dashboard </a>
           </li>
           <li aria-haspopup="true"><a href="<?= base_url('lokasi') ?>" class="sub-icon"><img src="<?= base_url('assets/root/icon/maps.png') ?>" alt="" width="20px">
               Lokasi</a>
           </li>
           <li aria-haspopup="true"><a href="<?= base_url('saklar') ?>" class="sub-icon"><img src="<?= base_url('assets/root/icon/switch.png') ?>" alt="" width="20px"> Saklar </a>
           </li>
           <li aria-haspopup="true"><a href="widgets.html" class=""><img src="<?= base_url('assets/root/icon/resume.png') ?>" alt="" width="20px"> Profile</a></li>
         <?php endif ?>


         <?php if ($user['is_active'] == 5) : ?>

           <li aria-haspopup="true"><a href="<?= base_url('dashboard') ?>" class="sub-icon"><img src="<?= base_url('assets/root/icon/dashboard.png') ?>" alt="" width="20px"> Dashboard </a>
           </li>
           <li aria-haspopup="true"><a href="<?= base_url('data-user') ?>" class="sub-icon"><img src="<?= base_url('assets/root/icon/switch.png') ?>" alt="" width="20px"> Users </a>
           </li>
           <li aria-haspopup="true"><a href="<?= base_url('aktifasi-user') ?>" class="sub-icon"><img src="<?= base_url('assets/root/icon/switch.png') ?>" alt="" width="20px"> Users Aktifasi </a>
           </li>
           <li aria-haspopup="true"><a href="<?= base_url('aktifasi-user') ?>" class="sub-icon"><img src="<?= base_url('assets/root/icon/switch.png') ?>" alt="" width="20px"> Pembayaran </a>
           </li>
         <?php endif ?>

     </nav>
     <!--Nav end -->
   </div>
 </div>
 <!-- Horizontal-menu end -->