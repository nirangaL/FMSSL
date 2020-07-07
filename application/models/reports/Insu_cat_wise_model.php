<?php

class Insu_cat_wise_model extends CI_model{

    public function getInsu(){
        $this->db->select('id,insuName as name');
        $this->db->where('active','1');
        $result = $this->db->get('mstr_insurance')->result();
        return $result;
    }

    public function getData(){
        $cat = $this->input->post('insuCat');
        
        $sql = "SELECT
        rd.id,
        rd.licenseNo,
        rd.`name`,
        rd.nic,
        rd.`insuNo`,
        mrc.`insuName` AS cat
      FROM
        `rider_details` rd
        LEFT JOIN `mstr_insurance` AS mrc
          ON rd.`insuCat` = mrc.`id`";

        if($cat != 0 ){
            $sql .= "WHERE insuCat = '$cat'";
        }

        return $this->db->query($sql)->result();

    }
   

}