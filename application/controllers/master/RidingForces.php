<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class RidingForces extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('master/Riding_forces_model');
    }

    public function index(){
        $data['title'] = 'Riding Category';
        $data['categories'] = $this->Riding_forces_model->getAllRidingForcesCat();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/ridingforces/riding_forces_list_view');
        $this->load->view('template/footer');
    }

    public function add(){
        $data['title'] = 'Add Riding Cat';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/ridingforces/add_riding_forces_view');
        $this->load->view('template/footer');
    }

    public function store(){
        if($this->formValidation()){
          $result = $this->Riding_forces_model->store();
          if($result){
            $this->session->set_flashdata('item', array('msg-title'=>'Force Saved!','msg' => '','class' => 'alert-success'));
              redirect(base_url('master/RidingForces'),'refresh');
          }else{
            $this->session->set_flashdata('item', array('msg-title'=>'Force Not Saved!','msg' => 'Try Again','class' => 'alert-danger'));
            $this->add();
          }
        }else{
            $this->add();
        }
    }

    public function view($id){
        $data['title'] = 'Edit Race Cat';
        $data['category'] = $this->Riding_forces_model->getRidingForces($id);
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/ridingforces/edit_riding_forces_view');
        $this->load->view('template/footer');
    }

    public function edit($id){
        if($this->formValidation($id)){
            $result = $this->Riding_forces_model->update($id);
            if($result){
              $this->session->set_flashdata('item', array('msg-title'=>'Force Updated!','msg' => '','class' => 'alert-success'));
                redirect(base_url('master/RidingForces'),'refresh');
            }else{
              $this->session->set_flashdata('item', array('msg-title'=>'Force Not Updated!','msg' => 'Try Again','class' => 'alert-danger'));
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
            $this->form_validation->set_rules('cat_name', 'Forces Name', 'trim|required|is_unique[mstr_riding_forces.name]');
        }else if(($updateId !='')){
            $getIdData = $this->Riding_forces_model->getRidingForces($updateId);
            $savedCatName = $getIdData[0]->name;
            $newCatName = $this->input->post('cat_name');
            if($savedCatName != $newCatName){
                $this->form_validation->set_rules('cat_name', 'Forces Name', 'required|is_unique[mstr_riding_forces.name]');
            }else{
                return true;
            }

        }
       
        return $this->form_validation->run();
    }
}
	