<?php

class MY_Controller extends CI_Controller{

    public $sessUserName;
    public $sessName;
    public $sessUserGroup;
    public $userId;

    function __construct(){
        parent::__construct();
        $this->checkSession();
        if(isset($_SESSION['session_user_data'])){
            $this->userId = $_SESSION['session_user_data']['userId'];
            $this->myConUserName  = $_SESSION['session_user_data']['userName'];
            $this->myConName  = $_SESSION['session_user_data']['name'];
            $this->MyConUserGroup  = $_SESSION['session_user_data']['userGroup'];
        }
  
    }

    public function checkSession(){
        $this->load->library('session');
        if (!$this->session->userdata('session_user_data')) {
            if ($_SERVER['REQUEST_METHOD'] == "GET" OR empty($_SERVER['REQUEST_METHOD'])) {
                // $_SESSION['new'] = current_url();
            }
            redirect(base_url('login'));
        }
    }

}
