<?php

class All_insu_list_model extends CI_model{


    public function getData(){
        $cat = $this->input->post('racingCat');
        
        $sql = "SELECT
        `rider_details`.`insuIssueDate`
        , `rider_details`.`insuExpDate`
        , `rider_details`.`name`
        , `rider_details`.`id`
        , `rider_details`.`licenseNo`
        , `rider_details`.`nic`
        , `rider_details`.`insuNo`
        , `mstr_insurance`.`insuName`
        , `mstr_insurance`.`description`
    FROM
        `fmssl`.`rider_details`
        INNER JOIN `fmssl`.`mstr_insurance` 
            ON (`rider_details`.`insuCat` = `mstr_insurance`.`id`)";

        // if($cat != 0 ){
        //     $sql .= "WHERE ridingCat = '$cat'";
        // }

        return $this->db->query($sql)->result();

    }
   

}