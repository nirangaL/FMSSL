<?php

class All_riders_list_model extends CI_model{

    // public function getForces(){
    //     $this->db->select('id,name');
    //     $this->db->where('active','1');
    //     $result = $this->db->get('mstr_riding_forces')->result();
    //     return $result;

        
    // }

    public function getData(){
        $cat = $this->input->post('racingCat');
        
        $sql = "SELECT
        rd.*,
        mrc.`name` AS racCat,
        mrcc.`category` AS ridCat,
        mrf.`name` AS forces,
        mbg.bloodGroup AS blood
      FROM
        `rider_details` rd
        LEFT JOIN `mstr_riding_forces` AS mrc
          ON rd.`ridingCat` = mrc.`id`
        LEFT JOIN `mstr_racing_category` AS mrcc
          ON rd.`racingCat` = mrcc.`id`
        LEFT JOIN `mstr_riding_forces` AS mrf
          ON rd.`ridingForce` = mrf.`id`
          LEFT JOIN mste_blood_grp mbg
          ON rd.`bloodGroup` = mbg.id";

        // if($cat != 0 ){
        //     $sql .= "WHERE ridingCat = '$cat'";
        // }

        return $this->db->query($sql)->result();

    }

    public function getDataCreateDateWise(){
      $date1 = $this->input->post('date1');
      $date2 = $this->input->post('date2');
        
      $sql = "SELECT
      rd.*,
      mrc.`name` AS racCat,
      mrcc.`category` AS ridCat,
      mrf.`name` AS forces,
      mbg.bloodGroup AS blood
    FROM
      `rider_details` rd
      LEFT JOIN `mstr_riding_forces` AS mrc
        ON rd.`ridingCat` = mrc.`id`
      LEFT JOIN `mstr_racing_category` AS mrcc
        ON rd.`racingCat` = mrcc.`id`
      LEFT JOIN `mstr_riding_forces` AS mrf
        ON rd.`ridingForce` = mrf.`id`
        LEFT JOIN mste_blood_grp mbg
        ON rd.`bloodGroup` = mbg.id
        WHERE DATE(rd.`createDate`) BETWEEN '$date1' AND '$date2'";


      return $this->db->query($sql)->result();
    }
   

}