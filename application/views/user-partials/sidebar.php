 <!-- Horizontal-menu -->
 <div class="horizontal-main hor-menu clearfix">
   <div class="horizontal-mainwrapper container clearfix">
     <nav class="horizontalMenu clearfix">
       <ul class="horizontalMenu-list">

         <?php

          // get user_active
          $user_active_data = $this->db->get_where('user_active', ['email' => $user['email']])->result_array();
          ?>

         <li aria-haspopup="true"><a href="<?= base_url('dashboard') ?>" class="sub-icon"><img src="<?= base_url('assets/root/icon/dashboard.png') ?>" alt="" width="20px"> Dashboard </a>
         </li>
         <?php if (count($user_active_data) == 1) : ?>
           <li aria-haspopup="true"><a href="<?= base_url('lokasi') ?>" class="sub-icon"><img src="<?= base_url('assets/root/icon/maps.png') ?>" alt="" width="20px">
               Lokasi</a>
           </li>
           <li aria-haspopup="true"><a href="<?= base_url('saklar') ?>" class="sub-icon"><img src="<?= base_url('assets/root/icon/switch.png') ?>" alt="" width="20px"> Saklar </a>
           </li>
         <?php else :  ?>

           <li aria-haspopup="true"><a class="sub-icon "><img src="<?= base_url('assets/root/icon/switch.png') ?>" alt="" width="20px"> Lokasi <i class="fa fa-angle-down horizontal-icon"></i></a>
             <ul class="sub-menu">
               <?php foreach ($user_active_data as $row) : ?>
                 <li aria-haspopup="true"><a href="<?= base_url('lokasi/' . $row['id_active']) ?>" class="slide-item"><?= $row['device_name'] ?>
                 </a></li>
               <?php endforeach ?>

             </ul>
           </li>

         <?php endif ?>

         <li aria-haspopup="true"><a href="widgets.html" class=""><img src="<?= base_url('assets/root/icon/resume.png') ?>" alt="" width="20px"> Profile</a></li>

     </nav>
     <!--Nav end -->
   </div>
 </div>
 <!-- Horizontal-menu end -->