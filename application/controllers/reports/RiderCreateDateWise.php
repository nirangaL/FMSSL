<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class RiderCreateDateWise extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('reports/All_riders_list_model');
    }

    public function index($tblData=''){
        $data['title'] = 'Rider Registerd Date Wise';
        $data['tblData'] = $tblData;
        $data['selectDate1'] = $this->input->post('date1');
        $data['selectDate2'] = $this->input->post('date2');
        if($data['selectDate1'] == ''){
            $data['selectDate1'] = date('Y-m-d');
        }

        if($data['selectDate2'] == ''){
            $data['selectDate2'] = date('Y-m-d');
        }

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('reports/riders_created_date_wise');
        $this->load->view('template/footer');
    }

    public function getData(){
        $data = $this->All_riders_list_model->getDataCreateDateWise();
        if(!empty($data)){
            $this->index($data);
        }else{
            $this->index();
        }
    }

}
	