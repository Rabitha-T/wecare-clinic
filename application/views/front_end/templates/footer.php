<footer class="footer-area footer-bg">

         <div class="copy-right-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-8">
                  <div class="copy-right-text">
                     <p>
                        Copyright @ 2022 Clinic.
                     </p>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="copy-right-list">
                     <ul>
                        <li>
                           <a href="#" target="_blank">
                           Terms of Use
                           </a>
                        </li>
                        <li>
                           <a href="#" target="_blank">
                           Privacy Policy
                           </a>
                        </li>
                        <li>
                           <a href="#" target="_blank">
                           FAQ'S
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
        </div>
      </footer>
      <!-- /.container -->




<!-- end google map modal -->

      <script src="<?php echo base_url('assets/front_end/js/jquery.min.js');?>"></script>
      <script src="<?php echo base_url('assets/front_end/js/bootstrap.bundle.min.js');?>"></script>
      <script src="<?php echo base_url('assets/front_end/js/owl.carousel.min.js');?>"></script>
      <script src="<?php echo base_url('assets/front_end/js/jquery.magnific-popup.min.js');?>"></script>
      <script src="<?php echo base_url('assets/front_end/js/wow.min.js');?>"></script>
      <script src="<?php echo base_url('assets/front_end/js/meanmenu.js');?>"></script>
      <script src="<?php echo base_url('assets/front_end/js/jquery-ui.js');?>"></script>
      <script src="<?php echo base_url('assets/front_end/js/jquery.nice-select.min.js');?>"></script>
      <script src="<?php echo base_url('assets/front_end/js/jquery.ajaxchimp.min.js');?>"></script>
      <script src="<?php echo base_url('assets/front_end/js/form-validator.min.js');?>"></script>
<!--      <script src="--><?php //echo base_url('assets/front_end/js/contact-form-script.js');?><!--"></script>-->
      <script src="<?php echo base_url('assets/front_end/js/bootstrap-datepicker.min.js');?>"></script>
      <script src="<?php echo base_url('assets/front_end/js/custom.js');?>"></script>
<!-- DATE PICKER SCRIPT -->


    <?php if( isset($js_files)) { foreach( $js_files as $js ){ ?>
        <script src="<?php echo $js;?>" type="text/javascript"></script>
    <?php }} ?>

   </body>
</html>