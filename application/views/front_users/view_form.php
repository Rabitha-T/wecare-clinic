<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table  class="table">


            <tr>
                <th>User Type</th>
                <td class="space">:</td>
                <td><?php echo get_user_type($row->user_type);?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td class="space">:</td>
                <td><?php echo $row->name;?></td>

            </tr>
            <tr>
                <th> Email</th>
                <td class="space">:</td>
                <td><?php echo $row->email;?></td>

            </tr>
            <tr>
                <th>Mobile</th>
                <td class="space">:</td>
                <td><?php echo $row->mobile;?></td>

            </tr>

            <?php if($row->user_type == 2 || $row->user_type == 3){?>
            <tr>
                <th>Location</th>
                <td class="space">:</td>
                <td><?php echo $row->location;?></td>

            </tr>
            <tr>
                <th>Address</th>
                <td class="space">:</td>
                <td><?php echo $row->address;?></td>

            </tr>
            <tr>
                <th>Company</th>
                <td class="space">:</td>
                <td><?php echo $row->company;?></td>

            </tr>
            <?php }?>


        </table>
        </div>
    </div>
</div>