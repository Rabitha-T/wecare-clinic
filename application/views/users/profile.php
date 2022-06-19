<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo site_url();?>">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>   
                    <span>Profile</span>
                </li>
            </ul>
        </div>

        <h3 class="page-title"> User Profile </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="profile-sidebar">
                    <!-- PORTLET MAIN -->
                    <div class="portlet light profile-sidebar-portlet ">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic">
                            <?php
                            if( $row['image'] && file_exists(getcwd().'/files/profile/'.$row['id'].'/'.$row['image'])) {?>
                            
                            <img src="<?php echo base_url('files/profile/'.$row['id'].'/'.$row['image']);?>" class="img-responsive" alt="">
                            <?php } else {?>
                                <img src="<?php echo base_url('assets/global/img/noimage.png');?>" class="img-responsive" alt="">
                            <?php }?> 
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name"> <?php echo $row['first_name'].' '.$row['last_name'];?> </div>                            
                        </div>
                    </div>
                </div>
                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-12">

                            <?php if($this->session->flashdata('msg')){?>   
                                <div class="alert alert-success">
                                    <button class="close" data-close="alert"></button>
                                    <span><?php echo $this->session->flashdata('msg');?></span>
                                </div>
                            <?php }?>
                            
                            <?php if($this->session->flashdata('error_msg')){?>   
                                <div class="alert alert-danger">
                                    <button class="close" data-close="alert"></button>
                                    <span><?php echo strip_tags($this->session->flashdata('error_msg'));?></span>
                                </div>
                            <?php }?>
                            
                            <div class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption caption-md">
                                        <i class="icon-globe theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li id="personal_info" <?php echo $tab ==  'personal'? 'class="active"': '';?> >
                                            <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                        </li>
                                        <li id="profile_pic" <?php echo $tab ==  'profile_pic'? 'class="active"': '';?> >
                                            <a href="#tab_1_2" data-toggle="tab">Change Profile Picture</a>
                                        </li>
                                        <li id="user_password"  <?php echo $tab ==  'password'? 'class="active"': '';?>>
                                            <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                        </li>
                                        <!-- <li>
                                            <a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <!-- PERSONAL INFO TAB -->
                                        
                                            <div class="tab-pane <?php echo $tab ==  'personal'? 'active': '';?>" id="tab_1_1">
                                            <form role="form" class="" method="post" enctype="multipart/form-data">    
                                                <div class="form-group <?php echo form_error('email')?'has-error':'';?>">
                                                    <label class="control-label" for="email">Email<span class="required" aria-required="true"> * </span></label>
                                                    <input type="text" name="email" placeholder="Email" id="email" class="form-control" value="<?php echo $row['email'];?>"> 
                                                        <?php echo form_error('email');?>
                                                </div>  
                                                
                                                <div class="form-group <?php echo form_error('first_name')?'has-error':'';?>">
                                                    <label class="control-label" for="first_name">Company Name<span class="required" aria-required="true"> * </span></label>
                                                        <input type="text" name="first_name" placeholder="Company Name" id="first_name" class="form-control" value="<?php echo $row['first_name'];?>">
                                                        <?php echo form_error('first_name');?>
                                                </div>

                                                
                                                <div class="form-group <?php echo form_error('phone')?'has-error':'';?>">
                                                    <label class="control-label" for="phone">Phone<?php if( $this->session->userdata('group_id') == 2 ){?><span class="required" aria-required="true"> * </span><?php }?></label>
                                                        <input type="text" name="phone" placeholder="Phone" id="phone" class="form-control" value="<?php echo $row['phone'];?>"> 
                                                        <?php echo form_error('phone');?>
                                                </div>
                                                
                                                <div class="margiv-top-10">
                                                    <button class="btn green-meadow" name="personal_info" type="submit">Save Changes</button>
                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                </div>
                                            </form>    
                                            </div>
                                        
                                        <!-- END PERSONAL INFO TAB -->
                                        <!-- CHANGE AVATAR TAB -->
                                        
                                            <div class="tab-pane <?php echo $tab ==  'profile_pic'? 'active': '';?>" id="tab_1_2">
                                                 <form role="form" class="" method="post" enctype="multipart/form-data">   
                                                    <div class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

                                                            <?php
                                                            if( $row['image'] && file_exists(getcwd().'/files/profile/'.$row['id'].'/'.$row['image'])) {?>
                                                            
                                                            <img src="<?php echo base_url('files/profile/'.$row['id'].'/'.$row['image']);?>" >
                                                            <?php } else {?>
                                                                <img src="<?php echo base_url('assets/global/img/noimage.png');?>" >
                                                            <?php }?>

                                                                
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> 
                                                            </div>

                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="image" id="image"> 
                                                                </span>
                                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="margin-top-10">
                                                        <button class="btn green-meadow" name="profile_pic" type="submit">Save</button>
                                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                                    </div>

                                                </form>   
                                            </div>
                                        
                                        <!-- END CHANGE AVATAR TAB -->
                                        <!-- CHANGE PASSWORD TAB -->

                                        <div class="tab-pane <?php echo $tab ==  'password'? 'active': '';?>" id="tab_1_3">
                                            <form role="form" class="" method="post" enctype="multipart/form-data">
                                                
                                                <div class="form-group <?php echo form_error('new_password')?'has-error':'';?>">
                                                    <label class="control-label">New Password</label>
                                                    <input type="password" name="new_password" class="form-control" value="<?php echo $row['new_password'];?>"/> 
                                                    <?php echo form_error('new_password');?>
                                                </div>
                                                <div class="form-group <?php echo form_error('retype_new_password')?'has-error':'';?>">
                                                    <label class="control-label">Re-type New Password</label>
                                                    <input type="password" name="retype_new_password" class="form-control" value="<?php echo $row['retype_new_password'];?>" />
                                                    <?php echo form_error('new_password');?> 
                                                </div>
                                                <div class="margin-top-10">
                                                    <button class="btn green-meadow" name="user_password" type="submit">Change Password</button>
                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                </div>
                                            </form>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PROFILE CONTENT -->
            </div>
        </div>
    </div>
</div>