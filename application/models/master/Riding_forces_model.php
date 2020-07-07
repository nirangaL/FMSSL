<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class Riding_forces_model extends CI_Model {

    public function getAllRidingForcesCat(){
        $result = $this->db->get('mstr_riding_forces')->result();
        return $result;
    }

    public function store(){
     $cat_name = $this->input->post('cat_name');
     $cat_desc = $this->input->post('cat_desc');
     $active = $this->input->post('active');

     if($active ==''){
        $active = 0;
     }
     $data = array(
         'name'=>$cat_name,
         'description'=>$cat_desc,
         'active'=>$active,
         'createDate'=>date('Y-m-d H:i:s'),
         'createUser'=>$_SESSION['session_user_data']['userId']
     );

    return $this->db->insert('mstr_riding_forces',$data);
    }

    public function getRidingForces($id){
        $this->db->where('id',$id);
        $result = $this->db->get('mstr_riding_forces')->result();
        return $result;
    }

    public function update($id){
        $cat_name = $this->input->post('cat_name');
        $cat_desc = $this->input->post('cat_desc');
        $active = $this->input->post('active');
   
        if($active ==''){
           $active = 0;
        }
        $data = array(
            'name'=>$cat_name,
            'description'=>$cat_desc,
            'active'=>$active,
            'updateDate'=>date('Y-m-d H:i:s'),
            'updateUser'=>$_SESSION['session_user_data']['userId']
        );

        $this->db->set($data);
        $this->db->where('id',$id);
       return $this->db->update('mstr_riding_forces');
    }

    public function delete($id){
      
    }


}