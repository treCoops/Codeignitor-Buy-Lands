<?php


class LoginModel extends CI_Model
{
    function validateUser($username, $password)
    {

        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get()->result();

        if ($result == null) {

            return false;

        } else {

            return $result;

        }
    }


    function validateUsername($username)
    {
        $this->db->select('password');
        $this->db->from('tbl_users');
        $this->db->where('username', $username);

        $result = $this->db->get()->result();

        if ($result == null) {

            return false;

        } else {

            return $result;

        }

    }
}