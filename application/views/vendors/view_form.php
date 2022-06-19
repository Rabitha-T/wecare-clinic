<div class="row">


    <div class="col-md-12">
        <table  class="table  table-striped ">
            <thead>

            <tr>
                <td>
                    <h3 style="text-align: center"><?php echo $vendor->name; ?></h3>
                </td>
                <td style="text-align: right">

                </td>

            </tr>

            </thead>

        </table>
    </div>

    <div class="row">

        <div class="col-md-4">

            <figure>
                <?php
                if( $vendor->image && file_exists(getcwd().'/files/vendor_profile/'.$vendor->id.'/'.$vendor->image)) {?>

                    <img style="height: 170px;margin-left: 10px;" src="<?php echo base_url('files/vendor_profile/'.$vendor->id.'/'.$vendor->image );?>" alt="">

                <?php } else {?>
                    <img style="height: 170px;margin-left: 10px;" src="<?php echo base_url('assets/vendor/img/avatar1.jpg');?>" alt="">
                <?php }?>


            </figure>

        </div>

        <div class="col-md-6" style="padding: 10px;margin-left: 50px;">


        </div>

    </div>




    <div class="col-md-12" style="margin-top: 30px">

        <table  class="table  table-striped ">

            <tbody>

            <tr>
                <td colspan="2">
                    <?php echo $vendor->personal_info;?>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $vendor->email;?></td>
            </tr>

            <tr>
                <td>Hospital Name</td>
                <td><?php echo $vendor->hospital_name;?></td>
            </tr>

            <tr>
                <td>Registration Number</td>
                <td><?php echo $vendor->registration_no;?></td>
            </tr>

            <tr>
                <td>Address</td>
                <td><?php echo $vendor->address;?></td>
            </tr>

            <tr>
                <td>Department</td>
                <td><?php echo $vendor->place;?></td>
            </tr>

            <tr>
                <td>Phone</td>
                <td><?php echo $vendor->phone;?></td>
            </tr>

            <tr>
                <td>State</td>
                <td><?php echo $vendor->state;?></td>
            </tr>

            <tr>
                <td>Zip</td>
                <td><?php echo $vendor->zip;?></td>
            </tr>

            </tbody>
        </table>

    </div>
</div>