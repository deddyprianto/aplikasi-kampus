 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-success  sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->

     <a class="sidebar-brand d-flex align-items-center justify-content-center" href=""><sup><i class="fas fa-3x fa-cross mt-4"></i><small></small></sup>
         <div class="sidebar-brand-icon rotate-n-15">

         </div>
         <div class="sidebar-brand-text mx-1">APLIKASI NHKBP HATOPAN</div>
         <sup><i class="fas fa-3x fa-cross mt-4"></i><small></small><small></small></sup>
     </a>

     <?php
        $datadalamsession = $this->session->userdata('role_id');

        $query = "SELECT 
                        `user_menu`.`id` , `menu`
                        FROM `user_menu` JOIN `user_access_menu`
                        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                        WHERE `user_access_menu`.`role_id` = $datadalamsession
                        ORDER BY `user_access_menu`.`menu_id`
                
                ";
        $menu = $this->db->query($query)->result_array();

        ?>

     <?php foreach ($menu as $m) : ?>

         <!-- Divider -->
         <hr class="sidebar-divider mt-3">

         <div class="sidebar-heading">
             <?= $m['menu']; ?>
         </div>

         <?php
            $Menu = $m['id'];
            $querySubMenu = "SELECT * FROM `user_sub_menu` 
                            WHERE `user_sub_menu`.`menu_id` = $Menu 
                        
                        ";
            $subMenu = $this->db->query($querySubMenu)->result_array();

            ?>
         <?php foreach ($subMenu as $sm) : ?>

             <!-- Nav Item - Dashboard -->
             <?php if ($sm['title'] == $judul) : ?>
                 <li class="nav-item active">
                 <?php else : ?>
                 <li class="nav-item">
                 <?php endif; ?>
                 <a class="nav-link pb-0" href=" <?= base_url($sm['url']); ?>">
                     <i class="<?= $sm['icons']; ?>"></i>
                     <span><?= $sm['title'] ?></span></a>

             </li>
         <?php endforeach; ?>

     <?php endforeach; ?>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <li class="nav-item ">

         <a class="nav-link tombol-keluar" href="<?= base_url('auth/logout'); ?>">

             <i class="fas fa-fw fa-sign-out-alt"></i>
             <span>Logout</span>
         </a>

     </li>
     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
