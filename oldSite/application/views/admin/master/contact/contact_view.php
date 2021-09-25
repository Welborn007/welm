<aside class="right-side"> 
    <section class="content"> 
        <div class="row">
            <div class="col-md-12">
                <div class="headr-sec alert-info"> 
                    <span class="header">Contact </span>  
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
                                    <th class="headname text-center">Name</th>
                                    <th class="headname text-center">Email</th>                                  
                                    <th class="headname text-center">Message</th>                             
                                    <th class="headname text-center">Upload Date</th>
                                </tr>
                            </thead>      
                            <tbody>
                                <?PHP $i = 1;
                                foreach ($contact_list as $value) {
                                    ?>
                                    <tr>
                                        <td><?PHP echo $i . "."; ?></td>
                                        <td>
                                            <?php echo $value['contact_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['contact_email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['message']; ?>
                                        </td>   
                                        <td>
                                            <?php echo $value['upload_time']; ?>
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