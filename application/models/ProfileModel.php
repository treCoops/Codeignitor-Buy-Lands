<?php


class ProfileModel extends CI_Model
{
    function updateMe($id, $data){
        $this->db->where('tbl_users.account_id', $id);
        $result = $this->db->update('tbl_users', $data);

        return $result;
    }

    function checkCurrent($pass, $id){
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('password', $pass);
        $this->db->where('account_id', $id);

        if($this->db->get()->result()){
            return true;
        }else{
            return false;
        }
    }

    function updatePass($pass, $id){
        $this->db->set('password', $pass);
        $this->db->where('account_id', $id);
        $result = $this->db->update('tbl_users');

        return $result;
    }

}