
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add listing</li>
      </ol>



		<div class="box_general padding_bottom">
			<div class="header_box version_2" style="margin-bottom: 0px;">
				<h2><i class="fa fa-user"></i>Profile details</h2>
			</div>



			 <div class="list_general">
            <ul>
               <li>
                  <figure>
                      <?php
                      if( $row->image&& file_exists(getcwd().'/files/vendor_profile/'.$row->id.'/'.$row->image)) {?>

                          <img src="<?php echo base_url('files/vendor_profile/'.$row->id.'/'.$row->image );?>" alt="">

                      <?php } else {?>
                          <img src="<?php echo base_url('assets/vendor/img/avatar1.jpg');?>" alt="">
                      <?php }?>


                  </figure>
                  <h4><?php echo $row->name; ?> <i class="<?php echo $row->is_approved == 1?'approved':'pending'; ?>">
                          <?php echo $row->is_approved == 1?'approved':'Pending'; ?></i></h4>
                  <ul class="disn">
                     <li>
                        <i class="flaticon-cursor"></i><?php echo $row->address; ?>

                     </li>
                  </ul>
                  <div class="row">
                     <div class="col-md-6 col-lg-6">
                         <ul class="booking_list">
                           <li><strong>Account Created:</strong>
                               <?php echo date('M d, Y', strtotime($row->created_at));?></li>
                           <li><strong>Last Activity:</strong> </li>
                           <li><strong>Bookings:</strong> 0 People</li>

                          </ul>
                     </div>
                     <div class="col-md-6 col-lg-6">
                         <ul class="booking_list">
                           <li><strong>Contact Details:</strong> <a href="#0"><?php echo $row->phone; ?></a></li>
                           <li><strong>Email Address:</strong> <a href="#0"><?php echo $row->email; ?></a></li>
                           <li><strong>Department:</strong> <?php echo $row->department; ?> </li>
                          </ul>
                     </div>
                  </div>

                  <ul class="buttons">
                     <li><a href="#0" class="btn_1 <?php echo $row->is_approved == 1?'green':'gray'; ?> approve">
                             <i class="fa fa-fw fa-<?php echo $row->is_approved == 1?'check':'times'; ?>-circle-o"></i>
                             <?php echo $row->is_approved == 1?'approved':'Pending'; ?></a></li>
                     <li><a href="<?php echo site_url('vendors-edit-profile');?>"
                            class="btn_1 gray"><i class="fa fa-fw fa-pencil"></i>
                             Edit Profile</a></li>
                  </ul>
               </li>

            </ul>
         </div>


		</div>


	  </div>
	  <!-- /.container-fluid-->
   	</div>

   	<?php


?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<!--                <h4 class="modal-title" id="myModalLabel">Alert</h4>-->
            </div>
            <div class="modal-body center-block">
                <div class="alert alert-danger" role="alert">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->