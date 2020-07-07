<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class Dashboard extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }

    public function index(){
        $data['title'] = 'Dashboard';
        $data['riderCount'] = $this->Dashboard_model->getRiderCount();
        $data['liceExp'] = $this->Dashboard_model->getLiceExp();
        $data['mediExp'] = $this->Dashboard_model->getMediExp();
        $data['insuExp'] = $this->Dashboard_model->getInsuExp();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('dashboard_view');
        $this->load->view('template/footer');
    }
}
	