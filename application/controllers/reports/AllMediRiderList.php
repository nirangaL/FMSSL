<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class AllMediRiderList extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('reports/All_medi_riders_list_model');
    }

    public function index(){
        $data['title'] = ' Medical All Riders';
        $data['tblData'] =  $this->All_medi_riders_list_model->getData();;

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('reports/all_medi_rider_view');
        $this->load->view('template/footer');
    }

    // public function getData(){
    //     $data = $this->All_riders_list_model->getData();
    //     if(!empty($data)){
    //         $this->index($data);
    //     }else{
    //         $this->index();
    //     }
    // }

}
	