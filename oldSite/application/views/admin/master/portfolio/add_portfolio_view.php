<aside class="right-side"> 
    <section class="content"> 
        <div class="row">
            <div class="col-md-12">
                <div class="headr-sec alert-info"> 
                    <span class="header">Add Portfolio </span> 
                    <span class="header pull-right"> 
                        <a style="color: white;" href="<?PHP echo base_url(); ?>admin/master/portfolioView">
                            <strong class="fa fa-arrow-left clickmymodal" style="cursor:pointer;"></strong>
                        </a>
                    </span> 
                </div>
            </div>
        </div>

        <div class="container top-space1">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" id="save_portfolio">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="usernamepopup">Title</label>
                                <input type="text" class="form-control noradius" name="title" id="title"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="usernamepopup">App Link</label>
                                <input type="text" class="form-control noradius" name="app_link" id="app_link"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><div class="addpic">Add Image...</div></label>
                                <div>
                                    <span class='btn btn-default'> 
                                        <input type="file" name="image_name" id="image_name" title="upload img" class="layout_one_slider_img"/>
                                    </span>
                                    <span class='label label-info' id="upload-file-info"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="usernamepopup">Description</label>
                                <textarea name="description" id="description" cols="50" rows="4" class="form-control ckeditor"></textarea>
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
        $("#save_portfolio").on('submit', (function (e) {
            var hasError = 0;
            var title = $('#title').val();

            var image_name = $('#image_name').val();
            var description = CKEDITOR.instances.description.getData();
            $('#description_edit').val(description);
            
            if (jQuery.trim(title) == '') {
                showError("Please enter title!", "title");
                hasError = 1;
                return  false;
            } else {
                changeError("title");
            }
            
            if (jQuery.trim(image_name) == '') {
                showError("Please select image!", "image_name");
                hasError = 1;
                return  false;
            } else {
                var fields = image_name.split(".");
                var ext = fields[1];
                if(ext == 'png' || ext == 'PNG' || ext == 'jpg' || ext == 'jpeg' || ext == 'JPG' || ext == 'JPEG' || ext == 'gif'){
                    changeError("image_name");
                } else {
                   showError("Please select proper image!", "image_name");
                   return  false;
                }
                changeError("image_name");
            }

            if (hasError == 1) {
                return false;
            } else {
                $('#disableSubmit').hide();
                e.preventDefault();
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/master/savePortfolioDetails",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (msg){
                        window.location = "<?php echo base_url(); ?>admin/master/portfolioView";
                    }
                });
                return false;
            }
        }));
    });
</script>