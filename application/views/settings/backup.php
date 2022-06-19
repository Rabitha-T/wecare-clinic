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
                	<span>Database Backup</span>
                </li>    
              
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        
        <h3 class="page-title"> Database Backup<hr /></h3>
        <a href="<?php echo site_url('settings/mysql_backup')?>" class="btn green-meadow pull-right"><i class="fa fa-download"></i> Backup Database</a>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
        
            <div class="col-md-12">
            
				<?php if($this->session->flashdata('success')){?>   
                    <div class="alert alert-success">
                        <span><?php echo $this->session->flashdata('success');?></span>
                    </div>
                <?php }?>
                
                <?php if($this->session->flashdata('error')){?>   
                    <div class="alert alert-error">
                        <span><?php echo $this->session->flashdata('error');?></span>
                    </div>
                <?php }?>
            	
                
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Info</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($backups)){
						arsort($backups);
						if( is_array($backups) && count($backups) > 0 ) {
							foreach ($backups as $file):
							$filename = explode("_", $file);
							?>
							<tr>
								<td><?php echo str_replace('.zip', '', $filename[1]);?> <?php echo str_replace('.zip', '', $filename[2]);?></td>
								<td><?php echo str_replace('-', ' ', $filename[0]);?></td>
								<td class="option" style="width:8%">
									<a class="btn-option tt" href="<?php echo site_url('settings/mysql_download/'.$file)?>" title="Download"><i class="fa fa-download"></i></a>
								</td>
							</tr>
							<?php endforeach; 
							} else {?>
						<tr>
							<td colspan="3">You have no backups yet</td>
						</tr> 
						<?php }
						}else{ ?>
						<tr>
							<td colspan="3">You have no backups yet</td>
						</tr> 
						<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->