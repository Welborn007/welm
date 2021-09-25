<aside class="right-side"> 
    <section class="content"> 
        <div class="row">
            <div class="col-md-12">
                <div class="headr-sec alert-info"> 
                    <span class="header">Update Testimonial </span> 
                    <span class="header pull-right"> 
                        <a style="color: white;" href="<?PHP echo base_url(); ?>admin/master/testimonialsView">
                            <strong class="fa fa-arrow-left clickmymodal" style="cursor:pointer;"></strong>
                        </a>
                    </span> 
                </div>
            </div>
        </div>

        <div class="container top-space1">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" id="update_testimonial">
                        <input type="hidden" class="form-control noradius" name="testimonial_id" id="testimonial_id" value="<?PHP echo $testimonialDetails[0]['testimonial_id']; ?>" />
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="usernamepopup">Title</label>
                                <input type="text" class="form-control noradius" name="user_name" id="user_name" value="<?PHP echo $testimonialDetails[0]['user_name']; ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="usernamepopup">Company Name</label>
                                <input type="text" class="form-control noradius" name="company_name" id="company_name" value="<?PHP echo $testimonialDetails[0]['company_name']; ?>" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><div class="addpic">Avatar</div></label>
                                <div>
                                    <span class='btn btn-default'> 
                                        <input type="file" name="image_name" id="image_name" title="upload img" class="layout_one_slider_img"/>
                                    </span>
                                    <span class='label label-info' id="upload-file-info"></span>
                                </div>
                                
                                <input type="hidden" id="image_name_edit" name="image_name_edit" value="<?PHP echo $testimonialDetails[0]['avatar']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="usernamepopup">Description</label>
                                <textarea name="description" id="description" cols="50" rows="4" class="form-control ckeditor"><?PHP echo $testimonialDetails[0]['description']; ?></textarea>
                                <input type="hidden" id="description_edit" name="description_edit" value=""/>
                            </div>
                        </div>

                        <div id="disableSubmit">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-primary" >Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</aside>

<script type="text/javascript">
    $(document).ready(function () {
        $("#update_testimonial").on('submit', (function (e) {
            var hasError = 0;
            var user_name = $('#user_name').val();
            var company_name = $('#company_name').val();

            var description = CKEDITOR.instances.description.getData();
            $('#description_edit').val(description);
            
            if (jQuery.trim(user_name) == '') {
                showError("Please enter name!", "user_name");
                hasError = 1;
                return  false;
            } else {
                changeError("user_name");
            }
            
            if (jQuery.trim(company_name) == '') {
                showError("Please enter company name!", "company_name");
                hasError = 1;
                return  false;
            } else {
                changeError("company_name");
            }

            if (hasError == 1) {
                return false;
            } else {
                $('#disableSubmit').hide();
                e.preventDefault();
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/master/updateTestimonialDetails",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (msg){
                        window.location = "<?php echo base_url(); ?>admin/master/testimonialsView";
                    }
                });
                return false;
            }
        }));
    });
</script>