<aside class="right-side"> 
    <section class="content"> 
        <div class="row">
            <div class="col-md-12">
                <div class="headr-sec alert-info"> 
                    <span class="header">Testimonials </span> 
                    <span class="header pull-right"> 
                        <a style="color: white;" href="<?PHP echo base_url(); ?>admin/master/addTestimonialsView">
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
                                    <th class="headname text-center">User Name</th>
                                    <th class="headname text-center">Company Name</th>
                                    <th class="headname text-center">Images</th>                                  
                                    <th class="headname text-center">Action</th>
                                </tr>
                            </thead>      
                            <tbody>
                                <?PHP $i = 1;
                                foreach ($testimonial_list as $value) {
                                    ?>
                                    <tr>
                                        <td><?PHP echo $i . "."; ?></td>
                                        <td>
                                            <?php echo $value['user_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['company_name']; ?>
                                        </td>
                                        <td>
                                            <img src="<?PHP echo base_url(); ?>upload/avatar/<?PHP echo $value['avatar']; ?>" width="100px;"  height="100px;" >
                                        </td>
                                        <td>
                                            <?PHP if($value['status'] == '1'){ ?>
                                                <a class="pointer fa fa-check activate" href="<?php echo base_url(); ?>admin/master/updateTestimonialStatus/<?php echo $value['testimonial_id']; ?>/0"></a>
                                            <?PHP } else if($value['status'] == '0'){ ?>
                                                <a class="pointer fa fa-remove activate" href="<?php echo base_url(); ?>admin/master/updateTestimonialStatus/<?php echo $value['testimonial_id']; ?>/1"></a>
                                            <?PHP } ?>                                            
                                            <a class="pointer fa fa-pencil activate" href="<?php echo base_url(); ?>admin/master/editTestimonial/<?php echo $value['testimonial_id']; ?>" title="Edit"></a>
                                      
                                            <a class="pointer fa fa-trash activate" href="<?php echo base_url(); ?>admin/master/deleteTestimonial/<?php echo $value['testimonial_id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete?');"> </a> 
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