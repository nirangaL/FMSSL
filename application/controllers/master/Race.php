<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class Race extends MY_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model('master/Race_model');
    }

    public function index(){
        $data['title'] = 'Race';
        $data['races'] = $this->Race_model->getAllRace();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/race/race_list_view');
        $this->load->view('template/footer');
    }

    public function add(){
        $data['title'] = 'Add Race';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/race/add_race_view');
        $this->load->view('template/footer');
    }

    public function store(){
        if($this->formValidation()){
          $result = $this->Race_model->store();
          if($result){
            $this->session->set_flashdata('item', array('msg-title'=>'Race Saved!','msg' => '','class' => 'alert-success'));
              redirect(base_url('master/race'),'refresh');
          }else{
            $this->session->set_flashdata('item', array('msg-title'=>'Race Not Saved!','msg' => 'Try Again','class' => 'alert-danger'));
            $this->add();
          }
        }else{
            $this->add();
        }
    }

    public function view($id){
        $data['title'] = 'Edit Race';
        $data['race'] = $this->Race_model->getRace($id);
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('master/race/edit_race_view');
        $this->load->view('template/footer');
    }

    public function edit($id){
        if($this->formValidation($id)){
            $result = $this->Race_model->update($id);
            if($result){
              $this->session->set_flashdata('item', array('msg-title'=>'Race Updated!','msg' => '','class' => 'alert-success'));
                redirect(base_url('master/race'),'refresh');
            }else{
              $this->session->set_flashdata('item', array('msg-title'=>'Race Not Updated!','msg' => 'Try Again','class' => 'alert-danger'));
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
            $this->form_validation->set_rules('race_name', 'Race Name', 'trim|required|is_unique[mstr_race.name]');
        }else if(($updateId !='')){
            $getIdData = $this->Race_model->getRace($updateId);
            $savedCatName = $getIdData[0]->name;
            $newCatName = $this->input->post('race_name');
            if($savedCatName != $newCatName){
                $this->form_validation->set_rules('race_name', 'Race Name', 'required|is_unique[mstr_race.name]');
            }else{
                return true;
            }

        }
       
        return $this->form_validation->run();
    }
}
	