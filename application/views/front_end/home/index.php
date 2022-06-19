
<!-- LOGIN SCREEN -->
      <div class="user-area">
         <div class="container-fluid backblack">
            <div class="row align-items-center">

               <div class="col-lg-10 col-xl-12">
                  <div class="user-section text-center">
                     <div class="user-content">
                        <h2 class="white">Welcome <b>To Clinic</b></h2>
                        <p class="halfpara white"> Patient login & register</p>
                     </div>

                      <?php if($error != '') {?>
                          <div class="alert alert-danger">
                              <button class="close" data-close="alert"></button>
                              <span><?php echo $error;?> </span>
                          </div>
                      <?php }?>


                     <div class="tab user-tab">
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                              <ul class="tabs">
                                 <li class="<?php echo ($type=='login')?'current':'';?>">
                                    <a href="#"> <i class="flaticon-contact"></i> Login</a>
                                 </li>
                                 <li class="<?php echo ($type=='register')?'current':'';?>">
                                    <a href="#"> <i class="flaticon-verify"></i> Register</a>
                                 </li>
                              </ul>
                           </div>
                           <div class="col-lg-12 col-md-12">



                              <div class="tab_content current active">


                                 <div style="display: <?php echo ($type=='login')?'block':'none';?>" class="tabs_item current">
                                    <div class="user-all-form">
                                       <div class="contact-form">
                                          <form id="sign_in" method="post">
                                             <div class="row">
                                                <div class="col-lg-12 ">
                                                   <div class="form-group">
                                                      <i class='bx bx-user'></i>
                                                      <input type="text" name="email" id="email" class="form-control" required data-error="Please enter your Email" placeholder=" Email">
                                                   </div>
                                                </div>
                                                <div class="col-12">
                                                   <div class="form-group">
                                                      <i class='bx bx-lock-alt'></i>
                                                      <input class="form-control" type="password" name="password" placeholder="Password">
                                                   </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 text-center">
                                                   <button type="submit" name="sign_in" class="default-btn  user-all-btn">
                                                   Login
                                                   </button>
                                                </div>

                                                <div class="col-lg-8 col-sm-8">

                                                    <a class="forget" href="#">Login as Doctor</a>
                                                    <a class="forget" href="#">Login as Admin</a>
                                                </div>
                                             </div>
                                          </form>

                                       </div>
                                    </div>
                                 </div>
                                 <div style="display: <?php echo ($type=='register')?'block':'none';?>"
                                      class="tabs_item ">
                                    <div class="user-all-form">
                                       <div class="contact-form">
                                          <form id="sign_up" method="post">
                                             <div class="row">
                                                <div class="col-lg-12 ">
                                                   <div class="form-group">
                                                      <i class='bx bx-user'></i>
                                                      <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your Name" placeholder="Name">
                                                       <?php echo form_error('name');?>
                                                   </div>
                                                </div>
                                                <div class="col-lg-12">
                                                   <div class="form-group">
                                                      <i class='flaticon-email-2'></i>
                                                      <input type="email" name="email" id="email" class="form-control" required data-error="Please enter email" placeholder="Email">
                                                       <?php echo form_error('email');?>
                                                   </div>
                                                </div>
                                                 <div class="col-lg-12">
                                                     <div class="form-group">
                                                         <i class='flaticon-phone-call'></i>
                                                         <input type="text" name="phone" id="phone" class="form-control" required data-error="Please enter phone number" placeholder="Phone">
                                                         <?php echo form_error('phone');?>
                                                     </div>
                                                 </div>
                                                <div class="col-12">
                                                   <div class="form-group">
                                                      <i class='bx bx-lock-alt'></i>
                                                      <input class="form-control" type="password" name="password" placeholder="Password">
                                                       <?php echo form_error('password');?>
                                                   </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 text-center">
                                                   <button type="submit" class="default-btn  user-all-btn" name="sign_up">
                                                   Register
                                                   </button>
                                                </div>

                                             </div>
                                          </form>

                                       </div>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

