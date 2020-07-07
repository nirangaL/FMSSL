<?php

class Riding_cat_wise_model extends CI_model{

    public function getRidingCat(){
        $this->db->select('id,name');
        $this->db->where('active','1');
        $result = $this->db->get('mstr_riding_cat')->result();
        return $result;
    }

    public function getData(){
        $cat = $this->input->post('ridingCat');
        
        $sql = "SELECT
                rd.id,
                rd.licenseNo,
                rd.`name`,
                rd.nic,
                mrc.`name` as cat
                FROM
                `rider_details` rd
                LEFT JOIN `mstr_riding_cat` AS mrc
                ON rd.`ridingCat` = mrc.`id`";

        if($cat != 0 ){
            $sql .= "WHERE ridingCat = '$cat'";
        }

        return $this->db->query($sql)->result();

    }
   

}