<?php

class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('home_model');  
        $uploadeduser = $this->session->userdata('adminuser_id');
        if (!$uploadeduser) {
           redirect(base_url().'admin/home');
        }
    }
    function index(){            
        $data['main_content'] = 'admin/dashboard/dashboard_view';
        $this->load->view('admin/includes/template', $data);
    }
}
?>