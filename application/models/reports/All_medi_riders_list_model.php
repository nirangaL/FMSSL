<?php

class All_medi_riders_list_model extends CI_model{


    public function getData(){
        $cat = $this->input->post('racingCat');
        
        $sql = "SELECT
                `rider_details`.`id`,
                `licenseNo`,
                `name`,
                `nic`,
                `dob`,
                `address`,
                `phone1`,
                `phone2`,
                `mste_blood_grp`.`bloodGroup`,
                `medicalIssueDate`,
                `medicalExpDate`
            FROM
            `rider_details` 
            LEFT JOIN `mste_blood_grp` ON  `rider_details`.`bloodGroup` = `mste_blood_grp`.`id`
            WHERE medicalIssueDate != '0000-00-00'";

        // if($cat != 0 ){
        //     $sql .= "WHERE ridingCat = '$cat'";
        // }

        return $this->db->query($sql)->result();

    }
   

}