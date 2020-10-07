<?php


class LandModel extends CI_Model
{

    function saveLand($data){
        $this->db->insert('tbl_land', $data);
        $insert_id = $this->db->insert_id();

        if($insert_id != null){
            return $insert_id;
        }else{
            return false;
        }
    }

    function saveImages($fileName){
        $result = $this->db->insert('tbl_image_land', $fileName);

        if($result){
            return true;
        }else{
            return false;
        }
    }

    function is_exist($title, $area, $price, $city){
        $this->db->select('*');
        $this->db->from('tbl_land');
        $this->db->where('land_title', $title);
        $this->db->where('land_area', $area);
        $this->db->where('land_price', $price);
        $this->db->where('land_city', $city);

        $result = $this->db->get()->result();

        if($result == null){
            return true;
        }else{
            return false;
        }
    }

}