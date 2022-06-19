<!doctype html>
<html lang="zxx">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/bootstrap.min.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/owl.carousel.min.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/owl.theme.default.min.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/front_end/fonts/flaticon.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/boxicons.min.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/magnific-popup.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/animate.min.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/meanmenu.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/jquery-ui.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/nice-select.min.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/style.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/responsive.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/datepicker.min.css');?>">
      <!-- Theme Dark CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/front_end/css/theme-dark.css');?>">
      <title>Clinic | HOME</title>


       <?php if( isset($css_files)) { foreach( $css_files as $css ){ ?>
           <link href="<?php echo $css;?>" media="all" rel="stylesheet" type="text/css" />
       <?php }} ?>

       <script>var base_url = '<?php echo base_url();?>';</script>
       <script>var site_url = '<?php echo site_url();?>';</script>

   </head>
   <body>

     
      <div class="navbar-area">
         <div class="mobile-nav">
            <a href="index.php" class="logo">
            <img src="<?php echo base_url('files/media/no-image1.png');?>" alt="Logo">
            </a>
         </div>
         <div class="main-nav">
            <div class="container">
               <nav class="container-max navbar navbar-expand-md navbar-light ">
                  <a class="navbar-brand" href="index.php">
                  <img src="<?php echo base_url('files/media/no-image2.png');?>" alt="Logo">
                  </a>
                  <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                     <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                           <a href="<?php echo site_url();?>" class="<?php if ($current_page=="dashboard") {echo "active"; }?> nav-link">
                           Home
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="#"
                              class="<?php if ($current_page=="appointments") {echo "active"; }?> nav-link">
                               Appointments
                           </a>
                        </li>


                        <li class="nav-item">
                           <a href="#" class="<?php if ($current_page=="about") {echo "active"; }?> nav-link">
                           About Us
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="#" class="<?php if ($current_page=="contact") {echo "active"; }?> nav-link">
                           Contact Us
                           </a>
                        </li>
                     </ul>
                     <div class="side-nav d-in-line align-items-center">
                        <div class="side-item">
                           <div class="nav-add-btn">
                               <?php if ( !$this->session->userdata('patient_logged_in') ) { ?>
                              <a href="<?php echo site_url();?>" class="default-btn border-radius">
                              <i class="flaticon-contact"></i> Sign in / Register
                              </a>
                               <?php } else { ?>

                                   <a href="<?php echo site_url('patient-logout');?>" class="default-btn border-radius">
                                       <i class="flaticon-contact"></i> Logout
                                   </a>

                               <?php  }?>
                           </div>
                        </div>

                     </div>
                  </div>
               </nav>
            </div>
         </div>
         <div class="side-nav-responsive">
            <div class="container">
               <div class="dot-menu">
                  <div class="circle-inner">
                     <div class="circle circle-one"></div>
                     <div class="circle circle-two"></div>
                     <div class="circle circle-three"></div>
                  </div>
               </div>
               <div class="container">
                  <div class="side-nav-inner">
                     <div class="side-nav justify-content-center  align-items-center">
                        <div class="side-item">
                           <div class="search-box">
                              <i class="flaticon-loupe"></i>
                           </div>
                        </div>
                        <div class="side-item">
                           <div class="nav-add-btn">
                              <a href="#" class="default-btn border-radius">
                              <i class="flaticon-contact"></i> Sign in / Register
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- SEARCH POPUP SECTION -->
      <div class="search-overlay">
         <div class="d-table">
            <div class="d-table-cell">
               <div class="search-layer"></div>
               <div class="search-layer"></div>
               <div class="search-layer"></div>
               <div class="search-close">
                  <span class="search-close-line"></span>
                  <span class="search-close-line"></span>
               </div>
               <div class="search-form">
                  <form>
                     <input type="text" class="input-search" placeholder="Search here...">
                     <button type="submit"><i class="flaticon-loupe"></i></button>
                  </form>
               </div>
            </div>
         </div>
      </div>