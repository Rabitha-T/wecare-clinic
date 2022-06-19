<style>
    .sign_up_select{

        border: none;
        outline: none;
        border-bottom: 1px solid #000;
        transition: .5s;

        margin: 5px 0;
        width: 300px;
        height: 30px;
        font-family: 'Poppins', sans-serif !important;
        color: #000;
        font-weight: 700;
        overflow: visible;
        padding: 1px 2px;

        writing-mode: horizontal-tb !important;
        font-style: ;
        font-variant-ligatures: ;
        font-variant-caps: ;
        font-variant-numeric: ;
        font-variant-east-asian: ;
        font-weight: ;
        font-stretch: ;
        font-size: ;
        font-family: ;
        text-rendering: auto;
        color: fieldtext;
        letter-spacing: normal;
        word-spacing: normal;
        line-height: normal;
        text-transform: none;
        text-indent: 0px;
        text-shadow: none;
        display: inline-block;
        text-align: start;
        appearance: auto;
        -webkit-rtl-ordering: logical;
        cursor: text;
        background-color: field;
    }
</style>
      <!-- Navigation-->
      <div class="wrapper">
         <section>
            <div class="page" style="height: 550px">
               <div class="welcome" style="height: 550px">
                  <h2>Welcome Back!</h2>
                  <p>Hello Doctor. How it is? Register here.</p>
                  <button class="sign_in">Sign In</button>
                  <button class="btn">Sign Up</button>
               </div>
               <div class="sign_up">
                  <form method="POST">
                     <h2> Doctor Sign Up</h2>


                      <?php if( form_error('email') ) {?>
                          <div class="alert alert-danger" role="alert">
                              <?php echo form_error('email'); ?>
                          </div>
                      <?php } ?>
                      <?php if( form_error('name') ) {?>
                          <div class="alert alert-danger" role="alert">
                              <?php echo form_error('name'); ?>
                          </div>
                      <?php } ?>
                      <?php if( form_error('property_name') ) {?>
                          <div class="alert alert-danger" role="alert">
                              <?php echo form_error('property_name'); ?>
                          </div>
                      <?php } ?>

                      <?php if( form_error('password') ) {?>
                          <div class="alert alert-danger" role="alert">
                              <?php echo form_error('password'); ?>
                          </div>
                      <?php } ?>
                      <?php if( form_error('cpassword') ) {?>
                          <div class="alert alert-danger" role="alert">
                              <?php echo form_error('cpassword'); ?>
                          </div>
                      <?php } ?>

                      <?php if( form_error('department_id') ) {?>
                          <div class="alert alert-danger" role="alert">
                              <?php echo form_error('department_id'); ?>
                          </div>
                      <?php } ?>



                      <?php if( $this->session->flashdata('success') ) {?>
                          <div class="alert alert-success">
                              <button class="close" data-close="alert"></button>
                              <span><?php echo $this->session->flashdata('success');?></span>
                          </div>
                      <?php }?>


                     <input type="text" value="<?php echo $row['name'];?>" name="name" placeholder="Full Name" ><br>
                     <input type="email" value="<?php echo $row['email'];?>" name="email" placeholder="Email" ><br>
                      <select class="sign_up_select" name="department_id">
                          <option value="">Select Department</option>
                          <?php foreach($arr_department as $row_dep ) { ?>
                              <option <?php echo $row['department_id']==$row_dep->id?'selected':'';?>
                                  value="<?php echo $row_dep->id; ?>">
                                  <?php echo $row_dep->name; ?></option>
                          <?php } ?>
                      </select> <br>
                     <input type="text" value="<?php echo $row['registration_no'];?>" name="registration_no" placeholder="Registration No" ><br>
                     <input type="password" value="<?php echo $row['password'];?>" name="password" placeholder="Password" >
                     <input type="password" value="<?php echo $row['cpassword'];?>" name="cpassword" placeholder="Confirm Password" >

                      <br>
                     <input type="submit" name="sign_up" value="Sign Up" class="up">
                  </form>
               </div>
               <div class="login">

                  <form method="POST" >

                     <h2>Doctor Login</h2>

                      <?php if($error != '') {?>
                          <div class="alert alert-danger">
                              <button class="close" data-close="alert"></button>
                              <span><?php echo $error;?> </span>
                          </div>
                      <?php }?>

                      <?php if( $this->session->flashdata('success') ) {?>
                          <div class="alert alert-success">
                              <button class="close" data-close="alert"></button>
                              <span><?php echo $this->session->flashdata('success');?></span>
                          </div>
                      <?php }?>

                     <input type="email" value="<?php echo $row['email'];?>" name="email" placeholder="Email" required><br>
                     <input type="password" value="<?php echo $row['password'];?>" name="password" placeholder="Password" required><br>
                     <input type="submit" name="sign_in" value="Sign In" class="in">
                      <a href="<?php echo site_url('vendor/auth/forgot_password');?>">Forgot Password?</a>

                  </form>
               </div>
            </div>
         </section>
      </div>