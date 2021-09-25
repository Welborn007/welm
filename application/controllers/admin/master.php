<?php

class Master extends CI_Controller {

    function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->no_cache();
        $this->load->model('home_model');
        $this->load->library('email');

        $uploadeduser = $this->session->userdata('adminuser_id');
        if (!$uploadeduser) {
           redirect(base_url() . 'admin/home');
        }
    }

    protected function no_cache() {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    function index() {
//        $tbl                    = "yc_home_slider__details";
//        $show_list              = $this->home_model->display_table($tbl);
//        $data['slider_list']      = $show_list;
        
        $data['active_home_link']    = 'active'; 
        $data['active_home_slider']    = 'active';       
        $data['main_content'] = 'admin/master/home/home_view';
        $this->load->view('admin/includes/template', $data);
    }
    
    function aboutView(){
        $about_list             = $this->home_model->get_record_where('wm_about_details','about_id','1');
        $data['about_list']     = $about_list;
        $data['active_about_link']    = 'active';       
        $data['main_content'] = 'admin/master/about/about_view';
        $this->load->view('admin/includes/template', $data);
    }
    
    function add_about_me(){
        $about_list             = $this->home_model->get_record_where('wm_about_details','about_id','1');
        $data['about_list']     = $about_list;
        $data['active_about_link']    = 'active';       
        $data['main_content'] = 'admin/master/about/update_about_view';
        $this->load->view('admin/includes/template', $data); 
    }
    
    function updateAboutMeDetails(){
        $about_id    = $this->input->post('about_id');
        $about_details      = $this->input->post('about_details_edit');
        $member = array(
            'about_id'      => $about_id,
            'about_details' => $about_details
        );
        $this->home_model->update_Data('about_id', $member, 'wm_about_details');
    }
            
    function portfolioView(){
        $portfolio_list              = $this->home_model->display_table("wm_portfolio_details","order by portfolio_id desc ");
        $data['portfolio_list']      = $portfolio_list;
        $data['active_portfolio_link']    = 'active';       
        $data['main_content'] = 'admin/master/portfolio/portfolio_view';
        $this->load->view('admin/includes/template', $data);
    }
    
    function addPortfolioView(){
        $data['active_portfolio_link']    = 'active';       
        $data['main_content'] = 'admin/master/portfolio/add_portfolio_view';
        $this->load->view('admin/includes/template', $data);
    }
    
    function savePortfolioDetails(){
        $title          = $this->input->post('title');
        $app_link       = $this->input->post('app_link');
        $description    = $this->input->post('description_edit');
        
        $fileName = $_FILES["image_name"]["name"];
        
        $output_dir = "upload/portpolio/";
        $output_dir_mid = "upload/portpolio/750_602/";
        
        //to make thumbnailimages start here
        if( $_FILES["image_name"]["name"]) {
            $fileName = $_FILES["image_name"]["name"];

            $file_ext1 = $this->home_model->file_extension($_FILES['image_name']['name']);
            $tpath = $_FILES['image_name']['tmp_name'];
            $namecode = $this->home_model->generatenamecode();
            $new_picname1 = $output_dir . "" . $namecode . "" . $fileName;
            $el_picname = $output_dir_mid . "" . $namecode . "" . $fileName;

            if (@copy($tpath, "$new_picname1")) {
                list($width, $height) = getimagesize($tpath);
                if ($width > $height) {
                    $desired_width = 602;
                    $desired_height = 750;

                    $desired_width_t = 602;
                    $desired_height_t = floor($height * ($desired_width_t / $width));
                } else {
                    $desired_height = 602;
                    $desired_width = 750;

                    $desired_height_t = 602;
                    $desired_width_t = floor($width * ($desired_height_t / $height));
                }

                if ($file_ext1 == 'jpg')
                    $rimage = imagecreatefromjpeg($new_picname1);
                if ($file_ext1 == 'gif')
                    $rimage = imagecreatefromgif($new_picname1);
                if ($file_ext1 == 'GIF')
                    $rimage = imagecreatefromgif($new_picname1);
                if ($file_ext1 == 'png')
                    $rimage = imagecreatefrompng($new_picname1);
                if ($file_ext1 == 'jpeg')
                    $rimage = imagecreatefrompng($new_picname1);
                if ($file_ext1 == 'JPG')
                    $rimage = imagecreatefromjpeg($new_picname1);


                $image_e = imagecreatetruecolor($desired_width, $desired_height);
                imagecopyresampled($image_e, $rimage, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
                imagejpeg($image_e, "$el_picname", 80);
                imagegif($image_e, "$el_picname", 80);
                imagedestroy($image_e);
                //remove tempfile
                imagedestroy($rimage);
                unlink($new_picname);
            }
        }
        
        $image_name = $namecode . "" . $fileName; 
        
        $data = array(
            'title'         => $title,
            'image_name'    => $image_name,
            'app_link'      => $app_link,
            'description'   => $description,
            'status'        => "1" //1=active,0=inactive
        );
        $tblname = "wm_portfolio_details";
        $this->home_model->insert_and_return($tblname, $data);
    }
    
    function editPortfolio($portfolio_id){
        $portfolioDetails             = $this->home_model->get_record_where('wm_portfolio_details','portfolio_id',$portfolio_id);
        $data['portfolioDetails']     = $portfolioDetails;
        $data['active_portfolio_link']    = 'active';       
        $data['main_content'] = 'admin/master/portfolio/update_portfolio_view';
        $this->load->view('admin/includes/template', $data);
    }
    
    function updatePortfolioDetails(){
        $portfolio_id   = $this->input->post('portfolio_id');
        $title          = $this->input->post('title');
        $app_link       = $this->input->post('app_link');
        $description    = $this->input->post('description_edit');
        $image_name_edit= $this->input->post('image_name_edit');
        
        $fileName = $_FILES["image_name"]["name"];
        
        $output_dir = "upload/portpolio/";
        $output_dir_mid = "upload/portpolio/750_602/";
        
        //to make thumbnailimages start here
        if( $_FILES["image_name"]["name"]) {
            $fileName = $_FILES["image_name"]["name"];

            $file_ext1 = $this->home_model->file_extension($_FILES['image_name']['name']);
            $tpath = $_FILES['image_name']['tmp_name'];
            $namecode = $this->home_model->generatenamecode();
            $new_picname1 = $output_dir . "" . $namecode . "" . $fileName;
            $el_picname = $output_dir_mid . "" . $namecode . "" . $fileName;

            if (@copy($tpath, "$new_picname1")) {
                list($width, $height) = getimagesize($tpath);
                if ($width > $height) {
                    $desired_width = 602;
                    $desired_height = 750;

                    $desired_width_t = 602;
                    $desired_height_t = floor($height * ($desired_width_t / $width));
                } else {
                    $desired_height = 602;
                    $desired_width = 750;

                    $desired_height_t = 602;
                    $desired_width_t = floor($width * ($desired_height_t / $height));
                }

                if ($file_ext1 == 'jpg')
                    $rimage = imagecreatefromjpeg($new_picname1);
                if ($file_ext1 == 'gif')
                    $rimage = imagecreatefromgif($new_picname1);
                if ($file_ext1 == 'GIF')
                    $rimage = imagecreatefromgif($new_picname1);
                if ($file_ext1 == 'png')
                    $rimage = imagecreatefrompng($new_picname1);
                if ($file_ext1 == 'jpeg')
                    $rimage = imagecreatefrompng($new_picname1);
                if ($file_ext1 == 'JPG')
                    $rimage = imagecreatefromjpeg($new_picname1);


                $image_e = imagecreatetruecolor($desired_width, $desired_height);
                imagecopyresampled($image_e, $rimage, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
                imagejpeg($image_e, "$el_picname", 80);
                imagegif($image_e, "$el_picname", 80);
                imagedestroy($image_e);
                //remove tempfile
                imagedestroy($rimage);
                unlink($new_picname);
            }
        }
        
        if($fileName){
            $image_name = $namecode . "" . $fileName; 
        } else {
            $image_name = $image_name_edit;  
        }        
        
        $member = array(
            'portfolio_id'  => $portfolio_id,
            'title'         => $title,
            'image_name'    => $image_name,
            'app_link'      => $app_link,
            'description'   => $description
        );
        $this->home_model->update_Data('portfolio_id', $member, 'wm_portfolio_details');
    }
    
    function deletePortfolio($portfolio_id){
        $this->home_model->delete_Data("portfolio_id", $portfolio_id, 'wm_portfolio_details');
        redirect(base_url()."admin/master/portfolioView");
    }
    
    function updatePortfolioStatus($portfolio_id,$status){
        $member = array(
            'portfolio_id'  => $portfolio_id,
            'status'        => $status
        );
        $this->home_model->update_Data('portfolio_id', $member, 'wm_portfolio_details');
        redirect(base_url()."admin/master/portfolioView");
    }
            
    function testimonialsView(){
        $testimonial_list              = $this->home_model->display_table("wm_testimonial_details","order by testimonial_id desc ");
        $data['testimonial_list']      = $testimonial_list;
        $data['active_testimonial_link']    = 'active';       
        $data['main_content'] = 'admin/master/testimonial/testimonial_view';
        $this->load->view('admin/includes/template', $data);
    }
    
    function addTestimonialsView(){
        $data['active_testimonial_link']    = 'active';       
        $data['main_content'] = 'admin/master/testimonial/add_testimonial_view';
        $this->load->view('admin/includes/template', $data);
    }
    
    function saveTestimonialDetails(){
        $user_name      = $this->input->post('user_name');
        $company_name   = $this->input->post('company_name');
        $description    = $this->input->post('description_edit');
        $ip             = $this->input->ip_address();
        
        $fileName = $_FILES["image_name"]["name"];
        
        $output_dir = "upload/avatar/";
        $output_dir_mid = "upload/avatar/45_45/";
        
        //to make thumbnailimages start here
        if( $_FILES["image_name"]["name"]) {
            $fileName = $_FILES["image_name"]["name"];

            $file_ext1 = $this->home_model->file_extension($_FILES['image_name']['name']);
            $tpath = $_FILES['image_name']['tmp_name'];
            $namecode = $this->home_model->generatenamecode();
            $new_picname1 = $output_dir . "" . $namecode . "" . $fileName;
            $el_picname = $output_dir_mid . "" . $namecode . "" . $fileName;

            if (@copy($tpath, "$new_picname1")) {
                list($width, $height) = getimagesize($tpath);
                if ($width > $height) {
                    $desired_width = 60;
                    $desired_height = 60;

                    $desired_width_t = 60;
                    $desired_height_t = floor($height * ($desired_width_t / $width));
                } else {
                    $desired_height = 60;
                    $desired_width = 60;

                    $desired_height_t = 60;
                    $desired_width_t = floor($width * ($desired_height_t / $height));
                }

                if ($file_ext1 == 'jpg')
                    $rimage = imagecreatefromjpeg($new_picname1);
                if ($file_ext1 == 'gif')
                    $rimage = imagecreatefromgif($new_picname1);
                if ($file_ext1 == 'GIF')
                    $rimage = imagecreatefromgif($new_picname1);
                if ($file_ext1 == 'png')
                    $rimage = imagecreatefrompng($new_picname1);
                if ($file_ext1 == 'jpeg')
                    $rimage = imagecreatefrompng($new_picname1);
                if ($file_ext1 == 'JPG')
                    $rimage = imagecreatefromjpeg($new_picname1);


                $image_e = imagecreatetruecolor($desired_width, $desired_height);
                imagecopyresampled($image_e, $rimage, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
                imagejpeg($image_e, "$el_picname", 80);
                imagegif($image_e, "$el_picname", 80);
                imagedestroy($image_e);
                //remove tempfile
                imagedestroy($rimage);
                unlink($new_picname);
            }
            $image_name = $namecode . "" . $fileName; 
        } else {
            $image_name = "default_avatar.png"; 
        }
                
        $data = array(
            'user_name'     => $user_name,
            'company_name'  => $company_name,
            'avatar'        => $image_name,
            'description'   => $description,
            'ip'            => $ip,
            'status'        => "1" //1=active,0=inactive
        );
        $tblname = "wm_testimonial_details";
        $this->home_model->insert_and_return($tblname, $data);
    }
            
    function updateTestimonialStatus($testimonial_id,$status){
        $member = array(
            'testimonial_id'    => $testimonial_id,
            'status'            => $status
        );
        $this->home_model->update_Data('testimonial_id', $member, 'wm_testimonial_details');
        redirect(base_url()."admin/master/testimonialsView");
    }
    
    function editTestimonial($testimonial_id){
        $testimonialDetails             = $this->home_model->get_record_where('wm_testimonial_details','testimonial_id',$testimonial_id);
        $data['testimonialDetails']     = $testimonialDetails;
        $data['active_testimonial_link']    = 'active';       
        $data['main_content'] = 'admin/master/testimonial/update_testimonial_view';
        $this->load->view('admin/includes/template', $data);
    }
    
    function updateTestimonialDetails(){
        $testimonial_id = $this->input->post('testimonial_id');
        $user_name      = $this->input->post('user_name');
        $company_name   = $this->input->post('company_name');
        $description    = $this->input->post('description_edit');
        $image_name_edit= $this->input->post('image_name_edit');
        
        $fileName = $_FILES["image_name"]["name"];
        
        $output_dir = "upload/avatar/";
        $output_dir_mid = "upload/avatar/45_45/";
        
        //to make thumbnailimages start here
        if( $_FILES["image_name"]["name"]) {
            $fileName = $_FILES["image_name"]["name"];

            $file_ext1 = $this->home_model->file_extension($_FILES['image_name']['name']);
            $tpath = $_FILES['image_name']['tmp_name'];
            $namecode = $this->home_model->generatenamecode();
            $new_picname1 = $output_dir . "" . $namecode . "" . $fileName;
            $el_picname = $output_dir_mid . "" . $namecode . "" . $fileName;

            if (@copy($tpath, "$new_picname1")) {
                list($width, $height) = getimagesize($tpath);
                if ($width > $height) {
                    $desired_width = 60;
                    $desired_height = 60;

                    $desired_width_t = 60;
                    $desired_height_t = floor($height * ($desired_width_t / $width));
                } else {
                    $desired_height = 60;
                    $desired_width = 60;

                    $desired_height_t = 60;
                    $desired_width_t = floor($width * ($desired_height_t / $height));
                }

                if ($file_ext1 == 'jpg')
                    $rimage = imagecreatefromjpeg($new_picname1);
                if ($file_ext1 == 'gif')
                    $rimage = imagecreatefromgif($new_picname1);
                if ($file_ext1 == 'GIF')
                    $rimage = imagecreatefromgif($new_picname1);
                if ($file_ext1 == 'png')
                    $rimage = imagecreatefrompng($new_picname1);
                if ($file_ext1 == 'jpeg')
                    $rimage = imagecreatefrompng($new_picname1);
                if ($file_ext1 == 'JPG')
                    $rimage = imagecreatefromjpeg($new_picname1);


                $image_e = imagecreatetruecolor($desired_width, $desired_height);
                imagecopyresampled($image_e, $rimage, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
                imagejpeg($image_e, "$el_picname", 80);
                imagegif($image_e, "$el_picname", 80);
                imagedestroy($image_e);
                //remove tempfile
                imagedestroy($rimage);
                unlink($new_picname);
            }
        }
        
        if($fileName){
            $image_name = $namecode . "" . $fileName; 
        } else {
            $image_name = $image_name_edit;  
        }        
        
        $member = array(
            'testimonial_id' => $testimonial_id,
            'user_name'     => $user_name,
            'company_name'  => $company_name,
            'avatar'        => $image_name,
            'description'   => $description
        );
        $this->home_model->update_Data('testimonial_id', $member, 'wm_testimonial_details');
    }
            
    function deleteTestimonial($testimonial_id){
        $this->home_model->delete_Data("testimonial_id", $testimonial_id, 'wm_testimonial_details');
        redirect(base_url()."admin/master/testimonialsView");
    }
            
    function blogView(){
        $blog_list              = $this->home_model->display_table("wm_blog_details","order by blog_id desc ");
        $data['blog_list']      = $blog_list;
        $data['active_blog_link']    = 'active';       
        $data['main_content'] = 'admin/master/blog/blog_view';
        $this->load->view('admin/includes/template', $data);
    }
    
    function addBlogView(){
        $data['active_blog_link']    = 'active';       
        $data['main_content'] = 'admin/master/blog/add_blog_view';
        $this->load->view('admin/includes/template', $data);
    }
    
    function saveBlogDetails(){
        $title          = $this->input->post('title');
        $description    = $this->input->post('description_edit');
        
        $fileName = $_FILES["image_name"]["name"];
        
        $output_dir = "upload/blog/";
        $output_dir_mid = "upload/blog/400_250/";
        
        //to make thumbnailimages start here
        if( $_FILES["image_name"]["name"]) {
            $fileName = $_FILES["image_name"]["name"];

            $file_ext1 = $this->home_model->file_extension($_FILES['image_name']['name']);
            $tpath = $_FILES['image_name']['tmp_name'];
            $namecode = $this->home_model->generatenamecode();
            $new_picname1 = $output_dir . "" . $namecode . "" . $fileName;
            $el_picname = $output_dir_mid . "" . $namecode . "" . $fileName;

            if (@copy($tpath, "$new_picname1")) {
                list($width, $height) = getimagesize($tpath);
                if ($width > $height) {
                    $desired_width = 250;
                    $desired_height = 400;

                    $desired_width_t = 250;
                    $desired_height_t = floor($height * ($desired_width_t / $width));
                } else {
                    $desired_height = 250;
                    $desired_width = 400;

                    $desired_height_t = 250;
                    $desired_width_t = floor($width * ($desired_height_t / $height));
                }

                if ($file_ext1 == 'jpg')
                    $rimage = imagecreatefromjpeg($new_picname1);
                if ($file_ext1 == 'gif')
                    $rimage = imagecreatefromgif($new_picname1);
                if ($file_ext1 == 'GIF')
                    $rimage = imagecreatefromgif($new_picname1);
                if ($file_ext1 == 'png')
                    $rimage = imagecreatefrompng($new_picname1);
                if ($file_ext1 == 'jpeg')
                    $rimage = imagecreatefrompng($new_picname1);
                if ($file_ext1 == 'JPG')
                    $rimage = imagecreatefromjpeg($new_picname1);


                $image_e = imagecreatetruecolor($desired_width, $desired_height);
                imagecopyresampled($image_e, $rimage, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
                imagejpeg($image_e, "$el_picname", 80);
                imagegif($image_e, "$el_picname", 80);
                imagedestroy($image_e);
                //remove tempfile
                imagedestroy($rimage);
                unlink($new_picname);
            }
        }
        
        $image_name = $namecode . "" . $fileName; 
        
        $data = array(
            'title'         => $title,
            'image_name'    => $image_name,
            'description'   => $description,
            'status'        => "1" //1=active,0=inactive
        );
        $tblname = "wm_blog_details";
        $this->home_model->insert_and_return($tblname, $data);
    }
            
    function updateBlogStatus($blog_id,$status){
        $member = array(
            'blog_id'   => $blog_id,
            'status'    => $status
        );
        $this->home_model->update_Data('blog_id', $member, 'wm_blog_details');
        redirect(base_url()."admin/master/blogView");
    }
    
    function editBlog($blog_id){
        $blogDetails             = $this->home_model->get_record_where('wm_blog_details','blog_id',$blog_id);
        $data['blogDetails']     = $blogDetails;
        $data['active_blog_link']    = 'active';       
        $data['main_content'] = 'admin/master/blog/update_blog_view';
        $this->load->view('admin/includes/template', $data);
    }
    
    function updateBlogDetails(){
        $blog_id        = $this->input->post('blog_id');
        $title          = $this->input->post('title');
        $description    = $this->input->post('description_edit');
        $image_name_edit= $this->input->post('image_name_edit');
        
        $fileName = $_FILES["image_name"]["name"];
        
        $output_dir = "upload/blog/";
        $output_dir_mid = "upload/blog/400_250/";
        
        //to make thumbnailimages start here
        if( $_FILES["image_name"]["name"]) {
            $fileName = $_FILES["image_name"]["name"];

            $file_ext1 = $this->home_model->file_extension($_FILES['image_name']['name']);
            $tpath = $_FILES['image_name']['tmp_name'];
            $namecode = $this->home_model->generatenamecode();
            $new_picname1 = $output_dir . "" . $namecode . "" . $fileName;
            $el_picname = $output_dir_mid . "" . $namecode . "" . $fileName;

            if (@copy($tpath, "$new_picname1")) {
                list($width, $height) = getimagesize($tpath);
                if ($width > $height) {
                    $desired_width = 250;
                    $desired_height = 400;

                    $desired_width_t = 250;
                    $desired_height_t = floor($height * ($desired_width_t / $width));
                } else {
                    $desired_height = 250;
                    $desired_width = 400;

                    $desired_height_t = 250;
                    $desired_width_t = floor($width * ($desired_height_t / $height));
                }

                if ($file_ext1 == 'jpg')
                    $rimage = imagecreatefromjpeg($new_picname1);
                if ($file_ext1 == 'gif')
                    $rimage = imagecreatefromgif($new_picname1);
                if ($file_ext1 == 'GIF')
                    $rimage = imagecreatefromgif($new_picname1);
                if ($file_ext1 == 'png')
                    $rimage = imagecreatefrompng($new_picname1);
                if ($file_ext1 == 'jpeg')
                    $rimage = imagecreatefrompng($new_picname1);
                if ($file_ext1 == 'JPG')
                    $rimage = imagecreatefromjpeg($new_picname1);


                $image_e = imagecreatetruecolor($desired_width, $desired_height);
                imagecopyresampled($image_e, $rimage, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
                imagejpeg($image_e, "$el_picname", 80);
                imagegif($image_e, "$el_picname", 80);
                imagedestroy($image_e);
                //remove tempfile
                imagedestroy($rimage);
                unlink($new_picname);
            }
        }
        
        if($fileName){
            $image_name = $namecode . "" . $fileName; 
        } else {
            $image_name = $image_name_edit;  
        }        
        
        $member = array(
            'blog_id'       => $blog_id,
            'title'         => $title,
            'image_name'    => $image_name,
            'description'   => $description
        );
        $this->home_model->update_Data('blog_id', $member, 'wm_blog_details');
    }
    
    function deleteBlog($blog_id){
        $this->home_model->delete_Data("blog_id", $blog_id, 'wm_blog_details');
        redirect(base_url()."admin/master/blogView");
    }
            
    function contactView(){
        $contact_list              = $this->home_model->display_table("wm_contact_details","order by contact_id desc ");
        $data['contact_list']      = $contact_list;
        $data['active_contact_link']    = 'active';       
        $data['main_content'] = 'admin/master/contact/contact_view';
        $this->load->view('admin/includes/template', $data);
    }
    
    function uploadPortfolioMultiImages($portfolio_id){
        $portfolioDetails             = $this->home_model->get_record_where('wm_portfolio_details','portfolio_id',$portfolio_id);
        $data['portfolioDetails']     = $portfolioDetails;
        $portfolioImagesDetails             = $this->home_model->get_record_where('wm_portfolio_images_details','portfolio_id',$portfolio_id);
        $data['portfolioImagesDetails']     = $portfolioImagesDetails;
        $data['active_portfolio_link']    = 'active';       
        $data['main_content'] = 'admin/master/portfolio/upload_portfolio_images_view';
        $this->load->view('admin/includes/template', $data);        
    }
    
    function deletePortfolioImages($portfolio_images_id,$portfolio_id){
        $this->home_model->delete_Data("portfolio_images_id", $portfolio_images_id, 'wm_portfolio_images_details');
        redirect(base_url()."admin/master/uploadPortfolioMultiImages/$portfolio_id");
    }
    
    function uploadme(){       
        $output_dir = "upload/portpolioImages/";
        $output_dir_mid = "upload/portpolioImages/400_280/";         
        $ret = array();       
                  
        if (!is_array($_FILES["myfile"]['name'])) { 
            $datastring=strtotime(date('Y-m-d H:i:s'));
            $myexactfilename_row=trim($_FILES["myfile"]["name"]);
            $myexactfilename = preg_replace('/[^A-Za-z0-9\-.]/', 'z', $myexactfilename_row);
            $file_ext1=$this->home_model->file_extension($_FILES['myfile']['name']);                     
            $tpath=$_FILES['myfile']['tmp_name'];
            $namecode=$this->home_model->generatenamecode();
            $fileName_row = $namecode."".$datastring."".$myexactfilename;
            $fileName = preg_replace('/[^A-Za-z0-9\-.]/', 'z', $fileName_row);
            $new_picname1=$output_dir."".$fileName;
            $el_picname=$output_dir_mid."".$fileName;
            
            move_uploaded_file($tpath, "$output_dir/$fileName");
           
            //CREATE IMAGE othesize SIZE      
            $this->imageResize($output_dir_mid,$output_dir,$fileName,750,602);
 
            $imagesize= $_FILES['myfile']['size'];
            $fileName.','.$imagesize;
            $ret[$fileName] = $output_dir . $fileName;

            echo $fileName;
           
        } else {
            $fileCount = count($_FILES["myfile"]['name']);
            for ($i = 0; $i < $fileCount; $i++) {
                $datastring=strtotime(date('Y-m-d H:i:s'));
                $fileName_row = trim($_FILES["myfile"]["name"][$i]);
                $fileName = preg_replace('/[^A-Za-z0-9\-.]/', 'z', $fileName_row);
                
                $ret[$fileName] = $output_dir . $fileName;
                
                $file_ext1=$this->file_extension($_FILES["myfile"]["name"][$i]);
             
                $tpath=$_FILES['myfile']['tmp_name'];
                $namecode=$this->home_model->generatenamecode();
                $fileNamell = $namecode."".$datastring."".$fileName;
                $new_picname1=$output_dir."".$fileNamell;
                $el_picname=$output_dir_mid."".$fileNamell;

                move_uploaded_file($tpath, "$output_dir/$fileName");
                 
                $this->imageResize($output_dir_mid,$output_dir,$fileName,750,602);
                echo $fileName;
            }
        }
    }
    
    function imageResize($imagePath,$output_dir,$filename,$width,$heigth){      
        $this->load->library('image_lib');
        $output_dir_thumb  = $imagePath;
        $config_thumb['image_library'] = 'gd2';
        $config_thumb['source_image'] = $output_dir."".$filename;
        $config_thumb['new_image'] = $output_dir_thumb."".$filename;
        $config_thumb['create_thumb'] = FALSE;
        $config_thumb['maintain_ratio'] = FALSE;
        $config_thumb['width'] = $width;
        $config_thumb['height']= $heigth;
        $this->image_lib->clear();
        $this->image_lib->initialize($config_thumb);
        $this->image_lib->resize();

        if (!$this->image_lib->resize()){
            $this->image_lib->display_errors();
        }
    }
    
    function savePortfolioImages(){
        $portfolio_id   = $this->input->post('portfolio_id');
        $filename_row   = trim($this->input->post('filename'));   
        $filename       = preg_replace('/[^A-Za-z0-9\-.]/', 'z', $filename_row);
        $user_id        =  $this->input->post('user_id');
        $ip             = $this->input->ip_address();        

        $data = array(
            'portfolio_id'      => $portfolio_id,
            'portfolio_image'   => $filename,
            'user_id'           => $user_id,
            'ip'                => $ip
        );
        $tblname = "wm_portfolio_images_details";
        $this->home_model->insert_and_return($tblname, $data);
    }
}

?>