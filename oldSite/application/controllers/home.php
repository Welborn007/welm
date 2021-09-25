<?php

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('home_model');
    }

    function index() {
        $portfolio_list              = $this->home_model->display_table("wm_portfolio_details","order by portfolio_id desc ");
        $data['portfolio_list']      = $portfolio_list;
        $blog_list              = $this->home_model->display_table("wm_blog_details","order by blog_id desc ");
        $data['blog_list']      = $blog_list;
        $data['home_nav'] = "current-menu-item current_page_item";
        $data['main_content'] = 'home/index';
        $this->load->view('includes/template', $data);
    }
    
    function about(){
        $about_list             = $this->home_model->get_record_where('wm_about_details','about_id','1');
        $data['about_list']     = $about_list;
        $data['about_nav'] = "current-menu-item current_page_item";
        $data['main_content'] = 'home/about_view';
        $this->load->view('includes/template', $data);
    }
    
    function portfolio(){
        $portfolio_list              = $this->home_model->display_table("wm_portfolio_details","order by portfolio_id desc ");
        $data['portfolio_list']      = $portfolio_list;
        $data['portfolio_nav'] = "current-menu-item current_page_item";
        $data['main_content'] = 'home/portfolio_view';
        $this->load->view('includes/template', $data);
    }
    
    function showOnePortfolio($portfolio_id){
        $portfolioDetails             = $this->home_model->get_record_where('wm_portfolio_details','portfolio_id',$portfolio_id);
        $data['portfolioDetails']     = $portfolioDetails;
        $portfolioImagesDetails             = $this->home_model->get_record_where('wm_portfolio_images_details','portfolio_id',$portfolio_id);
        $data['portfolioImagesDetails']     = $portfolioImagesDetails;
        if(($portfolioDetails[0]['status'] == '0') || (count($portfolioDetails) == 0)){
            redirect(base_url()."home/portfolio");
        } else {
            $data['portfolio_nav'] = "current-menu-item current_page_item";
            $data['main_content'] = 'home/show_one_portfolio_view';
            $this->load->view('includes/template', $data);
        } 
    }
            
    function testimonials(){
        $testimonialsDetails             = $this->home_model->display_table("wm_testimonial_details","order by testimonial_id desc ");
        $data['testimonialsDetails']     = $testimonialsDetails;
        $data['testimonials_nav'] = "current-menu-item current_page_item";
        $data['main_content'] = 'home/testimonials_view';
        $this->load->view('includes/template', $data);
    }
    
    function blog(){
        $blog_list              = $this->home_model->display_table("wm_blog_details","order by blog_id desc ");
        $data['blog_list']      = $blog_list;
        $data['blog_nav'] = "current-menu-item current_page_item";
        $data['main_content'] = 'home/blog_view';
        $this->load->view('includes/template', $data);
    }
    
    function showOneBlog($blog_id){
        $blogDetails             = $this->home_model->get_record_where('wm_blog_details','blog_id',$blog_id);
        $data['blogDetails']     = $blogDetails;
        if(($blogDetails[0]['status'] == '0') || (count($blogDetails) == 0)){
            redirect(base_url()."home/blog");
        } else {
           $data['blog_nav'] = "current-menu-item current_page_item";
            $data['main_content'] = 'home/show_one_blog_view';
            $this->load->view('includes/template', $data); 
        }        
    }
            
    function contact(){
        $data['contact_nav'] = "current-menu-item current_page_item";
        $data['main_content'] = 'home/contact_view';
        $this->load->view('includes/template', $data);
    }

    function privacy_policy(){
        //$data['contact_nav'] = "current-menu-item current_page_item";
        //$data['main_content'] = 'home/privacy_policy';
        $this->load->view('home/privacy_policy');
    }
    
    function saveContactDetails(){
        $contact_name   = $this->input->post('contact_name');
        $contact_email  = $this->input->post('contact_email');
        $message        = $this->input->post('message');
        $ip             = $this->input->ip_address();
        $data = array(
            'contact_name'  => $contact_name,
            'contact_email' => $contact_email,
            'message'       => $message,
            'ip'            => $ip
        );
        $tblname = "wm_contact_details";
        $this->home_model->insert_and_return($tblname, $data);
        
        //send email
        $message_ = '<html>
                <body>
                <table width="100%" border="0">
                <tr>
                        <th>Contact Name:</th>
                        <td>' . $contact_name . '</td> 
                </tr>
                <tr>
                        <th>Contact Email:</th>
                        <td>' . $contact_email . '</td> 
                </tr>
                <tr>
                        <th>Massage:</th>
                        <td >' . $message . '</td> 
                </tr>
        </table>
        </body>
        </html>';
                $mail_to = 'machadowelborn@gmail.com';

                $server = $_SERVER['localhost'];

                $message_ = wordwrap($message_);
                $subject = "Visiter Details";

                $headers = "From: $contact_email" . "\r\n" .
                                'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                mail($mail_to, $subject, $message_, $headers);
        
        echo '<span style="color : green;">Message Send Successfully.</span>';
    }
}
?>
