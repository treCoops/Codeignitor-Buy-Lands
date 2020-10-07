<?php


class HouseModel extends CI_Model
{

    function saveHouse($data){
        $this->db->insert('tbl_house', $data);
        $insert_id = $this->db->insert_id();

        if($insert_id != null){
            return $insert_id;
        }else{
            return false;
        }
    }


    function saveHousePlan($data){
        $this->db->insert('tbl_house_floor_plan', $data);
        $insert_id = $this->db->insert_id();

        if($insert_id != null){
            return $insert_id;
        }else{
            return false;
        }
    }

    function saveImages($fileName){
        $result = $this->db->insert('tbl_image_house', $fileName);

        if($result){
            return true;
        }else{
            return false;
        }
    }

    function savePlanImages($fileName){
        $result = $this->db->insert('tbl_image_house_plan', $fileName);

        if($result){
            return true;
        }else{
            return false;
        }
    }

    function is_exist($title, $area, $price, $city){
        $this->db->select('*');
        $this->db->from('tbl_house');
        $this->db->where('house_title', $title);
        $this->db->where('house_area_size', $area);
        $this->db->where('house_price', $price);
        $this->db->where('house_city', $city);

        $result = $this->db->get()->result();

        if($result == null){
            return true;
        }else{
            return false;
        }
    }

    function is_plan_exist($title, $des){
        $this->db->select('*');
        $this->db->from('tbl_house_floor_plan');
        $this->db->where('house_master_id', $title);
        $this->db->where('plan_description', $des);

        $result = $this->db->get()->result();

        if($result == null){
            return true;
        }else{
            return false;
        }
    }

    function getAvailableHouses(){
        $this->db->select('house_id, house_title');
        $this->db->from('tbl_house');
        $this->db->where('house_status', 1);

        $result = $this->db->get()->result();

        if($result != null){
            return $result;
        }else{
            return false;
        }
    }

}