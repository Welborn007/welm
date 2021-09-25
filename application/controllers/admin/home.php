<?php
class home extends CI_Controller {
    function __construct() {
        parent::__construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('home_model');  
    }

    function index(){        
        $this->load->view('admin/home/home_view');
    }
    
    function userLogin(){
        $login_email  = $this->input->post('idemailid');
        $password     = $this->input->post('idpassword');
        
        $emailExplode = explode('@',$login_email);
        for($i=0;$i<count($emailExplode);$i++){
            $emailCount += $i;
        }
        
        if($emailCount != 0){
            $checkStatus = $this->home_model->userLogin('emailid','password','status',$login_email,$password,"1");
        } else if($emailCount == 0){
            $checkStatus = $this->home_model->userLogin('mobilenumber','password','status',$login_email,$password,"1");
        }
        
        if ($checkStatus) {
            $data = array(
                'adminuser_id'   => $checkStatus[0]['user_id'],
                'firstname' => $checkStatus[0]['firstname'],
                'section_id'   => $checkStatus[0]['section_id']
            );

            $this->session->set_userdata($data);
            echo '1';
        } else {
            echo "<span style='color : red;'>Please Enter Valid User Name & Password.</span>";
        }             
    }
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'admin/home'); 
    }
    
    
}
