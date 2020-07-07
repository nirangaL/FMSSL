<?php

class Forces_wise_model extends CI_model{

    public function getForces(){
        $this->db->select('id,name');
        $this->db->where('active','1');
        $result = $this->db->get('mstr_riding_forces')->result();
        return $result;

        
    }

    public function getData(){
        $cat = $this->input->post('racingCat');
        
        $sql = "SELECT
        rd.id,
        rd.licenseNo,
        rd.`name`,
        rd.nic,
        mrc.`name` AS cat
      FROM
        `rider_details` rd
        LEFT JOIN `mstr_riding_forces` AS mrc
          ON rd.`ridingForce` = mrc.`id`";

        if($cat != 0 ){
            $sql .= "WHERE ridingForce = '$cat'";
        }

        return $this->db->query($sql)->result();

    }
   

}