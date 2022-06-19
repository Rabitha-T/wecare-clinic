<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo site_url();?>">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                	<a href="<?php echo site_url('users');?>">Users</a>
                    <i class="fa fa-circle"></i>
                </li>    
                <li>   
                    <span><?php echo $action == 'add'?'New':'Edit';?></span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> <?php echo $action == 'add'?'New':'Edit';?> User<hr /></h3>
        
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
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
            
            	<form role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                	
                    <div class="form-group <?php echo form_error('user_type')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="user_type">User Type<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <select class="form-control" id="user_type" name="user_type">
                                <option value="">Select</option>
                                <option value="1" <?php echo ($row['user_type']==1)?"selected":''; ?>>Individual</option>
                                <option value="2" <?php echo ($row['user_type']==2)?"selected":''; ?>>Builder</option>
                                <option value="3" <?php echo ($row['user_type']==3)?"selected":''; ?>>Agent</option>
                            </select>
                            
                            <?php echo form_error('user_type');?>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo form_error('email')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="email">Email<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <input type="text" name="email" placeholder="Email" id="email" class="form-control" value="<?php echo $row['email'];?>"> 
                            <?php echo form_error('email');?>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo form_error('password')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="password">Password<?php echo $action == 'add'?'<span class="required" aria-required="true"> * </span>':'';?></label>
                        <div class="col-md-5">
                            <input type="password" name="password" placeholder="Password" id="password" class="form-control"> 
                            <?php echo form_error('password');?>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo form_error('name')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="name"> Name<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <input type="text" name="name" placeholder="First Name" id="name" class="form-control" value="<?php echo $row['name'];?>">
                            <?php echo form_error('name');?>
                        </div>
                    </div>

<!--                    <div class="form-group --><?php //echo form_error('address')?'has-error':'';?><!--">-->
<!--                        <label class="col-md-2 control-label" for="address"> Address<span class="required" aria-required="true"> * </span></label>-->
<!--                        <div class="col-md-5">-->
<!--                            <input type="text" name="address" placeholder="Address" id="address" class="form-control" value="--><?php //echo $row['address'];?><!--">-->
                            <?php echo form_error('address');?>
<!--                        </div>-->
<!--                    </div>-->
                    

                    
                    
                    <div class="form-group <?php echo form_error('mobile')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="mobile">Phone<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <input type="text" name="mobile" placeholder="Phone" id="mobile" class="form-control" value="<?php echo $row['mobile'];?>">
                            <?php echo form_error('mobile');?>
                        </div>
                    </div>
                    

                   


                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn green-meadow" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            	
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

        