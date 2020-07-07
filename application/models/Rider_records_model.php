<?php
class Rider_records_model extends CI_Model{

    public function getAllRidersRecord(){

        $sql = "SELECT
                rr.id AS id,
                rr.licenceNo AS licenceNo,
                rd.`name` AS riderName,
                mr.name AS race,
                mrc.category AS category,
                mrl.location AS `location`
            FROM
                rider_records rr
                LEFT JOIN rider_details rd
                ON rr.`licenceNo` = rd.id
                LEFT JOIN mstr_race mr
                ON rr.race = mr.id
                LEFT JOIN mstr_racing_category mrc
                ON rr.category = mrc.id
                LEFT JOIN mstr_racing_location mrl
                ON rr.location = mrl.id 
                WHERE deleted ='0'";
        
       $result = $this->db->query($sql)->result();
        return $result;
    }


    public function getLicenceNo(){
        $this->db->select('id, licenseNo');
        $this->db->where('delete',0);
        $result = $this->db->get('rider_details')->result();
        return $result;
    }

    public function getName(){
        $id = $this->input->post('id');
        $this->db->select('name');
        $this->db->where('licenseNo',$id);
        $result = $this->db->get('rider_details')->result();
        return $result;

    }

    public function getRace(){
        $this->db->select('id, name');
        $this->db->where('active',1);
        $result = $this->db->get('mstr_race')->result();
        return $result;
    }


    public function getRacingCat(){
        $this->db->select('id, category AS name');
        $this->db->where('active',1);
        $result = $this->db->get('mstr_racing_category')->result();
        return $result;
    }

    public function getLocation(){
        $this->db->select('id, location');
        $result = $this->db->get('mstr_racing_location')->result();
        return $result;
    }


    public function store(){
        $data = array(
            'licenceNo'=>$this->input->post('licence'),
            'race'=>$this->input->post('race'),
            'category'=>$this->input->post('racingcat'),
            'location'=>$this->input->post('location'),
            'createDate'=>date('Y-m-d H:i:s'),
            'createUser'=>$_SESSION['session_user_data']['userId']
        );
        return $this->db->insert('rider_records',$data);
    }

    public function update($id){
        $data = array(
            'licenceNo'=>$this->input->post('licence'),
            'race'=>$this->input->post('race'),
            'category'=>$this->input->post('racingcat'),
            'location'=>$this->input->post('location'),
            'createDate'=>date('Y-m-d H:i:s'),
            'createUser'=>$_SESSION['session_user_data']['userId']
        );
        $this->db->set($data);
        $this->db->where('id',$id);
       return $this->db->update('rider_records');
    }

  
    public function getRiderRecForEdit($id){
        $sql = "SELECT
        rr.id AS id,
        rr.licenceNo AS licenceNo,
        rd.`name` AS riderName,
        mr.id AS race,
        mrc.id AS category,
        mrl.id AS `location`
    FROM
        rider_records rr
        LEFT JOIN rider_details rd
        ON rr.`licenceNo` = rd.licenseNo
        LEFT JOIN mstr_race mr
        ON rr.race = mr.id
        LEFT JOIN mstr_racing_category mrc
        ON rr.category = mrc.id
        LEFT JOIN mstr_racing_location mrl
        ON rr.location = mrl.id 
        where rr.id ='$id'";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    public function getRiderForEdit($id){
        $this->db->where('id',$id);
        $result = $this->db->get('rider_details')->result();
        return $result;
    }

    public function delete($id){
        $this->db->set('delete',1);
        $this->db->set('deleteDate',date('Y-m-d'));
        $this->db->set('deleteUser',$_SESSION['session_user_data']['userId']);
        $this->db->where('id',$id);
       return $this->db->update('rider_details');
    }
    
}