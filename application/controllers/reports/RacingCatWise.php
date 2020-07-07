<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class RacingCatWise extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('reports/Racing_cat_wise_model');
    }

    public function index($tblData=''){
        $data['title'] = 'Racing Category wise';
        $data['racingCat'] = $this->Racing_cat_wise_model->getRacingCat();
        $data['tblData'] = $tblData;

    
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('reports/Racing_cat_wise_view');
        $this->load->view('template/footer');
    }

    public function getData(){
        $data = $this->Racing_cat_wise_model->getData();
        if(!empty($data)){
            $this->index($data);
        }else{
            $this->index();
        }
    }

}
	