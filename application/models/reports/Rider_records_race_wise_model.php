<?php

class Rider_records_race_wise_model extends CI_model{

    public function getRace(){
        $this->db->select('id,name');
        $this->db->where('active','1');
        $result = $this->db->get('mstr_race')->result();
        return $result;
    }

    public function getData(){
        $race = $this->input->post('race');
        
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

        if($race != 0 ){
            $sql .= "ANd  mr.id = '$race'";
        }

        return $this->db->query($sql)->result();

    }
   

}