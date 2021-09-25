<aside class="right-side"> 
    <section class="content"> 
        <div class="row">
            <div class="col-md-12">
                <div class="headr-sec alert-info"> 
                    <span class="header">Portfolio Details </span> 
                    <span class="header pull-right"> 
                        <a style="color: white;" href="<?PHP echo base_url(); ?>admin/master/addPortfolioView">
                            <strong class="fa fa-plus clickmymodal" style="cursor:pointer;"></strong>
                        </a>
                    </span> 
                </div>
            </div>
        </div>
        
        <div class="container top-space1">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">       
                        <table class="table table-bordered text-center" id="table_id">
                            <thead class="tb-bg text-white ">                            
                                <tr>
                                    <th class="headname text-center">Sr No</th>
                                    <th class="headname text-center">Title</th>
                                    <th class="headname text-center">Images</th>                                  
                                    <th class="headname text-center">Action</th>
                                </tr>
                            </thead>      
                            <tbody>
                                <?PHP $i = 1;
                                foreach ($portfolio_list as $value) {
                                    ?>
                                    <tr>
                                        <td><?PHP echo $i . "."; ?></td>
                                        <td>
                                            <?php echo $value['title']; ?>
                                        </td>
                                        <td>
                                            <img src="<?PHP echo base_url(); ?>upload/portpolio/<?PHP echo $value['image_name']; ?>" width="100px;"  height="100px;" >
                                        </td>
                                        <td>
                                            <?PHP if($value['status'] == '1'){ ?>
                                                <a class="pointer fa fa-check activate" href="<?php echo base_url(); ?>admin/master/updatePortfolioStatus/<?php echo $value['portfolio_id']; ?>/0"></a>
                                            <?PHP } else if($value['status'] == '0'){ ?>
                                                <a class="pointer fa fa-remove activate" href="<?php echo base_url(); ?>admin/master/updatePortfolioStatus/<?php echo $value['portfolio_id']; ?>/1"></a>
                                            <?PHP } ?>                                            
                                            <a class="pointer fa fa-pencil activate" href="<?php echo base_url(); ?>admin/master/editPortfolio/<?php echo $value['portfolio_id']; ?>" title="Edit"></a>
                                      
                                            <a class="pointer fa fa-trash activate" href="<?php echo base_url(); ?>admin/master/deletePortfolio/<?php echo $value['portfolio_id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete?');"> </a> 
                                            <a title="Upload Images" href="<?php echo base_url(); ?>admin/master/uploadPortfolioMultiImages/<?php echo $value['portfolio_id']; ?>"><i class="fa fa-upload activate"></i></a>
                                        </td>                         
                                    </tr>
                                    <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</aside>