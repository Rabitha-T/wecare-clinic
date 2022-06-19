<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!--BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler"> </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>


            <li class="nav-item start <?php echo $menu == 'dashboard'?'active':'';?>">
                <a href="<?php echo site_url('dashboard');?>" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow <?php echo $menu == 'dashboard'?'open':'';?>"></span>
                </a>
            </li>



            <?php if( in_array( $this->session->userdata('group_id'), array(1)) ) { ?>

                <li class="nav-item start <?php echo $menu == 'users'?'active open':'';?>">
                    <a href="javascript:;" class="nav-link nav-toggle">

                        <i class="fa fa-users"></i>
                        <span class="title">Admin Users</span>
                        <span class="selected"></span>
                        <span class="arrow <?php echo $menu == 'users'?'open':'';?>"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item start <?php echo ($menu == 'users' && $submenu == 'list'?'active open':'');?>">
                            <a href="<?php echo site_url('users');?>" class="nav-link ">
                                <i class="icon-list"></i>
                                <span class="title">List</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="nav-item start <?php echo ($menu == 'users' && $submenu == 'add'?'active open':'');?>">
                            <a href="<?php echo site_url('users/create');?>" class="nav-link ">
                                <i class="icon-plus"></i>
                                <span class="title">Add New</span>
                            </a>
                        </li>
                        <li class="nav-item start <?php echo ($menu == 'users' && $submenu == 'profile'?'active open':'');?>">
                            <a href="<?php echo site_url('users/profile');?>" class="nav-link ">
                                <i class="icon-list"></i>
                                <span class="title">My Profile</span>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-item start <?php echo $menu == 'masters'?'active open':'';?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-eject"></i>
                        <span class="title">Masters</span>
                        <span class="selected"></span>
                        <span class="arrow <?php echo $menu == 'masters'?'open':'';?>"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item start <?php echo ($menu == 'masters' && $submenu == 'departments'?'active open':'');?>">
                            <a href="<?php echo site_url('departments');?>" class="nav-link ">
                                <i class="icon-list"></i>
                                <span class="title">Departments</span>
                                <span class="selected"></span>
                            </a>
                        </li>


                        <li class="nav-item start <?php echo ($menu == 'masters' && $submenu == 'symptoms'?'active open':'');?>">
                            <a href="<?php echo site_url('symptoms');?>" class="nav-link ">
                                <i class="icon-list"></i>
                                <span class="title">Symptoms </span>
                            </a>
                        </li>




                    </ul>
                </li>




                <li class="nav-item start <?php echo $menu == 'vendors'?'active':'';?>">
                    <a href="<?php echo site_url('vendors');?>" class="nav-link nav-toggle">
                        <i class="fa fa-users"></i>
                        <span class="title">Doctors</span>
                        <span class="selected"></span>
                        <span class="arrow <?php echo $menu == 'vendors'?'open':'';?>"></span>
                    </a>
                </li>



                <li class="nav-item start <?php echo $menu == 'user'?'active':'';?>">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="fa fa-users"></i>
                        <span class="title">Patients</span>
                        <span class="selected"></span>
                        <span class="arrow <?php echo $menu == 'user'?'open':'';?>"></span>
                    </a>
                </li>





            <?php } else { ?>

                <li class="nav-item start <?php echo $submenu == 'profile'?'active':'';?>">
                    <a href="<?php echo site_url('users/profile');?>" class="nav-link nav-toggle">
                        <i class="icon-user"></i>
                        <span class="title">My Profile</span>
                    </a>
                </li>
            <?php }?>

            <?php if( in_array( $this->session->userdata('group_id'), array(1)) ) { ?>



                <li class="nav-item start <?php echo $menu == 'settings'?'active open':'';?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">Settings</span>
                        <span class="selected"></span>
                        <span class="arrow <?php echo $menu == 'settings'?'open':'';?>"></span>
                    </a>

                    <ul class="sub-menu">

                        <li class="nav-item start <?php echo ($menu == 'settings' && $submenu == 'email'?'active open':'');?>">
                            <a href="<?php echo site_url('settings');?>" class="nav-link ">
                                <i class="icon-book-open"></i>
                                <span class="title">General</span>
                                <span class="selected"></span>
                            </a>
                        </li>



                        <li class="nav-item start <?php echo ($menu == 'settings' && $submenu == 'backup'?'active open':'');?>">
                            <a href="<?php echo site_url('settings/backup');?>" class="nav-link ">
                                <i class="fa fa-bug"></i>
                                <span class="title">Backup</span>
                                <span class="selected"></span>
                            </a>
                        </li>

                        <li class="nav-item start <?php echo ($menu == 'settings' && $submenu == 'emails'?'active open':'');?>">
                            <a href="<?php echo site_url('settings/templates');?>" class="nav-link ">
                                <i class="icon-envelope"></i>
                                <span class="title">Email Templates</span>
                            </a>
                        </li>


                    </ul>
                </li>

            <?php }?>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR-->