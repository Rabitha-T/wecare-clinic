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
                	
                    <div class="form-group <?php echo form_error('group_id')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="group_id">User Type<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <select class="form-control" id="group_id" name="group_id">
                                <option value="">Select</option>
                                <option value="1" <?php echo ($row['group_id']==1)?"selected":''; ?>>Administrator</option>
                            </select>
                            
                            <?php echo form_error('group_id');?>
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
                    
                    <div class="form-group <?php echo form_error('first_name')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="first_name">First Name<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <input type="text" name="first_name" placeholder="First Name" id="first_name" class="form-control" value="<?php echo $row['first_name'];?>"> 
                            <?php echo form_error('first_name');?>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo form_error('last_name')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="last_name">Last Name<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <input type="text" name="last_name" placeholder="Last Name" id="last_name" class="form-control" value="<?php echo $row['last_name'];?>"> 
                            <?php echo form_error('last_name');?>
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group <?php echo form_error('phone')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="phone">Phone<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-5">
                            <input type="text" name="phone" placeholder="Phone" id="phone" class="form-control" value="<?php echo $row['phone'];?>"> 
                            <?php echo form_error('phone');?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="is_active">is Active</label>
                        <div class="col-md-3">
                            <select name="is_active" id="is_active" class="form-control" > 
                            	<option value="2" <?php echo $row['is_active'] == 2 ? 'selected' : '';?>>No</option>
                                <option value="1" <?php echo $row['is_active'] == 1 ? 'selected' : '';?>>Yes</option>
                            </select>
                        </div>
                    </div>
                   
                   <div class="form-group">
                        <label for="image" class="col-sm-2 control-label">Profile Image</label>
                        <div class="col-sm-4">
                            <?php if( $row['image'] && file_exists( getcwd().'/files/profile/'.$row['id'].'/'.$row['image'] ) ){?>
                            <div style="width:100px;">
                                <img src="<?php echo base_url('files/profile/'.$row['id'].'/'.$row['image']);?>" width="100%" />
                            </div>
                            <?php }?>
                             <input type="file" name="image" id="image" />
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

        