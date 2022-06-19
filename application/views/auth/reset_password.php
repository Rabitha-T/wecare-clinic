<!-- BEGIN LOGIN -->
<div class="content" style="margin-top:0;">
   <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="reset-form" action="" method="post">
        <h3 class="form-title"  style="color: #2b3643!important;">Reset Password</h3>
        <p>To reset your password, please enter your new password.</p>
        <div class="form-group <?php if (form_error('password')) {?>has-error<?php } ?>">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">New Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="New Password" name="password" value="<?php echo $row['password'];?>" /> 
            <?php echo form_error('password');?>
            </div>
        <div class="form-group <?php if (form_error('password')) {?>has-error<?php } ?>">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirm Password" name="cpassword" value="<?php echo $row['cpassword'];?>" /> 
            <?php echo form_error('cpassword');?>
        </div>
            
        <div class="form-actions">
            <a href="<?php echo site_url('login');?>" class="btn btn-default">Sign In</a>
            <button type="submit" class="btn green-meadow uppercase pull-right">Submit</button>
        </div>
        
        <?php /*?><div class="create-account">
            <p>
                <a href="<?php echo site_url('register');?>"  class="uppercase">Create an account</a>
            </p>
        </div><?php */?>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
        