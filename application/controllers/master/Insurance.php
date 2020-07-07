<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class Insurance extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('master/Insurance_model');
    }

    public function index(){
        $data['title'] = 'Insurance';
        $data['insurances'] = $this->Insurance_model->getAllInsurance();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/insurance/insurances_list_view');
        $this->load->view('template/footer');
    }

    public function add(){
        $data['title'] = 'Add Insurance';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/insurance/add_insurance_view');
        $this->load->view('template/footer');
    }

    public function store(){
        if($this->formValidation()){
          $result = $this->Insurance_model->store();
          if($result){
            $this->session->set_flashdata('item', array('msg-title'=>'Insurance Saved!','msg' => '','class' => 'alert-success'));
              redirect(base_url('master/insurance'),'refresh');
          }else{
            $this->session->set_flashdata('item', array('msg-title'=>'Insurance Not Saved!','msg' => 'Try Again','class' => 'alert-danger'));
            $this->add();
          }
        }else{
            $this->add();
        }
    }

    public function view($id){
        $data['title'] = 'Edit Insurance';
        $data['insurance'] = $this->Insurance_model->getInsurance($id);
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/insurance/edit_insurance_view');
        $this->load->view('template/footer');
    }

    public function edit($id){
        if($this->formValidation($id)){
            $result = $this->Insurance_model->update($id);
            if($result){
              $this->session->set_flashdata('item', array('msg-title'=>'Insurance Updated!','msg' => '','class' => 'alert-success'));
                redirect(base_url('master/insurance'),'refresh');
            }else{
              $this->session->set_flashdata('item', array('msg-title'=>'Insurance Not Updated!','msg' => 'Try Again','class' => 'alert-danger'));
              $this->view($id);
            }
          }else{
              $this->view($id);
          }
    }

    public function delete(){
       
    }


    public function formValidation($updateId=''){
        if($updateId ==''){
            $this->form_validation->set_rules('insu_name', 'Inusrance Name', 'trim|required|is_unique[mstr_insurance.insuName]');
            $this->form_validation->set_rules('amount', 'Amount', 'required');
        }else if(($updateId !='')){
            $getIdData = $this->Insurance_model->getInsurance($updateId);
            $savedInsName = $getIdData[0]->insuName;
            $newInsName = $this->input->post('insu_name');
            if($savedInsName != $newInsName){
                $this->form_validation->set_rules('insu_name', 'Inusrance Name', 'trim|required|is_unique[mstr_insurance.insuName]');
                $this->form_validation->set_rules('amount', 'Amount', 'required');
            }else{
                $this->form_validation->set_rules('amount', 'Amount', 'required');
            }

        }
       
        return $this->form_validation->run();
    }
}
	