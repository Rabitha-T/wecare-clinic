<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo $core_settings->site_name;?> | <?php echo $page_title;?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta name="google-site-verification" content="wOqC_3uOvC_g2jm9KXLUGyQmTrebUkbKhzKyOrWpfic" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/uniform/css/uniform.default.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url('assets/global/css/components-rounded.min.css');?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url('assets/global/css/plugins.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url('assets/layouts/layout/css/layout.min.css?ver=1.0.0');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/layouts/layout/css/themes/grey.min.css');?>" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url('assets/layouts/layout/css/custom.min.css?ver=1.0.1');?>" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url('assets/global/plugins/select2/css/select2.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/select2/css/select2-bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <?php if( isset($css_files)) { foreach( $css_files as $css ){ ?>
            <link href="<?php echo $css;?>" media="all" rel="stylesheet" type="text/css" />
        <?php }} ?>
        <link rel="shortcut icon" href="favicon.ico" /> 
        <link rel="icon" type="image/png" href="<?php echo base_url('assets/favicon.png');?>">
        
        <script>var base_url = '<?php echo base_url();?>';</script>
        <script>var site_url = '<?php echo site_url();?>';</script>
        
        <style>
            .our-agent-single:first-child{padding: 5px 60px; background: #33bf5c;}
        	.single_property_title *{color: #fff !important; margin-bottom: 5px;}
        	.single_property_title1 *{color: #0168ab !important; margin-bottom: 5px;}
        	.single_property_title1{border-bottom: 1px solid #33bf5c; margin-bottom: 8px !important;}
        	.single_property_title1 h2{font-size: 20px !important;}
        	.single_property_title{margin: 5px !important;}
        	.single_property_title h2{font-size: 18px !important;}
        	.single_property_title P{font-size: 15px !important;}
        	.single_property_social_share{margin-top: -10px !important;}
        	.single_property_social_share .price *{color: #fff !important;}
        	.propertDetailsTitle{border-bottom: 1px solid #ccc !important;}
        	.listing_single_description {
        		background-color: rgb(255, 255, 255);
        		border: 1px solid rgb(235, 235, 235);
        		border-radius: 8px 8px 0 0;
        		padding: 10px;
        	} 
        	h2.priceTag{padding: 10px 15px; background: #33bf5c; color: #fff; border-radius:6px; font-size: 16px !important;
        		margin-bottom: 0px !important;	
        	}
        	h2.priceTag *{color: #fff;}
        	
        	@media screen and (max-width: 768px){
        		.our-agent-single:first-child {
        			padding: 5px 30px;
        			background: #33bf5c;
        		}	
        	}
        	
        	
        	
        	.form-control{border: 1px solid #efefef !important;}
        	.headerWhite header.header-nav.menu_style_home_one ul.ace-responsive-menu li.add_listing {
                background-color: #0168ab !important;
                border-radius: 25px;
                height: 50px;
                position: relative;
                text-align: center;
                vertical-align: middle;
                width: 180px;
            }
            .headerWhite header.header-nav.menu_style_home_one a.navbar_brand {
                margin-top: 15px !important;
            }
            .headerWhite header.header-nav.menu_style_home_one ul.ace-responsive-menu li.add_listing a {
                font-family: "Nunito";
                color: #fff !important;
                line-height: 1.2;
                top: -24px;
            }
            .headerWhite header.header-nav.menu_style_home_one .ace-responsive-menu li a {
                color: #0168ab !important;
            }
            .headerWhite header.header-nav.menu_style_home_one .ace-responsive-menu li a:hover {
                color: #33bf5c !important;
            }
    		.buyType{display: none !important;}
    		.homeStickySearch-sticky{ z-index: 9999 !important; position:fixed; top: 93px !important; left:0;
    			background: #fff !important;
    			width: 100% !important;
    			padding: 2px 40px !important;
    		}
    		.home1-advnc-search ul li:first-child .form-control {
    			background-color: #ffffff;
    			border: 1px solid #ebebeb;
    			border-radius: 8px;
    			font-size: 14px;
    			color: #484848;
    			line-height: 1.2;
    			height: 50px;
    			width: 100% !important;
    		}
    		.home1-advnc-search ul li .form-group {
    			margin-bottom: 0;
    			width: 100% !important;
    		}
    		.homeStickySearch-sticky{border-top: 1px solid #efefef; box-shadow: 0 5px 10px -2px rgba(0,0,0,0.1);}
    		.homeStickySearch-sticky .form-group{margin: 0px 0;}
    		.homeStickySearch-sticky .h1ads_1st_list li:nth-child(1){width: 10% !important;}
    		.homeStickySearch-sticky .h1ads_1st_list li:nth-child(2){width: 20% !important;}
    		.homeStickySearch-sticky .h1ads_1st_list li:nth-child(3){width: 20% !important;}
    		.homeStickySearch-sticky .h1ads_1st_list li:nth-child(4){width: 20% !important;}
    		.homeStickySearch-sticky .h1ads_1st_list li:nth-child(5){width: 15% !important;}
    		.homeStickySearch-sticky .h1ads_1st_list li:nth-child(6){width: 10% !important;}
    		/*.homeStickySearch-sticky{display: block; z-index: 9999 !important; position:fixed; top: 200px !important; left:0;}*/
    		.home1-advnc-search .h1ads_1st_list li input[type=text] {width: 100% !important;}
    		.home1-advnc-search .h1ads_1st_list li select {width: 100% !important;}
    		.home1-advnc-search .h1ads_1st_list li .btn {width: 100% !important;}
    		.home1-advnc-search .h1ads_1st_list li .small_dropdown2 {width: 100% !important;}
    		
    		.home1-advnc-search .h1ads_1st_list li:nth-child(1){width: 25% !important;}
    		.home1-advnc-search .h1ads_1st_list li:nth-child(2){width: 22% !important;}
    		.home1-advnc-search .h1ads_1st_list li:nth-child(3){width: 20% !important;}
    		.home1-advnc-search .h1ads_1st_list li:nth-child(4){width: 18% !important;}
    		.home1-advnc-search .h1ads_1st_list li:nth-child(5){width: 10% !important;}
    		.fp_meta .propic40{width: 40px !important; height: 40px !important;}
    		.propic40{width: 40px !important; height: 40px !important;}
    		ul.browseDistrictWise li{width: auto !important; float:left; margin-bottom:5px; margin-right:5px;}
    		ul.browseDistrictWise li a{padding: 3px 5px; /*border: 1px solid #ccc;*/ font-size: 13px; 
    			background: #33bf5c; color: white;
    		}
    		ul.browseDistrictWise li a:hover{padding: 3px 5px; /*border: 1px solid #ccc;*/ font-size: 13px; 
    			background: #007bff; color: white;
    		}
    		@media screen and (max-width: 768px){
    			.homeStickySearch-sticky{display: none !important;}
    			.home1-advnc-search .h1ads_1st_list li:nth-child(1){width: 100% !important;}
    			.home1-advnc-search .h1ads_1st_list li:nth-child(2){width: 100% !important; margin-bottom: 12px !important;}
    			.home1-advnc-search .h1ads_1st_list li:nth-child(3){width: 100% !important;}
    			.home1-advnc-search .h1ads_1st_list li:nth-child(4){width: 100% !important; margin-bottom: 10px !important;}
    			.home1-advnc-search .h1ads_1st_list li:nth-child(5){width: 100% !important;}
    			.home_adv_srch_opt{display: block !important;}
    		}
        	
        	
        	
        	section {
        		padding: 20px 0 !important;
        		position: relative;
        	}
        	.breadcrumb_content.style2 {
        		margin-bottom: 10px;
        	}
        	#open.flaticon-filter-results-button:before, #open.flaticon-close:before, #open2.flaticon-filter-results-button:before, #open2.flaticon-close:before {
        		background-color: #33bf5c;
        		left: 0;
        		position: absolute;
        		width: 48px;
        	}
        	.homeStickySearch-sticky{border-top: 1px solid #efefef; box-shadow: 0 5px 10px -2px rgba(0,0,0,0.1); position:relative !important;}
        	.homeStickySearch-sticky .form-group{margin: 0px 0;}
        	.homeStickySearch-sticky .h1ads_1st_list li:nth-child(1){width: 10% !important;}
        	.homeStickySearch-sticky .h1ads_1st_list li:nth-child(2){width: 20% !important;}
        	.homeStickySearch-sticky .h1ads_1st_list li:nth-child(3){width: 20% !important;}
        	.homeStickySearch-sticky .h1ads_1st_list li:nth-child(4){width: 20% !important;}
        	.homeStickySearch-sticky .h1ads_1st_list li:nth-child(5){width: 15% !important;}
        	.homeStickySearch-sticky .h1ads_1st_list li:nth-child(6){width: 10% !important;}
        	
        	.homeStickySearch-sticky {
        		z-index: 9999 !important;
        		position: fixed;
        		top: 85px !important;
        		left: 0;
        		width: 100%;
        		background: #fff !important;
        	}
        	
        	.fp_meta .propic40{width: 40px !important; height: 40px !important;}
        	.propic40{width: 40px !important; height: 40px !important;}
        	ul.browseDistrictWise li{width: auto !important; float:left; margin-bottom:5px; margin-right:5px;}
        	ul.browseDistrictWise li a{padding: 3px 5px; /*border: 1px solid #ccc;*/ font-size: 13px; 
        		background: #33bf5c; color: white;
        	}
        	ul.browseDistrictWise li a:hover{padding: 3px 5px; /*border: 1px solid #ccc;*/ font-size: 13px; 
        		background: #007bff; color: white;
        	}
        	@media screen and (max-width: 768px){
        		.homeStickySearch-sticky{display: none !important;}
        		.home1-advnc-search .h1ads_1st_list li:nth-child(1){width: 100% !important;}
        		.home1-advnc-search .h1ads_1st_list li:nth-child(2){width: 100% !important; margin-bottom: 12px !important;}
        		.home1-advnc-search .h1ads_1st_list li:nth-child(3){width: 100% !important;}
        		.home1-advnc-search .h1ads_1st_list li:nth-child(4){width: 100% !important; margin-bottom: 10px !important;}
        		.home1-advnc-search .h1ads_1st_list li:nth-child(5){width: 100% !important;}
        		.home_adv_srch_opt{display: block !important;}
        	}
        	
        	.footer_middle_area{padding-top: 15px !important; padding-bottom: 15px !important;}
        </style>
        
   </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo site_url('dashboard');?>">
                        <img src="<?php echo base_url('files/media/'.$core_settings->header_logo);?>"
                             alt="<?php echo $core_settings->site_name;?>" class="logo-default" style=" margin:0;" /> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                       
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            	<?php if( $this->user->image && file_exists( './files/profile/'.$this->user->id.'/'.$this->user->image ) ) {?>
                                <img alt="" class="img-circle" src="<?php echo base_url('files/profile/'.$this->user->id.'/'.$this->user->image);?>" />
                                <?php } else {?>
                                <img alt="" class="img-circle" src="<?php echo base_url('assets/front_end/images/propic.png');?>" />
                                <?php }?>
                                <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata('username');?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo site_url('users/profile');?>">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('logout');?>">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-quick-sidebar-toggler"> 
                            <a href="<?php echo site_url('logout');?>" class="dropdown-toggle" title="Log Out">
                                <i class="icon-logout"></i>
                            </a>
                        </li>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">