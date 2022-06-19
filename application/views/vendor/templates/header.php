<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ansonika">
      <title>Clinic | HOME</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url('assets/vendor/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
  <!-- Main styles -->
  <link href="<?php echo base_url('assets/vendor/css/admin.css');?>" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="<?php echo base_url('assets/vendor/vendor/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
  <!-- Plugin styles -->
  <link href="<?php echo base_url('assets/vendor/vendor/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="<?php echo base_url('assets/vendor/css/custom.css');?>" rel="stylesheet">
<!--   <link href="--><?php //echo base_url('assets/vendor/vendor/dropzone.css');?><!--" rel="stylesheet">-->
     <!-- Plugin styles -->
  <link href="<?php echo base_url('assets/vendor/vendor/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet">
  <!-- WYSIWYG Editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/js/editor/summernote-bs4.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/fonts/flaticon.css');?>">
    <link href="<?php echo base_url('assets/vendor/vendor/animate.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/vendor/magnific-popup.css');?>" rel="stylesheet">

    <?php if( isset($css_files)) { foreach( $css_files as $css ){ ?>
        <link href="<?php echo $css;?>" media="all" rel="stylesheet" type="text/css" />
    <?php }} ?>

    <script>var base_url = '<?php echo base_url();?>';</script>
    <script>var site_url = '<?php echo site_url();?>';</script>

</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="dashboard.php">
        <img src="<?php echo base_url('files/media/no-image1.png');?>" alt="" width="150" height="36"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="<?php if ($current_page=="dashboard") {echo "active"; }?> nav-link" href="<?php echo site_url('vendors-dashboard'); ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
          <a class="<?php if ($current_page=="profile") {echo "active"; }?>

          nav-link" href="<?php echo site_url('vendors-profile');?>">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">My Profile</span>
          </a>
        </li>

          <?php if($this->vendor->is_approved == 1 ){ ?>

                <?php /*<li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                  <a class="<?php if ($current_page=="packages") {echo "active"; }?> nav-link"
                     href="<?php echo site_url('vendors-packages'); ?>">
                    <i class="fa fa-fw fa-graduation-cap"></i>
                    <span class="nav-link-text">Packages</span>
                  </a>
                </li>



                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
                  <a class="<?php if ($current_page=="calendar") {echo "active"; }?> nav-link" href="calendar.php">
                    <i class="fa fa-fw fa-calendar-check-o"></i>
                    <span class="nav-link-text">Calendar</span>
                  </a>
                </li>  */?>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Bookings">
                  <a class="<?php if ($current_page=="bookings") {echo "active"; }?> nav-link" href="bookings.php">
                    <i class="fa fa-fw fa-file-pdf-o"></i>
                    <span class="nav-link-text">Bookings <span class="badge badge-pill badge-primary">16 New</span></span>
                  </a>
                </li>



          <?php } ?>
      
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add listing">
          <a class="nav-link" href="<?php echo site_url('vendor/auth/logout');?>">
            <i class="fa fa-fw fa-sign-out"></i>
            <span class="nav-link-text">Logout</span>
          </a>
        </li>
      
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">


        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('vendor/auth/logout');?>"  >
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-user"></i>Back to Website</a>
        </li>
      </ul>
    </div>
  </nav>