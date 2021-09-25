<aside class="right-side"> 
    <section class="content"> 
        <div class="row">
            <div class="col-md-12">
                <div class="headr-sec alert-info"> 
                    <span class="header">About Me </span> 
                    <span class="header pull-right"> 
                        <a style="color: white;" href="<?PHP echo base_url(); ?>admin/master/add_about_me">
                            <strong class="fa fa-plus clickmymodal" style="cursor:pointer;"></strong>
                        </a>
                    </span> 
                </div>
            </div>
        </div>
        
        <div class="container top-space1">
            <div class="row">
                <div class="col-md-12">
                    <?PHP echo $about_list[0]['about_details']; ?>
                </div>
            </div>
        </div>
    </section>
</aside>