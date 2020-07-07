<?php

class Racing_cat_wise_model extends CI_model{

    public function getRacingCat(){
        $this->db->select('id,category as name');
        $this->db->where('active','1');
        $result = $this->db->get('mstr_racing_category')->result();
        return $result;

        
    }

    public function getData(){
        $cat = $this->input->post('racingCat');
        
        $sql = "SELECT
        rd.id,
        rd.licenseNo,
        rd.`name`,
        rd.nic,
        mrc.`category` AS cat
      FROM
        `rider_details` rd
        LEFT JOIN `mstr_racing_category` AS mrc
          ON rd.`racingCat` = mrc.`id`";

        if($cat != 0 ){
            $sql .= "WHERE racingCat = '$cat'";
        }

        return $this->db->query($sql)->result();

    }
   

}