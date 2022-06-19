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
                	<span>Settings</span>
                </li>    
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Mail Settings<hr /></h3>
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
            
            	<form role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="site_name">Site Name <span class="text-danger">*</span></label>
                        <div class="col-md-5">
                            <input type="text" name="site_name" placeholder="Site Name" id="site_name" class="form-control"
                                   value="<?php echo $settings->site_name;?>">
                            
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <label class="col-md-3 control-label" for="email">Email <span class="text-danger">*</span></label>
                        <div class="col-md-5">
                            <input type="text" name="email" placeholder="Email" id="email" class="form-control" value="<?php echo $settings->email;?>"> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="phone">Phone </label>
                        <div class="col-md-5">
                            <input type="text" name="phone" placeholder="Phone" id="phone" class="form-control"
                                   value="<?php echo $settings->phone;?>">

                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-3 control-label" for="address">Address </label>
                        <div class="col-md-5">
                            <input type="text" name="address" placeholder="Address" id="address" class="form-control"
                                   value="<?php echo $settings->address;?>">

                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="logo">Logo <span class="text-danger">*</span></label>
                        <div class="col-md-5">
                        	<?php if( $settings->logo && file_exists( getcwd().'/files/media/'.$settings->logo ) ){?>
                            	<diV><img src="<?php echo base_url( 'files/media/'.$settings->logo );?>" width="100" /><br /><br /></diV>
                            <?php }?>
                            <input type="file" name="logo" id="logo"> 
                            <span class="help-inline">(400x110)</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="header_logo">Header Logo <span class="text-danger">*</span></label>
                        <div class="col-md-5">
                        	<?php if( $settings->header_logo && file_exists( getcwd().'/files/media/'.$settings->header_logo ) ){?>
                            	<diV><img src="<?php echo base_url( 'files/media/'.$settings->header_logo );?>" width="100" /><br /><br /></diV>
                            <?php }?>
                            <input type="file" name="header_logo" id="header_logo"> 
                            <span class="help-inline">(160x44)</span>
                        </div>
                    </div>


                    
                    <div class="form-group">
                    	<div class="col-md-3">
                        	<h4 class="pull-right"><strong>Email Settings</strong></h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="is_smtp">Use SMTP</label>
                        <div class="col-md-5">
                            <div class="checkbox-list">
                            	<label class="checkbox-inline">
                                	<input type="checkbox" name="is_smtp" id="is_smtp" value="1" <?php echo $settings->is_smtp == 1?'checked':'';?> />
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="connection_prefix">Connection Prefix</label>
                        <div class="col-md-5">
                            <input type="text" name="connection_prefix" placeholder="Connection Prefix" id="connection_prefix" class="form-control" value="<?php echo $settings->connection_prefix;?>"> 
                            <span class="help-inline">Options are "", "ssl" or "tls"</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="smtp_host">SMTP Host</label>
                        <div class="col-md-5">
                            <input type="text" name="smtp_host" placeholder="SMTP Host" id="smtp_host" class="form-control" value="<?php echo $settings->smtp_host;?>"> 
                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="smtp_port">SMTP Port</label>
                        <div class="col-md-5">
                            <input type="text" name="smtp_port" placeholder="SMTP Port" id="smtp_port" class="form-control" value="<?php echo $settings->smtp_port;?>"> 
                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="smtp_username">SMTP Username</label>
                        <div class="col-md-5">
                            <input type="text" name="smtp_username" placeholder="SMTP Username" id="smtp_username" class="form-control" value="<?php echo $settings->smtp_username;?>"> 
                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="smtp_password">SMTP Password</label>
                        <div class="col-md-5">
                            <input type="password" name="smtp_password" placeholder="SMTP Password" id="smtp_password" class="form-control" value="<?php echo $settings->smtp_password;?>"> 
                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn green-meadow" type="submit">Save</button>
                             <a href="javascript:;" data-url="<?php echo site_url('settings/testemail');?>" class="btn red email-test">Test Email</a>
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

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Test email settings</h4>
            </div>
            <div class="modal-body"> 
                <div class="row"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn green-meadow btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>