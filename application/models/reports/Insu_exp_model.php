<?php

class Insu_exp_model extends CI_model{

    public function getForces(){
        $this->db->select('id,name');
        $this->db->where('active','1');
        $result = $this->db->get('mstr_riding_forces')->result();
        return $result;

        
    }

    public function getData(){
        $date = $this->input->post('date');
        
        $sql = "SELECT
        rd.id,
        rd.licenseNo,
        rd.`name`,
        rd.nic,
        rd.insuNo,
        rd.insuCat,
        rd.insuIssueDate,
        rd.insuExpDate,
        mins.`insuName`
      FROM
        `rider_details` rd
        LEFT JOIN `mstr_insurance` mins
        ON rd.`insuCat` = mins.`id`
        WHERE insuExpDate < '$date'";

        // if($cat != 0 ){
        //     $sql .= "WHERE ridingCat = '$cat'";
        // }

        return $this->db->query($sql)->result();

    }
   

}