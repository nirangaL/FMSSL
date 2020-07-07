<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class InsuCatWise extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('reports/Insu_cat_wise_model');
    }

    public function index($tblData=''){
        $data['title'] = 'Insurance Category Wise';
        $data['forces'] = $this->Insu_cat_wise_model->getInsu();
        $data['tblData'] = $tblData;

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('reports/insu_cat_wise');
        $this->load->view('template/footer');
    }

    public function getData(){
        $data = $this->Insu_cat_wise_model->getData();
        if(!empty($data)){
            $this->index($data);
        }else{
            $this->index();
        }
    }

}
	