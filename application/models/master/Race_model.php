<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class Race_model extends CI_Model {

    public function getAllRace(){
        $result = $this->db->get('mstr_race')->result();
        return $result;
    }

    public function store(){
     $race_name = $this->input->post('race_name');
     $race_desc = $this->input->post('race_desc');
     $active = $this->input->post('active');

     if($active ==''){
        $active = 0;
     }
     $data = array(
         'name'=>$race_name,
         'description'=>$race_desc,
         'active'=>$active,
         'createDate'=>date('Y-m-d H:i:s'),
         'createUser'=>$_SESSION['session_user_data']['userId']
     );

    return $this->db->insert('mstr_race',$data);
    }

    public function getRace($id){
        $this->db->where('id',$id);
        $result = $this->db->get('mstr_race')->result();
        return $result;
    }

    public function update($id){
        $race_name = $this->input->post('race_name');
        $race_desc = $this->input->post('race_desc');
        $active = $this->input->post('active');
   
        if($active ==''){
           $active = 0;
        }
        $data = array(
            'name'=>$race_name,
            'description'=>$race_desc,
            'active'=>$active,
            'updateDate'=>date('Y-m-d H:i:s'),
            'updateUser'=>$_SESSION['session_user_data']['userId']
        );

        $this->db->set($data);
        $this->db->where('id',$id);
       return $this->db->update('mstr_race');
    }

    public function delete($id){
      
    }


}