      <footer class="sticky-footer">
         <div class="container">
            <div class="text-center">
               <small>Copyright © CLINIC 2022</small>
            </div>
         </div>
      </footer>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
      </a>



         <!-- Reply to review popup -->
   <div id="modal-reply" class="white-popup mfp-with-anim mfp-hide">
      <div class="small-dialog-header">
         <h3>Reply to review</h3>
      </div>
      <div class="message-reply margin-top-0">
         <div class="form-group">
            <textarea cols="40" rows="3" class="form-control"></textarea>
         </div>
         <button class="btn_1">Reply</button>
      </div>
   </div>

      <!-- Logout Modal-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="../index.php">Logout</a>
               </div>
            </div>
         </div>
      </div>
          <!-- Booking/order Modal -->
    <div class="modal fade" id="client_detail_modal" tabindex="-1" role="dialog" aria-labelledby="client_detail_modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="client_detail_modalLabel">Edit Booking/Order detail</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="Mark Twain">
                    </div>
                   <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" class="form-control date-pick" value="11/05/2020">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                                <label>End Date</label>
                                <input type="date" class="form-control date-pick" value="14/05/2020">
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                    <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                                <label>People</label>
                                <div class="styled-select">
                                    <select>
                                        <option>1</option>
                                        <option selected="">2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Payment method</label>
                                <div class="styled-select">
                                    <select>
                                        <option selected="">Paypal</option>
                                        <option>Credit Card</option>
                                        <option>Cash</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                                <label>Category</label>
                                <div class="styled-select">
                                    <select>
                                        <option>Caravans</option>
                                        <option selected="">Tents</option>
                                        <option>Farm House</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                                <label>Select Propery</label>
                                <div class="styled-select">
                                    <select>
                                        <option>Souk Madinat Al Wakrah </option>
                                        <option selected="">Mysk Kingfisher Retreat</option>
                                        <option>Fully Furnished Caravan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                      </div>
                    <!-- /Row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="text" class="form-control" value="98432983242">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="mark@hotmail.com">
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="#0">Save</a>
                </div>
            </div>
        </div>
    </div>
              <!-- Booking/order Modal -->
    <div class="modal fade" id="Bokk_lock" tabindex="-1" role="dialog" aria-labelledby="Book_label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="client_detail_modalLabel">Block Date</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                   <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" class="form-control date-pick" value="11/05/2020">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                                <label>End Date</label>
                                <input type="date" class="form-control date-pick" value="14/05/2020">
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="#0">Block Date</a>
                </div>
            </div>
        </div>
    </div>
      <!-- Bootstrap core JavaScript-->
      <script src="<?php echo base_url('assets/vendor/vendor/jquery/jquery.min.js');?>"></script>
      <script src="<?php echo base_url('assets/vendor/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
      <!-- Core plugin JavaScript-->
      <script src="<?php echo base_url('assets/vendor/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
      <!-- Page level plugin JavaScript-->
      <script src="<?php echo base_url('assets/vendor/vendor/chart.js/Chart.js');?>"></script>
      <script src="<?php echo base_url('assets/vendor/vendor/datatables/jquery.dataTables.js');?>"></script>
      <script src="<?php echo base_url('assets/vendor/vendor/datatables/dataTables.bootstrap4.js');?>"></script>
      <script src="<?php echo base_url('assets/vendor/vendor/jquery.magnific-popup.min.js');?>"></script>
      <!-- Custom scripts for all pages-->
      <script src="<?php echo base_url('assets/vendor/js/admin.js');?>"></script>
      <!-- Custom scripts for this page-->
      <script src="<?php echo base_url('assets/vendor/js/admin-charts.js');?>"></script>
          <!-- Custom scripts for this page-->
<!--    <script src="--><?php //echo base_url('assets/vendor/vendor/dropzone.min.js');?><!--"></script>-->
        <!-- Custom scripts for this page-->
    <script src="<?php echo base_url('assets/vendor/js/admin-datatables.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/vendor/js/caleandar.js');?>"></script>
        <script src="<?php echo base_url('assets/vendor/js/editor/summernote-bs4.min.js');?>"></script>
    <script>
    $('.editor').summernote({
        fontSizes: ['10', '14'],
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']]
        ],
        placeholder: 'Write here your description....',
        tabsize: 2,
        height: 200
    });
    </script>
<!-- calendar event details -->
    <script type="text/javascript">
   var events = [
  {'Date': new Date(2022, 4, 4), 'Title': 'Caravans at 3:25pm', 'Link': 'bookings.php'},
  {'Date': new Date(2022, 4, 7), 'Title': 'Booked', 'Link': '#'},
  {'Date': new Date(2022, 4, 12), 'Title': 'Booked', 'Link': '#'},
  {'Date': new Date(2022, 4, 17), 'Title': 'Booked', 'Link': '#'},
  {'Date': new Date(2022, 4, 27), 'Title': 'Booked', 'Link': '#'},
  {'Date': new Date(2022, 4, 9), 'Title': 'Tent at 04.25pm', 'Link': 'bookings.php'},
  {'Date': new Date(2022, 4, 25), 'Title': 'Tent at 04.25pm', 'Link': 'bookings.php'},
  {'Date': new Date(2022, 4, 14), 'Title': 'Tent at 04.25pm', 'Link': 'bookings.php'},
  {'Date': new Date(2022, 4, 30), 'Title': 'Tent at 04.25pm', 'Link': 'bookings.php'},
  {'Date': new Date(2022, 4, 29), 'Title': 'Tent at 04.25pm', 'Link': 'bookings.php'},
  {'Date': new Date(2016, 4, 27), 'Title': 'Farm House 11.20am', 'Link': 'bookings.php'},
];
var settings = {};
var element = document.getElementById('caleandar');
caleandar(element, events, settings);
</script>

      <?php if( isset($js_files)) { foreach( $js_files as $js ){ ?>
          <script src="<?php echo $js;?>" type="text/javascript"></script>
      <?php }} ?>
    

   </body>
</html>