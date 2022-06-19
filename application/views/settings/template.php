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
                	<a href="<?php echo site_url('settings');?>">Settings</a>
                    <i class="fa fa-circle"></i>
                </li>   
                <li>
                	<span>Email Templates</span>
                </li>     
              
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Edit Template<hr /></h3>
        
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
        
            <div class="col-md-12">
            
            	<form role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                
                    <div class="form-group <?php echo form_error('subject')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="subject">Subject<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-10">
                            <input type="text" name="subject" placeholder="Subject" id="subject" class="form-control" value="<?php echo $row['subject'];?>"> 
                            <?php echo form_error('subject');?>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo form_error('body')?'has-error':'';?>">
                        <label class="col-md-2 control-label" for="body">Body<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-10">
                           <textarea name="body" class="ckeditor"><?php echo $row['body'];?></textarea>
                           <?php echo form_error('body');?>
                           <?php 
						   		$variables_str = $row['variables'];
								$var_arr = explode(',', $variables_str);
								if( is_array($var_arr) && count($var_arr) > 0 ){
						   ?>
                           <span class="hel-block"><a href="#basic" data-toggle="modal">Show Variables</a></span>
                           <?php }?>
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
<?php if( is_array($var_arr) && count($var_arr) > 0 ){?>
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Available Variables</h4>
            </div>
            <div class="modal-body"> 
            	<div class="row">
                	<div class="col-md-12">
                    	<form class="form-horizontal">
                        	<?php if( in_array('site_name', $var_arr) ){?>
                                <div class="form-group">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="text" name="site_name" id="site_name" class="form-control" value="[*site_name*]" readonly="readonly"> 
                                    </div>
                                    <label class="col-md-5 control-label pull-left" for="site_name" style="text-align:left">Site Name</label>
                                </div>
                            <?php }?>

                            <?php if( in_array('pass', $var_arr) ){?>
                                <div class="form-group">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="text" name="pass" id="pass" class="form-control" value="[*pass*]" readonly="readonly">
                                    </div>
                                    <label class="col-md-5 control-label pull-left" for="pass" style="text-align:left">Password</label>
                                </div>
                            <?php }?>


                        	<?php if( in_array('site_email', $var_arr) ){?>
                                <div class="form-group">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="text" name="site_email" id="site_email" class="form-control" value="[*site_email*]" readonly="readonly"> 
                                    </div>
                                    <label class="col-md-5 control-label pull-left" for="site_email" style="text-align:left">System Email</label>
                                </div>
                            <?php }?>
                            <?php if( in_array('email', $var_arr) ){?>
                                <div class="form-group">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="text" name="email" id="email" class="form-control" value="[*email*]" readonly="readonly"> 
                                    </div>
                                    <label class="col-md-5 control-label pull-left" for="email" style="text-align:left">User Email</label>
                                </div>
                            <?php }?>
                            <?php if( in_array('login-url', $var_arr) ){?>
                                <div class="form-group">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="text" name="login-url" id="login-url" class="form-control" value="[*login-url*]" readonly="readonly"> 
                                    </div>
                                    <label class="col-md-5 control-label pull-left" for="login-url" style="text-align:left">Login Url</label>
                                </div>
                            <?php }?>
                            <?php if( in_array('reset-url', $var_arr) ){?>
                                <div class="form-group">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="text" name="reset-url" id="reset-url" class="form-control" value="[*reset-url*]" readonly="readonly"> 
                                    </div>
                                    <label class="col-md-5 control-label pull-left" for="reset-url" style="text-align:left">Password Reset Url</label>
                                </div>
                            <?php }?>
                            <?php if( in_array('invite-url', $var_arr) ){?>
                                <div class="form-group">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="text" name="invite-url" id="invite-url" class="form-control" value="[*invite-url*]" readonly="readonly"> 
                                    </div>
                                    <label class="col-md-5 control-label pull-left" for="invite-url" style="text-align:left">Invite Url</label>
                                </div>
                            <?php }?>
                            <?php if( in_array('amount', $var_arr) ){?>
                                <div class="form-group">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="text" name="amount" id="amount" class="form-control" value="[*amount*]" readonly="readonly"> 
                                    </div>
                                    <label class="col-md-5 control-label pull-left" for="amount" style="text-align:left">Plan Amount</label>
                                </div>
                            <?php }?>
                            <?php if( in_array('name', $var_arr) ){?>
                                <div class="form-group">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="text" name="name" id="name" class="form-control" value="[*name*]" readonly="readonly"> 
                                    </div>
                                    <label class="col-md-5 control-label pull-left" for="amount" style="text-align:left">Name</label>
                                </div>
                            <?php }?>

                            <?php if( in_array('booking-id', $var_arr) ){?>
                                <div class="form-group">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="text" name="booking-id" id="booking-id" class="form-control" value="[*booking-id*]" readonly="readonly">
                                    </div>
                                    <label class="col-md-5 control-label pull-left" for="amount" style="text-align:left">Booking Id</label>
                                </div>
                            <?php }?>




                            


                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn green-meadow btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php }?>