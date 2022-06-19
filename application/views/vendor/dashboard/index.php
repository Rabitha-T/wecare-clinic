<script>var is_otp_verified = '<?php echo $this->vendor->is_otp_verified;?>';</script>

<style>
    .height-100 {
        height: 100vh
    }

    .card_modal {
        width: 400px;
        border: none;
        height: 300px;
        box-shadow: 0px 5px 20px 0px #d2dae3;
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center
    }

    .card_modal h6 {
        color: red;
        font-size: 20px
    }

    .inputs input {
        width: 200px;
        height: 40px
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0
    }

    .card-2 {
        background-color: #fff;
        padding: 10px;
        width: 350px;
        height: 100px;
        bottom: -50px;
        left: 20px;
        position: absolute;
        border-radius: 5px
    }

    .card-2 .content {
        margin-top: 50px
    }

    .card-2 .content a {
        color: red
    }

    .form-control:focus {
        box-shadow: none;
        border: 2px solid red
    }

    .validate {
        border-radius: 20px;
        height: 40px;
        background-color: red;
        border: 1px solid red;
        width: 140px
    }

</style>
<div class="content-wrapper">
         <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
               </li>
               <li class="breadcrumb-item active">My Dashboard</li>
            </ol>
            <!-- Icon Cards-->
            <div class="row">
               <div class="col-xl-3 col-sm-6 mb-3">
                  <div class="card dashboard text-white bg-primary o-hidden h-100">
                     <div class="card-body">
                        <div class="card-body-icon">
                           <i class="fa fa-fw fa-user"></i>
                        </div>
                        <div class="mr-5">
                           <h5>150 <br/>Patients</h5>
                        </div>
                     </div>
                     <a class="card-footer text-white clearfix small z-1" href="#">
                     <span class="float-left">View Details</span>
                     <span class="float-right">
                     <i class="fa fa-angle-right"></i>
                     </span>
                     </a>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-6 mb-3">
                  <div class="card dashboard text-white bg-warning o-hidden h-100">
                     <div class="card-body">
                        <div class="card-body-icon">
                           <i class="fa fa-fw fa-star"></i>
                        </div>
                        <div class="mr-5">
                           <h5>140<br/>Bookings</h5>
                        </div>
                     </div>
                     <a class="card-footer text-white clearfix small z-1" href="#">
                     <span class="float-left">View Details</span>
                     <span class="float-right">
                     <i class="fa fa-angle-right"></i>
                     </span>
                     </a>
                  </div>
               </div>
               <div class="col-xl-3 col-sm-6 mb-3">
                  <div class="card dashboard text-white bg-success o-hidden h-100">
                     <div class="card-body">
                        <div class="card-body-icon">
                           <i class="fa fa-fw fa-calendar-check-o"></i>
                        </div>
                        <div class="mr-5">
                           <h5>101<br/>New Bookings</h5>
                        </div>
                     </div>
                     <a class="card-footer text-white clearfix small z-1" href="#">
                     <span class="float-left">View Details</span>
                     <span class="float-right">
                     <i class="fa fa-angle-right"></i>
                     </span>
                     </a>
                  </div>
               </div>

            </div>
            <!-- Icon Cards-->


         </div>
         <!-- /.container-fluid-->
      </div>



<div class="modal fade" id="view_model" data-backdrop="static" data-keyboard="false" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">OTP VERIFICATION</h3>

            </div>

            <div class="modal-body">

                <div class="container height-100 d-flex justify-content-center align-items-center">
                    <div class="position-relative">
                        <div class="card card_modal p-2 text-center">

                            <div class="alert alert-danger" id="alert_box" style="display: none" >
                                <button class="close" data-close="alert"></button>
                                <span id="alert_box_text"></span>
                            </div>

                            <h6>Please enter the one time password <br> to verify your account</h6>
                            <div> <span>OTP has been sent to your email</span>  </div>
                            <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                <input class="m-6 text-center form-control rounded" type="text" id="first" maxlength="4" />

                            </div>
                            <div class="mt-4"> <button class="btn btn-danger px-4 validate">Validate</button> </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>