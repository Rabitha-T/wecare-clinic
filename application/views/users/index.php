<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo site_url();?>">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Users</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Users<hr /></h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-12">
            
				<?php if($this->session->flashdata('msg')){?>   
                    <div class="alert alert-success">
                        <button class="close" data-close="alert"></button>
                        <span><?php echo $this->session->flashdata('msg');?></span>
                    </div>
                <?php }?>
                <?php if($this->session->flashdata('error_msg')){?>   
                    <div class="alert alert-danger">
                        <button class="close" data-close="alert"></button>
                        <span><?php echo strip_tags($this->session->flashdata('error_msg'));?></span>
                    </div>
                <?php }?>
                
                <?php if( $this->session->userdata('group_id') == 1 ){?>
                <form method="post" action="<?php echo site_url('users');?>" class="form-inline">
                	<div class="row">
           				<div class="col-md-12">
                            <label class="control-label">Filter By:</label>
                            <select name="group_id" id="group_id" class="form-control">
                            	<option value="">All</option>
                                <option value="1" <?php echo $search['group_id'] == 1?'selected':'';?>>Administrators</option>
                            </select>
                            <input class="btn btn-danger" type="submit" name="search" value="Search" >
                    	</div>
                    </div>
                    <div class="margin-bottom-10"></div>
                </form>
                <?php }?>
            	<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            
                            <th> Name </th>
                            <th> Email </th>
                            <th> Role </th>
                            <th> Status </th>
                            <th class="text-center"> Created </th>
                            <th class="text-center"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if( is_array($result) && count($result) > 0 ){?>
							<?php foreach( $result as $row ){
                                if($row->group_id == 1){
                                    $user_type = "Administrator";
                                }
                            ?>
                            <tr>
                                <td> <?php echo $row->first_name.' '.$row->last_name;?> </td>
                                <td> <?php echo $row->email;?> </td>
                                <td> <?php echo $user_type;?> </td>
                                <td><span class="label label-<?php echo get_user_status_class($row->is_active);?>"><?php echo get_user_status($row->is_active);?></span></td>
                                <td class="text-center"> <?php echo date('M d, Y', strtotime($row->created_at));?> </td>
                                
                                <td class="text-center"> 
                                    <a class="btn btn-outline btn-circle btn-sm blue"
                                       href="<?php echo site_url('users/edit/'.encrypt($row->id));?>">
                                    <i class="fa fa-edit"></i> Edit </a>
                                    
                                    <a class="btn btn-outline btn-circle btn-sm red" href="<?php echo site_url('users/delete/'.encrypt($row->id));?>" onclick="if(!confirm('Are you sure you want to delete this forever?')) return false;" >
                                    <i class="fa fa-trash-o"></i> Delete </a>
                                </td>
                            </tr>
                            <?php } 
                        } else {?>
                            <tr>
                                <td colspan="6">No users found!</td>
                            </tr>
                        <?php }?>
                        
                    </tbody>
                   <?php if( $pagination ) {?>
                     <tfoot>
                          <tr>
                            <td colspan="6">
                                <div class="pull-right">
                                    <ul class="pagination">
                                        <?php echo $pagination;?>
                                    </ul>
                                </div>
                             </td>
                          </tr>
                     </tfoot>
                    <?php }?>
                </table>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->       