<?php

class Dashboard_model extends CI_model{


    public function getRiderCount(){
        $this->db->where('delete',0);;
        $result = $this->db->get('rider_details')->num_rows();
        return $result;
    }

    public function getLiceExp(){
        $date = date('d/m/Y');
        $sql = "SELECT
                id,
                licenseNo,
                nic,
                `name`,
                licenseexpDate
            FROM
                rider_details
            WHERE licenseexpDate < '$date' OR licenseexpDate ='0000-00-00'";
        return $this->db->query($sql)->result();
    }

    public function getMediExp(){
        $date = date('d/m/Y');
        $sql = "SELECT
                id,
                licenseNo,
                nic,
                `name`,
                medicalExpDate
            FROM
                rider_details
            WHERE medicalExpDate < '$date' OR medicalExpDate = '0000-00-00'";

            // exit($sql);
        return $this->db->query($sql)->result();
    }

    public function getInsuExp(){
        $date = date('d/m/Y');
        $sql = "SELECT
                id,
                licenseNo,
                nic,
                `name`,
                `insuNo`,
                `insuCat`,
                insuExpDate
            FROM
                rider_details
            WHERE insuExpDate < '$date' OR insuExpDate = '0000-00-00'";
        return $this->db->query($sql)->result();
    }
}