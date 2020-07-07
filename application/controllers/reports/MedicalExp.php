<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class MedicalExp extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('reports/Medi_exp_model');
    }

    public function index($tblData=''){
        $data['title'] = 'Medical Expire';
        $data['tblData'] = $tblData;
        $data['selectDate'] = $this->input->post('date');
        if($data['selectDate'] == ''){
            $data['selectDate'] = date('Y-m-d');
        }

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('reports/medi_exp_view');
        $this->load->view('template/footer');
    }

    public function getData(){
        $data = $this->Medi_exp_model->getData();
        if(!empty($data)){
            $this->index($data);
        }else{
            $this->index();
        }
    }

}