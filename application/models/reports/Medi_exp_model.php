<?php

class Medi_exp_model extends CI_model{


    public function getData(){
        $date = $this->input->post('date');
        
        $sql = "SELECT
        rd.id,
        rd.licenseNo,
        rd.`name`,
        rd.nic,
        rd.medicalIssueDate,
        rd.medicalExpDate
      FROM
        `rider_details` rd
        WHERE medicalExpDate < '$date' OR medicalExpDate = ''";

        // if($cat != 0 ){
        //     $sql .= "WHERE ridingCat = '$cat'";
        // }

        return $this->db->query($sql)->result();

    }
   

}