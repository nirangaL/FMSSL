<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class RidingCat extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('master/Riding_cat_model');
    }

    public function index(){
        $data['title'] = 'Riding Category';
        $data['categories'] = $this->Riding_cat_model->getAllRidingCat();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/ridingcat/riding_cat_list_view');
        $this->load->view('template/footer');
    }

    public function add(){
        $data['title'] = 'Add Riding Cat';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/ridingcat/add_riding_cat_view');
        $this->load->view('template/footer');
    }

    public function store(){
        if($this->formValidation()){
          $result = $this->Riding_cat_model->store();
          if($result){
            $this->session->set_flashdata('item', array('msg-title'=>'Category Saved!','msg' => '','class' => 'alert-success'));
              redirect(base_url('master/RidingCat'),'refresh');
          }else{
            $this->session->set_flashdata('item', array('msg-title'=>'Category Not Saved!','msg' => 'Try Again','class' => 'alert-danger'));
            $this->add();
          }
        }else{
            $this->add();
        }
    }

    public function view($id){
        $data['title'] = 'Edit Race Cat';
        $data['category'] = $this->Riding_cat_model->getRidingCat($id);
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/ridingcat/edit_riding_cat_view');
        $this->load->view('template/footer');
    }

    public function edit($id){
        if($this->formValidation($id)){
            $result = $this->Riding_cat_model->update($id);
            if($result){
              $this->session->set_flashdata('item', array('msg-title'=>'Category Updated!','msg' => '','class' => 'alert-success'));
                redirect(base_url('master/RidingCat'),'refresh');
            }else{
              $this->session->set_flashdata('item', array('msg-title'=>'Category Not Updated!','msg' => 'Try Again','class' => 'alert-danger'));
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
            $this->form_validation->set_rules('cat_name', 'Catergory Name', 'trim|required|is_unique[mstr_riding_cat.name]');
        }else if(($updateId !='')){
            $getIdData = $this->Riding_cat_model->getRidingCat($updateId);
            $savedCatName = $getIdData[0]->name;
            $newCatName = $this->input->post('cat_name');
            if($savedCatName != $newCatName){
                $this->form_validation->set_rules('cat_name', 'Catergory Name', 'required|is_unique[mstr_riding_cat.name]');
            }else{
                return true;
            }

        }
       
        return $this->form_validation->run();
    }
}
	