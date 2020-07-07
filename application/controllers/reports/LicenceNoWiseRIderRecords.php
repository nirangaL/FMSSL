<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class LicenceNoWiseRIderRecords extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('reports/Licence_no_wise_riders_records');
    }

    public function index($tblData=''){
        $data['title'] = 'License No. wise';
        $data['licenceNo'] = $this->Licence_no_wise_riders_records->getLicence();
        $data['tblData'] = $tblData;

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('reports/license_no_wise_rider_records');
        $this->load->view('template/footer');
    }

    public function getData(){
        $data = $this->Licence_no_wise_riders_records->getData();
        if(!empty($data)){
            $this->index($data);
        }else{
            $this->index();
        }
    }

}
	