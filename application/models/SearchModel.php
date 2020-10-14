<?php


class SearchModel extends CI_Model
{
    function searchLandByKeywordType($keyword){

        $lands = array();

        $this->db->select('*');
        $this->db->from('tbl_land');
        $this->db->like('land_title', $keyword);

        $result = $this->db->get()->result();

        foreach ($result as $land){
            $data['land_id'] = $land->land_id;
            $data['land_title'] = $land->land_title;
            $data['land_price'] = $land->land_price;
            $data['land_address'] = $land->land_address;
            $data['land_city'] = $land->land_city;
            $data['land_area'] = $land->land_area;
            $data['land_image'] = $this->getRelatedLandImage($land->land_id);

            array_push($lands, $data);

        }

        return $lands;

    }

    function searchLandByKeywordTypeProvinceDistrict($keyword, $province, $district){

        $lands = array();

        $this->db->select('*');
        $this->db->from('tbl_land');
        $this->db->like('land_title', $keyword);
        $this->db->where('land_district', $district);
        $this->db->where('land_province', $province);

        $result = $this->db->get()->result();

        foreach ($result as $land){
            $data['land_id'] = $land->land_id;
            $data['land_title'] = $land->land_title;
            $data['land_price'] = $land->land_price;
            $data['land_address'] = $land->land_address;
            $data['land_city'] = $land->land_city;
            $data['land_area'] = $land->land_area;
            $data['land_image'] = $this->getRelatedLandImage($land->land_id);

            array_push($lands, $data);

        }

        return $lands;
    }

    function searchLandByKeywordTypeMinMax($keyword, $min, $max){

        $lands = array();

        $this->db->select('*');
        $this->db->from('tbl_land');
        $this->db->like('land_title', $keyword);
        $this->db->where('land_price >=' , $min);
        $this->db->where('land_price <=', $max);

        $result = $this->db->get()->result();

        foreach ($result as $land){
            $data['land_id'] = $land->land_id;
            $data['land_title'] = $land->land_title;
            $data['land_price'] = $land->land_price;
            $data['land_address'] = $land->land_address;
            $data['land_city'] = $land->land_city;
            $data['land_area'] = $land->land_area;
            $data['land_image'] = $this->getRelatedLandImage($land->land_id);

            array_push($lands, $data);

        }

        return $lands;
    }

    function searchLandByKeywordTypeProvinceDistrictMinMax($keyword, $province, $district, $min, $max){

        $lands = array();

        $this->db->select('*');
        $this->db->from('tbl_land');
        $this->db->like('land_title', $keyword);
        $this->db->where('land_district', $district);
        $this->db->where('land_province', $province);
        $this->db->where('land_price >=' , $min);
        $this->db->where('land_price <=', $max);

        $result = $this->db->get()->result();

        foreach ($result as $land){
            $data['land_id'] = $land->land_id;
            $data['land_title'] = $land->land_title;
            $data['land_price'] = $land->land_price;
            $data['land_address'] = $land->land_address;
            $data['land_city'] = $land->land_city;
            $data['land_area'] = $land->land_area;
            $data['land_image'] = $this->getRelatedLandImage($land->land_id);

            array_push($lands, $data);

        }

        return $lands;

    }

    function searchHouseByKeywordType($keyword, $type){

        $houses = array();

        $this->db->select('*');
        $this->db->from('tbl_house');
        $this->db->like('house_title', $keyword);
        $this->db->where('house_type', $type);

        $result = $this->db->get()->result();

        foreach ($result as $house){
            $data['house_id'] = $house->house_id;
            $data['house_title'] = $house->house_title;
            $data['house_price'] = $house->house_price;
            $data['house_type'] = $house->house_type;
            $data['house_address'] = $house->house_address;
            $data['house_city'] = $house->house_city;
            $data['house_area_size'] = $house->house_area_size;
            $data['house_bedrooms'] = $house->house_bedrooms;
            $data['house_bathrooms'] = $house->house_bathrooms;
            $data['house_image'] = $this->getRelatedHouseImage($house->house_id);

            array_push($houses, $data);

        }

        return $houses;

    }

    function searchHouseByKeywordTypeProvinceDistrict($keyword, $type, $province, $district){

        $houses = array();

        $this->db->select('*');
        $this->db->from('tbl_house');
        $this->db->like('house_title', $keyword);
        $this->db->where('house_type', $type);
        $this->db->where('house_district', $district);
        $this->db->where('house_province', $province);

        $result = $this->db->get()->result();

        foreach ($result as $house){
            $data['house_id'] = $house->house_id;
            $data['house_title'] = $house->house_title;
            $data['house_price'] = $house->house_price;
            $data['house_type'] = $house->house_type;
            $data['house_address'] = $house->house_address;
            $data['house_city'] = $house->house_city;
            $data['house_area_size'] = $house->house_area_size;
            $data['house_bedrooms'] = $house->house_bedrooms;
            $data['house_bathrooms'] = $house->house_bathrooms;
            $data['house_image'] = $this->getRelatedHouseImage($house->house_id);

            array_push($houses, $data);

        }

        return $houses;
    }

    function searchHouseByKeywordTypeMinMax($keyword, $type, $min, $max){
        $houses = array();

        $this->db->select('*');
        $this->db->from('tbl_house');
        $this->db->like('house_title', $keyword);
        $this->db->where('house_type', $type);
        $this->db->where('house_price >=' , $min);
        $this->db->where('house_price <=', $max);

        $result = $this->db->get()->result();

        foreach ($result as $house){
            $data['house_id'] = $house->house_id;
            $data['house_title'] = $house->house_title;
            $data['house_price'] = $house->house_price;
            $data['house_type'] = $house->house_type;
            $data['house_address'] = $house->house_address;
            $data['house_city'] = $house->house_city;
            $data['house_area_size'] = $house->house_area_size;
            $data['house_bedrooms'] = $house->house_bedrooms;
            $data['house_bathrooms'] = $house->house_bathrooms;
            $data['house_image'] = $this->getRelatedHouseImage($house->house_id);

            array_push($houses, $data);

        }

        return $houses;
    }

    function searchHouseByKeywordTypeProvinceDistrictMinMax($keyword, $type, $province, $district, $min, $max){
        $houses = array();

        $this->db->select('*');
        $this->db->from('tbl_house');
        $this->db->like('house_title', $keyword);
        $this->db->where('house_type', $type);
        $this->db->where('house_district', $district);
        $this->db->where('house_province', $province);
        $this->db->where('house_price >=' , $min);
        $this->db->where('house_price <=', $max);

        $result = $this->db->get()->result();

        foreach ($result as $house){
            $data['house_id'] = $house->house_id;
            $data['house_title'] = $house->house_title;
            $data['house_price'] = $house->house_price;
            $data['house_type'] = $house->house_type;
            $data['house_address'] = $house->house_address;
            $data['house_city'] = $house->house_city;
            $data['house_area_size'] = $house->house_area_size;
            $data['house_bedrooms'] = $house->house_bedrooms;
            $data['house_bathrooms'] = $house->house_bathrooms;
            $data['house_image'] = $this->getRelatedHouseImage($house->house_id);

            array_push($houses, $data);

        }

        return $houses;
    }



    function getRelatedLandImage($id){
        $this->db->select('img_url');
        $this->db->from('tbl_image_land');
        $this->db->where('property_master_id', $id);

        $result = $this->db->get()->result();

        if($result != null){
            return $result;
        }else{
            return null;
        }
    }

    function getRelatedHouseImage($id){
        $this->db->select('img_url');
        $this->db->from('tbl_image_house');
        $this->db->where('property_master_id', $id);

        $result = $this->db->get()->result();

        if($result != null){
            return $result;
        }else{
            return null;
        }
    }
}