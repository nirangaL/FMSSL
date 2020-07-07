<?php

class Licence_no_wise_riders_records extends CI_model{

    public function getLicence(){
        $this->db->select('id,licenseNo');
        $this->db->where('delete','0');
        $result = $this->db->get('rider_details')->result();
        return $result;
    }

    public function getData(){
        $licenceNo = $this->input->post('licenceNo');
        
        $sql = "SELECT
        rr.id AS id,
        rr.licenceNo AS licenceNo,
        rd.`name` AS riderName,
        mr.name AS race,
        mrc.category AS category,
        mrl.location AS `location`
        ,DATE(rr.`createDate`) AS createDate
    FROM
        rider_records rr
        LEFT JOIN rider_details rd
        ON rr.`licenceNo` = rd.`licenseNo`
        LEFT JOIN mstr_race mr
        ON rr.race = mr.id
        LEFT JOIN mstr_racing_category mrc
        ON rr.category = mrc.id
        LEFT JOIN mstr_racing_location mrl
        ON rr.location = mrl.id 
        WHERE deleted ='0'";

        if($licenceNo != 0 ){
            $sql .= "ANd rr.licenceNo = '$licenceNo'";
        }

        return $this->db->query($sql)->result();

    }
   

}