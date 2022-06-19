
<div class="content-wrapper">
   <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
         </li>
         <li class="breadcrumb-item active">Add listing</li>
      </ol>

       <form method="post" enctype="multipart/form-data" name="edit_form" id="edit_form">

           <?php if($this->session->flashdata('msg')){?>
               <div class="alert alert-success">
                   <button class="close" data-close="alert"></button>
                   <span><?php echo $this->session->flashdata('msg');?></span>
               </div>
           <?php }?>

           <?php if($this->session->flashdata('error_msg')){?>
               <div class="alert alert-danger">
                   <button class="close" data-close="alert"></button>
                   <span><?php echo $this->session->flashdata('error_msg');?></span>
               </div>
           <?php }?>


           <input type="hidden" name="id" value="<?php echo $row['id'];?>">

          <div class="box_general padding_bottom">
             <div class="header_box version_2">
                <h2><i class="fa fa-user"></i>Profile details</h2>
             </div>

             <div class="row">
                 <div class="col-md-4">

                     <figure>
                         <?php
                         if( $row['image']&& file_exists(getcwd().'/files/vendor_profile/'.$row['id'].'/'.$row['image'])) {?>

                             <img style="height: 70px;" src="<?php echo base_url('files/vendor_profile/'.$row['id'].'/'.$row['image'] );?>" alt="">

                         <?php } else {?>
                             <img style="height: 70px;" src="<?php echo base_url('assets/vendor/img/avatar1.jpg');?>" alt="">
                         <?php }?>


                     </figure>

                 </div>



             </div>


             <div class="row">
                <div class="col-md-4">
                   <div class="form-group">
                      <label>Your photo</label>
                       <div class="dropzone"></div>
                   </div>


                </div>
                <div class="col-md-8 add_top_30">
                   <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" value="<?php echo $row['name'];?>"
                                   class="form-control" placeholder="Your name">
                         </div>
                      </div>

                       <div class="col-md-6">
                           <div class="form-group">
                               <label>Hospital Name</label>
                               <input type="text" name="hospital_name" value="<?php echo $row['hospital_name'];?>"
                                      class="form-control" placeholder="Hospital Name">
                           </div>
                       </div>

                   </div>
                   <!-- /row-->
                   <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label>Telephone</label>
                            <input type="text" name="phone" value="<?php echo $row['phone'];?>"
                            class="form-control" placeholder="Your telephone number">
                         </div>
                      </div>
                      <div class="col-md-6">
                         <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo $row['email'];?>"
                                   class="form-control" placeholder="Your email">
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label>Personal Information</label>
                            <textarea name="personal_info"
                                      style="height:200px;" class="form-control"
                                      placeholder="Personal info"><?php echo $row['personal_info'];?></textarea>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <!-- /box_general-->
          <!-- /box_general-->
          <div class="box_general padding_bottom">
             <div class="header_box version_2">
                <h2><i class="fa fa-map-marker"></i>Location</h2>
             </div>
             <div class="row">
                <div class="col-md-4">
                   <div class="form-group">
                      <label>Select Area</label>
                      <div class="styled-select">
                         <select name="department_id">
                            <option value="">Select Department</option>
                             <?php foreach($arr_places as $row_place ) { ?>

                                <option <?php echo ($row_place->id==$row['department_id'])?'selected':'';?>
                                    value="<?php echo $row_place->id; ?>"><?php echo $row_place->name; ?></option>

                             <?php } ?>

                         </select>
                      </div>
                   </div>
                </div>
                <div class="col-md-8">
                   <div class="form-group">
                      <label>Address</label>
                      <input name="address" value="<?php echo $row['address']; ?>"
                             type="text" class="form-control" placeholder="ex. 250, Fifth Avenue...">
                   </div>
                </div>
             </div>
             <!-- /row-->
             <div class="row">
                <div class="col-md-4">
                   <div class="form-group">
                      <label>State</label>
                      <input name="state" value="<?php echo $row['state'];?>" type="text" class="form-control">
                   </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                      <label>Zip Code</label>
                      <input name="zip" value="<?php echo $row['zip'];?>" type="text" class="form-control">
                   </div>
                </div>

             </div>
             <!-- /row-->
          </div>

       </form>

       <div class="row" style="margin-bottom: 30px">
           <div class=" col-md-10 ">

           </div>

           <div class=" col-md-2 ">
               <a id="submit_form"  href="#0" class="btn_1 medium">Save</a>
           </div>
       </div>



      <div class="row">
         <div class="col-md-6">

             <form method="post" name="form_user_password" id="form_user_password" >

                 <div class="box_general padding_bottom">
                     <div class="header_box version_2">
                         <h2><i class="fa fa-lock"></i>Change password</h2>
                     </div>
                     <div class="form-group">
                         <label>Old password</label>
                         <input class="form-control" type="password" name="password" required>
                     </div>
                     <div class="form-group">
                         <label>New password</label>
                         <input class="form-control" type="password" name="new_password" required>
                     </div>
                     <div class="form-group">
                         <label>Confirm new password</label>
                         <input class="form-control" type="password" name="retype_new_password" required>
                     </div>
                 </div>

                 <p><input type="submit" value="Change Password"  name="user_password" class="btn_1 medium"></p>

             </form>


         </div>
         <div class="col-md-6">

             <form method="post" name="form_user_email" id="form_user_email" >
                    <div class="box_general padding_bottom">
                   <div class="header_box version_2">
                      <h2><i class="fa fa-envelope"></i>Change email</h2>
                   </div>
                   <div class="form-group">
                      <label>Old email</label>
                      <input class="form-control" name="old_email" id="old_email" type="email" required>
                   </div>
                   <div class="form-group">
                      <label>New email</label>
                      <input class="form-control" name="new_email" id="new_email" type="email" required>
                   </div>
                   <div class="form-group">
                      <label>Confirm new email</label>
                      <input class="form-control" name="confirm_new_email" id="confirm_new_email" type="email" required>
                   </div>
                </div>

                    <p><input type="submit" value="Change Email"  name="user_email" class="btn_1 medium"></p>
             </form>
         </div>
      </div>
      <!-- /row-->
<!--      <p><a href="#0" class="btn_1 medium">Save</a></p>-->
   </div>
   <!-- /.container-fluid-->

<!-- /.modal -->
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Please Wait</h4>
            </div>
            <div class="modal-body center-block">
                <div class="progress active">
                    <div class="progress-bar bar" data-width="500" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
