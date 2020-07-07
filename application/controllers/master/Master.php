<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class Master extends MY_Controller {

	 function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['title'] = 'Master';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/master_view');
        $this->load->view('template/footer');
    }
}
	