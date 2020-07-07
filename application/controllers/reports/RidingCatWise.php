<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class RidingCatWise extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('reports/Riding_cat_wise_model');
    }

    public function index($tblData=''){
        $data['title'] = 'Riding Category wise (Junior /Senior)';
        $data['ridingCat'] = $this->Riding_cat_wise_model->getRidingCat();
        $data['tblData'] = $tblData;
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('reports/Riding_cat_wise_view');
        $this->load->view('template/footer');
    }

    public function getData(){
        $data = $this->Riding_cat_wise_model->getData();
        if(!empty($data)){
            $this->index($data);
        }else{
            $this->index();
        }
    }

}
	