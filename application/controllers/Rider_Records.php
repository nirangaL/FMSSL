<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class Rider_Records extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('Rider_records_model');
    }

    public function index(){
        $data['title'] = 'Rider Record';
        $data['riderRecords'] = $this->Rider_records_model->getAllRidersRecord();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('rider_records/riders_record_list_view');
        $this->load->view('template/footer');
    }

    public function add(){
        $data['title'] = 'Rider Add';
        $data['licenceNos'] = $this->Rider_records_model->getLicenceNo();
        $data['race'] = $this->Rider_records_model->getRace();
        $data['ridingCat'] = $this->Rider_records_model->getRacingCat();
        $data['location'] = $this->Rider_records_model->getLocation();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('rider_records/rider_record_add_view');
        $this->load->view('template/footer');
    }

    public function getName(){
        $result = $this->Rider_records_model->getName();
        if($result){
            echo $result[0]->name;
        }else{
            echo '';
        }
    }
    
    public function store(){
       if($this->formValidation()){
           $storeData = $this->Rider_records_model->store();
           if($storeData){
            $this->session->set_flashdata('item', array('msg-title'=>'Rider Successfully Saved !','msg' => '','class' => 'alert-success'));
              redirect(base_url('rider_records'),'refresh');
          }else{
            $this->session->set_flashdata('item', array('msg-title'=>'Rider Not Saved!','msg' => 'Try Again','class' => 'alert-danger'));
            $this->add();
          }
       }else{
        $this->add();
       }
    }

    public function view($id){
        $data['title'] = 'Ridiers Records';
        $data['licenceNos'] = $this->Rider_records_model->getLicenceNo();
        $data['race'] = $this->Rider_records_model->getRace();
        $data['racingCat'] = $this->Rider_records_model->getRacingCat();
        $data['locations'] = $this->Rider_records_model->getLocation();

        $data['riderRec'] = $this->Rider_records_model->getRiderRecForEdit($id);

        // print_r($data['riderRec']);exit();

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('rider_records/rider_record_edit_view');
        $this->load->view('template/footer');
    }

    public function edit($id){
        if($this->formValidation($id)){
            $storeData = $this->Rider_records_model->update($id);
            if($storeData){
             $this->session->set_flashdata('item', array('msg-title'=>'Rider Successfully Update !','msg' => '','class' => 'alert-success'));
               redirect(base_url('rider_records'),'refresh');
           }else{
             $this->session->set_flashdata('item', array('msg-title'=>'Rider Not Update!','msg' => 'Try Again','class' => 'alert-danger'));
             $this-> view($id);
           }
        }else{
         $this-> view($id);
        }
    }

    public function formValidation($updateId=''){

        if($updateId ==''){
            $this->form_validation->set_rules('licence', 'Licence No', 'trim|required');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('racingcat', 'Racing Category', 'trim|required');
            $this->form_validation->set_rules('race', 'Race', 'trim|required');
            $this->form_validation->set_rules('location', 'location', 'trim|required');
            // return true;

        }else if(($updateId !='')){
            // $getIdData = $this->Rider_model->getRiderForEdit($updateId);
            // $savedLicenseNo= $getIdData[0]->licenseNo;
            // $savedNic = $getIdData[0]->nic;

            // $newLicenseNo = $this->input->post('license');
            // if($savedLicenseNo != $newLicenseNo){
            //     $this->form_validation->set_rules('license', 'License No', 'trim|required|is_unique[rider_details.licenseNo]');
            // }

            // $newNic = $this->input->post('nic');
            // if($savedNic != $newNic ){
            //     $this->form_validation->set_rules('nic', 'NIC', 'trim|required|is_unique[rider_details.nic]');
            // }
           
            // $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('racingcat', 'Racing Category', 'trim|required');
            $this->form_validation->set_rules('race', 'Race', 'trim|required');
            $this->form_validation->set_rules('location', 'location', 'trim|required');
            

        }
       
        return $this->form_validation->run();
    }

    public function delete($id){
        $result = $this->Rider_model->delete($id);
        if($result){
            $this->session->set_flashdata('item', array('msg-title'=>'Rider Successfully Deleted !','msg' => '','class' => 'alert-success'));
            redirect(base_url('rider'),'refresh');  
        }else{
            $this->session->set_flashdata('item', array('msg-title'=>'Rider Not Delete!','msg' => 'Try Again','class' => 'alert-danger'));
            $this-> view($id);
        }
    }
}
	