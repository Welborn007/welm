<aside class="right-side"> 
    <section class="content"> 
        <div class="row">
            <div class="col-md-12">
                <div class="headr-sec alert-info"> 
                    <span class="header">Update About Me </span> 
                    <span class="header pull-right"> 
                        <a style="color: white;" href="<?PHP echo base_url(); ?>admin/master/aboutView">
                            <strong class="fa fa-arrow-left clickmymodal" style="cursor:pointer;"></strong>
                        </a>
                    </span> 
                </div>
            </div>
        </div>

        <div class="container top-space1">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" id="save_about_me">
                        <div class="col-md-12">
                            <input type="hidden" class="form-control noradius" name="about_id" id="about_id" value="<?PHP echo "1"; ?>" />
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="usernamepopup">Description</label>
                                <textarea name="about_details" id="about_details" cols="50" rows="4" class="form-control ckeditor"><?PHP echo $about_list[0]['about_details']; ?></textarea>
                                <input type="hidden" id="about_details_edit" name="about_details_edit" value=""/>
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
        $("#save_about_me").on('submit', (function (e) {
            var hasError = 0;
            var about_details  = CKEDITOR.instances.about_details.getData();
            $('#about_details_edit').val(about_details);
            
            if (hasError == 1) {
                return false;
            } else {
                $('#disableSubmit').hide();
                e.preventDefault();
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/master/updateAboutMeDetails",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (msg) {
                        window.location = "<?php echo base_url(); ?>admin/master/aboutView";
                    }
                });
                return false;
            }
        }));
    });
</script>