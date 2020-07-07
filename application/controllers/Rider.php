<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class Rider extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('Rider_model');
    }

    public function index(){
        $data['title'] = 'Rider';
        $data['riders'] = $this->Rider_model->getAllRiders();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('rider/riders_list_view');
        $this->load->view('template/footer');
    }

    public function add(){
        $data['title'] = 'Rider Add';
        $data['bloodgroups'] = $this->Rider_model->getBloodGroups();
        $data['insuCat'] = $this->Rider_model->getInsuCat();
        $data['racingCat'] = $this->Rider_model->getRacingCat();
        $data['ridingCat'] = $this->Rider_model->getRidingCat();
        $data['ridingforces'] = $this->Rider_model->getRidingforces();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('rider/rider_add_view');
        $this->load->view('template/footer');
    }
    
    public function store(){
       if($this->formValidation()){
           $storeData = $this->Rider_model->store();
           if($storeData){
            $this->session->set_flashdata('item', array('msg-title'=>'Rider Successfully Saved !','msg' => '','class' => 'alert-success'));
              redirect(base_url('rider'),'refresh');
          }else{
            $this->session->set_flashdata('item', array('msg-title'=>'Rider Not Saved!','msg' => 'Try Again','class' => 'alert-danger'));
            $this->add();
          }
       }else{
        $this->add();
       }
    }

    public function show($id){
        $data['title'] = 'Rider Details';
        $data['rider'] = $this->Rider_model->getRider($id);
        if(count($data['rider'])==0){
            redirect(base_url('rider'),'refresh');
        }

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('rider/rider_details_view');
        $this->load->view('template/footer');
    }


    public function view($id){
        $data['title'] = 'Rider Edit';
        $data['bloodgroups'] = $this->Rider_model->getBloodGroups();
        $data['insuCat'] = $this->Rider_model->getInsuCat();
        $data['racingCat'] = $this->Rider_model->getRacingCat();
        $data['ridingCat'] = $this->Rider_model->getRidingCat();
        $data['ridingforces'] = $this->Rider_model->getRidingforces();
        $data['rider'] = $this->Rider_model->getRiderForEdit($id);

        // print_r($data['rider']);exit();

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('rider/rider_edit_view');
        $this->load->view('template/footer');
    }

    public function edit($id){
        if($this->formValidation($id)){
            $storeData = $this->Rider_model->update($id);
            if($storeData){
             $this->session->set_flashdata('item', array('msg-title'=>'Rider Successfully Update !','msg' => '','class' => 'alert-success'));
               redirect(base_url('rider'),'refresh');
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
            $this->form_validation->set_rules('license', 'License No', 'trim|required|is_unique[rider_details.licenseNo]');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('nic', 'NIC', 'trim|required|is_unique[rider_details.nic]');
            $this->form_validation->set_rules('dob', 'DoB', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('phone1', 'T.P', 'trim|required');
            // $this->form_validation->set_rules('bloodg', 'Blood Group', 'trim|required');
            // $this->form_validation->set_rules('lissudate', 'License Issue Date', 'trim|required');
            // $this->form_validation->set_rules('lexdate', 'License Expaire Date', 'trim|required');
            // $this->form_validation->set_rules('missuedate', 'Medical Issue Date', 'trim|required');
            // $this->form_validation->set_rules('mexdate', 'Medical Expaire Date', 'trim|required');
            // $this->form_validation->set_rules('insuranceNo', 'Insurance No', 'trim|required');
            // $this->form_validation->set_rules('insucat', 'Insurance Category', 'trim|required');
            // $this->form_validation->set_rules('insissuedate', 'Insurance Issue Date', 'trim|required');
            // $this->form_validation->set_rules('insexdate', 'Insurance Expaire Date', 'trim|required');
            $this->form_validation->set_rules('racingcat', 'Racing Category', 'trim|required');
            $this->form_validation->set_rules('ridingcat', 'Riding Category', 'trim|required');
            $this->form_validation->set_rules('ridingforces', 'Riding Force', 'trim|required');
            

        }else if(($updateId !='')){
            $getIdData = $this->Rider_model->getRiderForEdit($updateId);
            $savedLicenseNo= $getIdData[0]->licenseNo;
            $savedNic = $getIdData[0]->nic;

            $newLicenseNo = $this->input->post('license');
            if($savedLicenseNo != $newLicenseNo){
                $this->form_validation->set_rules('license', 'License No', 'trim|required|is_unique[rider_details.licenseNo]');
            }

            $newNic = $this->input->post('nic');
            if($savedNic != $newNic ){
                $this->form_validation->set_rules('nic', 'NIC', 'trim|required|is_unique[rider_details.nic]');
            }
           
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('dob', 'DoB', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('phone1', 'T.P', 'trim|required');
            // $this->form_validation->set_rules('bloodg', 'Blood Group', 'trim|required');
            // $this->form_validation->set_rules('lissudate', 'License Issue Date', 'trim|required');
            // $this->form_validation->set_rules('lexdate', 'License Expaire Date', 'trim|required');
            // $this->form_validation->set_rules('missuedate', 'Medical Issue Date', 'trim|required');
            // $this->form_validation->set_rules('mexdate', 'Medical Expaire Date', 'trim|required');
            // $this->form_validation->set_rules('insuranceNo', 'Insurance No', 'trim|required');
            // $this->form_validation->set_rules('insucat', 'Insurance Category', 'trim|required');
            // $this->form_validation->set_rules('insissuedate', 'Insurance Issue Date', 'trim|required');
            // $this->form_validation->set_rules('insexdate', 'Insurance Expaire Date', 'trim|required');
            $this->form_validation->set_rules('racingcat', 'Racing Category', 'trim|required');
            $this->form_validation->set_rules('ridingcat', 'Riding Category', 'trim|required');
            $this->form_validation->set_rules('ridingforces', 'Riding Force', 'trim|required');
            

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
	