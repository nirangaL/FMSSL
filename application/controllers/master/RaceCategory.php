<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class RaceCategory extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('master/Race_category_model');
    }

    public function index(){
        $data['title'] = 'Race Category';
        $data['categories'] = $this->Race_category_model->getAllRacingCat();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/race_category/races_list_view');
        $this->load->view('template/footer');
    }

    public function add(){
        $data['title'] = 'Add Race Cat';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/race_category/add_race_cat_view');
        $this->load->view('template/footer');
    }

    public function store(){
        if($this->formValidation()){
          $result = $this->Race_category_model->store();
          if($result){
            $this->session->set_flashdata('item', array('msg-title'=>'Category Saved!','msg' => '','class' => 'alert-success'));
              redirect(base_url('master/racecategory'),'refresh');
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
        $data['category'] = $this->Race_category_model->getRaceCat($id);
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/race_category/edit_race_cat_view');
        $this->load->view('template/footer');
    }

    public function edit($id){
        if($this->formValidation($id)){
            $result = $this->Race_category_model->update($id);
            if($result){
              $this->session->set_flashdata('item', array('msg-title'=>'Category Updated!','msg' => '','class' => 'alert-success'));
                redirect(base_url('master/racecategory'),'refresh');
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
            $this->form_validation->set_rules('cat_name', 'Catergory Name', 'trim|required|is_unique[mstr_racing_category.category]');
        }else if(($updateId !='')){
            $getIdData = $this->Race_category_model->getRaceCat($updateId);
            $savedCatName = $getIdData[0]->category;
            $newCatName = $this->input->post('cat_name');
            if($savedCatName != $newCatName){
                $this->form_validation->set_rules('cat_name', 'Catergory Name', 'required|is_unique[mstr_racing_category.category]');
            }else{
                return true;
            }

        }
       
        return $this->form_validation->run();
    }
}
	