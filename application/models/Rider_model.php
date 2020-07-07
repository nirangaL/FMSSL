<?php
class Rider_model extends CI_Model{

    public function getBloodGroups(){
        $this->db->select('id, bloodGroup as name');
        $this->db->where('active',1);
        $result = $this->db->get('mste_blood_grp')->result();
        return $result;
    }

    public function getInsuCat(){
        $this->db->select('id, insuName AS name');
        $this->db->where('active',1);
        $result = $this->db->get('mstr_insurance')->result();
        return $result;
    }

    public function getRacingCat(){
        $this->db->select('id, category AS name');
        $this->db->where('active',1);
        $result = $this->db->get('mstr_racing_category')->result();
        return $result;
    }

    public function getRidingCat(){
        $this->db->select('id, name');
        $this->db->where('active',1);
        $result = $this->db->get('mstr_riding_cat')->result();
        return $result;
    }

    public function getRidingforces(){
        $this->db->select('id, name');
        $this->db->where('active',1);
        $result = $this->db->get('mstr_riding_forces')->result();
        return $result;
    }


    public function store(){

        $data = array(
            'licenseNo'=>$this->input->post('license'),
            'name'=>$this->input->post('name'),
            'nic'=>$this->input->post('nic'),
            'dob'=>$this->input->post('dob'),
            'address'=>$this->input->post('address'),
            'phone1'=>$this->input->post('phone1'),
            'phone2'=>$this->input->post('phone2'),
            'bloodGroup'=>$this->input->post('bloodg'),
            'licenseIssueDate'=>$this->input->post('lissudate'),
            'licenseexpDate'=>$this->input->post('lexdate'),
            'medicalIssueDate'=>$this->input->post('missuedate'),
            'medicalExpDate'=>$this->input->post('mexdate'),
            'insuNo'=>$this->input->post('insuranceNo'),
            'insuCat'=>$this->input->post('insucat'),
            'insuIssueDate'=>$this->input->post('insissuedate'),
            'insuExpDate'=>$this->input->post('insexdate'),
            'racingCat'=>$this->input->post('racingcat'),
            'ridingCat'=>$this->input->post('ridingcat'),
            'ridingForce'=>$this->input->post('ridingforces'),
            'deathRider'=>$this->input->post('deathRider'),
            'noRiding'=>$this->input->post('noRiding'),
            'createDate'=>date('Y-m-d H:i:s'),
            'createUser'=>$_SESSION['session_user_data']['userId']
        );

        // echo '<pre>';
        // print_r($data);exit();

        return $this->db->insert('rider_details',$data);
    }

    public function update($id){
        $data = array(
            'licenseNo'=>$this->input->post('license'),
            'name'=>$this->input->post('name'),
            'nic'=>$this->input->post('nic'),
            'dob'=>$this->input->post('dob'),
            'address'=>$this->input->post('address'),
            'phone1'=>$this->input->post('phone1'),
            'phone2'=>$this->input->post('phone2'),
            'bloodGroup'=>$this->input->post('bloodg'),
            'licenseIssueDate'=>$this->input->post('lissudate'),
            'licenseexpDate'=>$this->input->post('lexdate'),
            'medicalIssueDate'=>$this->input->post('missuedate'),
            'medicalExpDate'=>$this->input->post('mexdate'),
            'insuNo'=>$this->input->post('insuranceNo'),
            'insuCat'=>$this->input->post('insucat'),
            'insuIssueDate'=>$this->input->post('insissuedate'),
            'insuExpDate'=>$this->input->post('insexdate'),
            'racingCat'=>$this->input->post('racingcat'),
            'ridingCat'=>$this->input->post('ridingcat'),
            'ridingForce'=>$this->input->post('ridingforces'),
            'deathRider'=>$this->input->post('deathRider'),
            'noRiding'=>$this->input->post('noRiding'),
            'updateDate'=>date('Y-m-d H:i:s'),
            'updateUser'=>$_SESSION['session_user_data']['userId']
        );

        $this->db->set($data);
        $this->db->where('id',$id);
       return $this->db->update('rider_details');
    }

    public function getAllRiders(){
        $this->db->select('id,licenseNo,name,nic,licenseexpDate,medicalExpDate,insuExpDate,createDate');
        $this->db->where('delete',0);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get('rider_details')->result();
        return $result;
    }
    public function getRider($id){
        $sql = "SELECT 
        rd.`id`,
          rd.`licenseNo`,
          rd.`name`,
          rd.`nic`,
          rd.`dob`,
          rd.`address`,
          rd.`phone1`,
          rd.`phone2`,
          rd.`deathRider`,
          rd.`noRiding`,
          bg.`bloodGroup` AS `bloodGroup`,
          rd.`licenseIssueDate`,
          rd.`licenseexpDate`,
          rd.`medicalIssueDate`,
          rd.`medicalExpDate`,
          rd.`insuNo`,
          ins.`insuName` AS `insuCat`,
          rd.`insuIssueDate`,
          rd.`insuExpDate`,
          rcc.category AS `racingCat`,
          rc.`name`AS `ridingCat`,
          rf.`name` AS `ridingForce`,
          rd.createDate
        FROM `rider_details` rd
        LEFT JOIN `mste_blood_grp` bg ON rd.`bloodGroup` = bg.`id`
        LEFT JOIN `mstr_insurance` ins ON rd.`insuCat` = ins.`id`
        LEFT JOIN  `mstr_racing_category` rcc ON rd.`racingCat` = rcc.`id`
        LEFT JOIN `mstr_riding_cat` rc ON rd.`ridingCat` = rc.`id`
        LEFT JOIN `mstr_riding_forces` rf ON rd.`ridingForce`  = rf.`id` WHERE rd.id='$id'";
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