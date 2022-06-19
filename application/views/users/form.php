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
                    <span>New</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> New User<hr /></h3>
        
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
        
            <div class="col-md-12">
            
            	<form role="form" class="form-horizontal" method="post">
                	
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
                    
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn green-meadow" type="submit">Invite</button>
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

        