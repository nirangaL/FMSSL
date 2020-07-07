<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class RiderRecordsRaceWise extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('reports/Rider_records_race_wise_model');
    }

    public function index($tblData=''){
        $data['title'] = 'Race Wise Riders';
        $data['races'] = $this->Rider_records_race_wise_model->getRace();
        $data['tblData'] = $tblData;

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('reports/rider_record_race_wise_view');
        $this->load->view('template/footer');
    }

    public function getData(){
        $data = $this->Rider_records_race_wise_model->getData();
        if(!empty($data)){
            $this->index($data);
        }else{
            $this->index();
        }
    }

}
	