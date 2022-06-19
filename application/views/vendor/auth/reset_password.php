
<!-- Navigation-->
<div class="wrapper">
    <section>
        <div class="page">
            <div class="welcome">
                <h2>Reset Password!</h2>
                <p>To reset your password, please first identify your account.</p>
                <button type="hidden" class="sign_in">Sign In</button>
            </div>

            <div class="login">

                <form method="POST" >

                    <h2>Reset Password?</h2>

                    <?php if( $success ){?>
                        <div class="alert alert-success">
                            <button class="close" data-close="alert"></button>
                            <span><?php echo $success;?></span>
                        </div>
                    <?php }?>

                    <?php if( $this->session->flashdata('error') ) {?>
                        <div class="alert alert-danger">
                            <button class="close" data-close="alert"></button>
                            <span><?php echo $this->session->flashdata('error');?></span>
                        </div>
                    <?php }?>

                    <?php if( $error ) {?>
                        <div class="alert alert-danger">
                            <button class="close" data-close="alert"></button>
                            <span><?php echo $error;?></span>
                        </div>
                    <?php }?>

                    <?php if( form_error('password') ) {?>
                        <div class="alert alert-danger">
                            <button class="close" data-close="alert"></button>
                            <span><?php echo form_error('password');?></span>
                        </div>
                    <?php }?>

                    <?php if( form_error('cpassword') ) {?>
                        <div class="alert alert-danger">
                            <button class="close" data-close="alert"></button>
                            <span><?php echo form_error('cpassword');?></span>
                        </div>
                    <?php }?>

                    <input type="password" value="" name="password" placeholder="Password" required><br>
                    <input type="password" value="" name="cpassword" placeholder="Confirm Password" required><br>
                    <input type="submit" name="sign_in" value="Reset" class="in">

                </form>
            </div>
        </div>
    </section>
</div>