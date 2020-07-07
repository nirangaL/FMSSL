<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class Race_category_model extends CI_Model {

    public function getAllRacingCat(){
        $result = $this->db->get('mstr_racing_category')->result();
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
         'category'=>$cat_name,
         'description'=>$cat_desc,
         'active'=>$active,
         'createDate'=>date('Y-m-d H:i:s'),
         'createUser'=>$_SESSION['session_user_data']['userId']
     );

    return $this->db->insert('mstr_racing_category',$data);
    }

    public function getRaceCat($id){
        $this->db->where('id',$id);
        $result = $this->db->get('mstr_racing_category')->result();
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
            'category'=>$cat_name,
            'description'=>$cat_desc,
            'active'=>$active,
            'updateDate'=>date('Y-m-d H:i:s'),
            'updateUser'=>$_SESSION['session_user_data']['userId']
        );

        $this->db->set($data);
        $this->db->where('id',$id);
       return $this->db->update('mstr_racing_category');
    }

    public function delete($id){
      
    }


}