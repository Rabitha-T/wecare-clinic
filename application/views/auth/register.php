<!-- BEGIN LOGIN -->
<div class="content register_content" style="margin-top:0;">
	<form  method="post">

        <h3 class="font-green"  style="color: #2b3643!important;">Sign Up</h3>
        <p class="hint"> Enter your company details below: </p>

        <div class="col-md-12">
        
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group <?php echo form_error('first_name')?'has-error':'';?>">
                        <label>Company Name<span class="required" aria-required="true">*</span></label>
                        <input class="form-control" name="first_name" placeholder="Company Name" type="text" value="<?php echo $row['first_name'];?>">
                        <?php echo form_error('first_name');?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group <?php echo form_error('phone')?'has-error':'';?>">
                        <label>Phone<span class="required" aria-required="true">*</span></label>
                        <input class="form-control" name="phone" placeholder="Phone" type="text"
                               value="<?php echo $row['phone'];?>">
                        <?php echo form_error('phone');?>

                    </div>
                </div>
            </div>



            <p class="hint"> Enter your account details below: </p>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group <?php echo form_error('email')?'has-error':'';?>">
                        <label>Email<span class="required" aria-required="true">*</span></label>
                        <input class="form-control" name="email" placeholder="Email" type="text" value="<?php echo $row['email'];?>">
                        <?php echo form_error('email');?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group <?php echo form_error('password')?'has-error':'';?>">
                        <label>Password<span class="required" aria-required="true">*</span></label>
                        <input class="form-control" name="password" placeholder="Password" type="password" value="<?php echo $row['password'];?>">
                        <?php echo form_error('password');?>
                    </div>
                </div>
            </div>


            <div class="form-group margin-top-20 margin-bottom-20  <?php echo form_error('tnc')?'has-error':'';?>">
                <label class="check">
                    <input type="checkbox" name="tnc" value="1" <?php echo $row['tnc'] == 1? 'checked' : '';?> /> I agree to the
                    <a href="javascript:;"> Terms of Service </a> &
                    <a href="javascript:;"> Privacy Policy </a><span class="required" aria-required="true">*</span>
                </label>
                <?php echo form_error('tnc');?>
            </div>

            <div class="form-actions">
                <a href="<?php echo site_url('login');?>" class="btn btn-default">Sign In</a>
                <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
            </div>
        </div>

    </form>
</div>
        