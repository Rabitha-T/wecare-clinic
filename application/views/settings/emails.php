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
                	<a href="<?php echo site_url('settings');?>">Settings</a>
                    <i class="fa fa-circle"></i>
                </li>   
                <li>
                	<span>Email Templates</span>
                </li>    
              
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Email Templates<hr /></h3>
        
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
            	
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            
                            <th> Slug </th>
                            <th> Title </th>
                            <th class="text-center"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if( is_array($result) && count($result) > 0 ){?>
                        <?php foreach( $result as $row ){?>
                        <tr>
                            <td> <?php echo $row->slug;?> </td>
                            <td> <?php echo $row->subject;?> </td>
                            <td class="text-center"> 
                                <a class="btn btn-outline btn-circle btn-sm blue" href="<?php echo site_url('settings/edit_template/'.$row->id);?>">
                                <i class="fa fa-edit"></i> Edit </a>
                            </td>
                        </tr>
                        <?php } 
                        } else {?>
                            <tr>
                                <td colspan="7">No templates found!</td>
                            </tr>
                        <?php }?>
                        
                    </tbody>
                   <?php if( $pagination ) {?>
                     <tfoot>
                          <tr>
                            <td colspan="7">
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