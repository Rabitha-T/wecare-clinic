<style>

    .gif_loading_wrap{
        width: 100% !important;
        background-color: #FAFCFA !important;
        text-align: center !important;
    }
    .loading_img{
        height: 70px;
    }
</style>
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
                    <span>Departments</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Departments<hr /></h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">

            <div class="col-md-12" style="margin-bottom: 10px">

                <a href="<?php echo site_url('departments/create'); ?>"
                   class="btn btn-default btn-outline  pull-right " > Add New </a>

            </div>

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


                

            	<div class="table-responsive">

                    <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            
                            <th>Event Category</th>

                            <th class="text-center"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if( is_array($result) && count($result) > 0 ){?>
							<?php foreach( $result as $row ){
                            ?>
                            <tr>
                                <td> <?php echo $row->name;?> </td>
                                
                                <td class="text-center">


                                    
                                    <a class="btn btn-outline btn-circle btn-sm red" href="<?php echo site_url('departments/delete/'.encrypt($row->id));?>" onclick="if(!confirm('Are you sure you want to delete this forever?')) return false;" >
                                    <i class="fa fa-trash-o"></i> Delete </a>
                                </td>
                            </tr>
                            <?php } 
                             } else {?>
                                <tr>
                                    <td colspan="6">No data found!</td>
                                </tr>
                        <?php }?>
                        
                    </tbody>

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
<div class="modal fade" id="edit_property_modal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-body">

                <div class="gif_loading_wrap" align="center "><img class="loading_img" src="<?php echo base_url('files/media/loading_gif.gif');?>"; ></div>

            </div>

        </div>

    </div>
</div>