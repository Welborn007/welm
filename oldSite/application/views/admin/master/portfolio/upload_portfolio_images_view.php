<link href="<?PHP echo base_url(); ?>css/uploadfile.css" rel="stylesheet">
<script src="<?PHP echo base_url(); ?>js/jquery.uploadfile.min.js"></script>
<aside class="right-side"> 
    <section class="content"> 
        <div class="row">
            <div class="col-md-12">
                <div class="headr-sec alert-info"> 
                    <span class="header">Upload Portfolio Images</span> 
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
                    <input type="hidden" class="form-control noradius" name="portfolio_id" id="portfolio_id" value="<?PHP echo $portfolioDetails[0]['portfolio_id']; ?>" />
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="usernamepopup">Upload Images :</label>
                            <div id="mulitplefileuploader">Upload</div>
                            <div id="status"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="container top-space1">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">       
                        <table class="table table-bordered text-center" id="table_id">
                            <thead class="tb-bg text-white ">                            
                                <tr>
                                    <th class="headname text-center">Sr No</th>
                                    <th class="headname text-center">Images</th>                                  
                                    <th class="headname text-center">Action</th>
                                </tr>
                            </thead>      
                            <tbody>
                                <?PHP $i = 1;
                                foreach ($portfolioImagesDetails as $value) {
                                    ?>
                                    <tr>
                                        <td><?PHP echo $i . "."; ?></td>
                                        <td>
                                            <img src="<?PHP echo base_url(); ?>upload/portpolioImages/<?PHP echo $value['portfolio_image']; ?>" width="100px;"  height="100px;" >
                                        </td>
                                        <td>
                                            <a class="pointer fa fa-trash activate" href="<?php echo base_url(); ?>admin/master/deletePortfolioImages/<?php echo $value['portfolio_images_id']; ?>/<?php echo $value['portfolio_id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete?');"> </a> 
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
<script>
    $(document).ready(function () {                                         
        var settings = {
            url: "<?php echo base_url(); ?>admin/master/uploadme",
            method: "POST",
            allowedTypes: "jpg,png,gif,jpeg,JPG,JPEG,PNG,bmp,BMP",
            fileName: "myfile",
            multiple: true,
            onSuccess: function (files, data, xhr) {

                var portfolio_id = $('#portfolio_id').val();

                var filname = files, data, xhr;
                var mynew_file_name_nn = data;
                var res = mynew_file_name_nn.split(",");
                var mynew_file_name = res[0];
                var imagesize = res[1];
                var removingspecial_char = encodeURIComponent(mynew_file_name);
                var imagedata = "portfolio_id=" + portfolio_id + "&filename=" + removingspecial_char;
                
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/master/savePortfolioImages",
                    type: 'POST',
                    data: imagedata,
                    success: function (msg) {
                        window.location = "<?php echo base_url(); ?>admin/master/uploadPortfolioMultiImages/<?PHP echo $portfolioDetails[0]['portfolio_id']; ?>";
                    }
                });
            },
            onError: function (files, status, errMsg) {
                $("#status").html("<font color='red'>Upload is Failed</font>");
            }
        }
        $("#mulitplefileuploader").uploadFile(settings);
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#update_portfolio").on('submit', (function (e) {
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
                showError("image_name");
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
                    url: "<?php echo base_url(); ?>admin/master/updatePortfolioDetails",
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