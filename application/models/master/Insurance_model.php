<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class Insurance_model extends CI_Model {

    public function getAllInsurance(){
        $result = $this->db->get('mstr_insurance')->result();
        return $result;
    }

    public function store(){
     $insu_name = $this->input->post('insu_name');
     $amount = $this->input->post('amount');
     $insu_desc = $this->input->post('insu_desc');
     $active = $this->input->post('active');

     $amount = str_replace(',', '',  $amount);

     $amount =  trim($amount, ',');

     if($active ==''){
        $active = 0;
     }
     $data = array(
         'insuName'=>$insu_name,
         'amount'=>$amount,
         'description'=>$insu_desc,
         'active'=>$active,
         'createDate'=>date('Y-m-d H:i:s'),
         'createUser'=>$_SESSION['session_user_data']['userId']
     );

    return $this->db->insert('mstr_insurance',$data);
    }

    public function getInsurance($id){
        $this->db->where('id',$id);
        $result = $this->db->get('mstr_insurance')->result();
        return $result;
    }

    public function update($id){
        $insu_name = $this->input->post('insu_name');
        $amount = $this->input->post('amount');
        $insu_desc = $this->input->post('insu_desc');
        $active = $this->input->post('active');
   
        $amount = str_replace(',', '',  $amount);
        $amount =  trim($amount, ',');
   
        if($active ==''){
           $active = 0;
        }

        $data = array(
            'insuName'=>$insu_name,
            'amount'=>$amount,
            'description'=>$insu_desc,
            'active'=>$active,
            'updateDate'=>date('Y-m-d H:i:s'),
            'updateUser'=>$_SESSION['session_user_data']['userId']
        );

        $this->db->set($data);
        $this->db->where('id',$id);
       return $this->db->update('mstr_insurance');
    }

    public function delete($id){
      
    }


}