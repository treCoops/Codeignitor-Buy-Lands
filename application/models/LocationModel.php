<?php


class LocationModel extends CI_Model
{
    function getAllProvince(){
        $this->db->select('*');
        $this->db->from('tbl_province');

        $result = $this->db->get()->result();

        if($result != null){
            return $result;
        }else{
            return null;
        }
    }

    function getRelatedDistrict($id){
        $this->db->select('*');
        $this->db->from('tbl_district');
        $this->db->where('province_master_id', $id);

        $result = $this->db->get()->result();

        if($result != null){
            return $result;
        }else{
            return null;
        }
    }

}