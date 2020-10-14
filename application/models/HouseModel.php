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

    function updatePlan($id, $planId, $des){
        $this->db->set('tbl_house_floor_plan.house_master_id', $planId);
        $this->db->set('tbl_house_floor_plan.plan_description', $des);
        $this->db->where('tbl_house_floor_plan.house_plan_id', $id);
        $this->db->update('tbl_house_floor_plan');

        $result = $this->db->affected_rows();

        return $result;
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

    function getHousePlansForTable($param){
        $filter = $param['search'];
        $id = $param['id'];

        $this->db->select('tbl_house_floor_plan.house_plan_id, tbl_house_floor_plan.plan_description, tbl_house.house_title');
        $this->db->from('tbl_house_floor_plan');
        $this->db->join('tbl_house','tbl_house.house_id = tbl_house_floor_plan.house_master_id');
        $this->db->where('tbl_house_floor_plan.house_master_id', $id);
        $this->db->where("(`tbl_house_floor_plan.house_plan_id` LIKE '%$filter%'");
        $this->db->or_where("`tbl_house.house_title` LIKE '%$filter%'");
        $this->db->or_where("`tbl_house_floor_plan.plan_description` LIKE '%$filter%')");
        $this->db->limit($param['length'],$param['start']);
        $query = $this->db->get();
        $result = $query->result();

        $returnData['data'] =  $result;
        $returnData['recordsTotal'] = $this->getRowCountOfGetHousePlansForTable($id);
        $returnData['draw'] = $param['draw'];

        if($filter == null)
            $returnData['recordsFiltered'] = $this->getRowCountOfGetHousePlansForTable($id);
        else
            $returnData['recordsFiltered'] = $query->num_rows();

        return $returnData;
    }

    function getRowCountOfGetHousePlansForTable($id){

        $this->db->select('*');
        $this->db->from('tbl_house_floor_plan');
        $this->db->join('tbl_house','tbl_house.house_id = tbl_house_floor_plan.house_master_id');
        $this->db->where('tbl_house_floor_plan.house_master_id', $id);
        $query = $this->db->get();

        return $query->num_rows();
    }

    function deleteHouseFloorPlan($id){

        $this->db->where('house_plan_id', $id);
        $this->db->delete('tbl_house_floor_plan');

        $result = $this->db->affected_rows();

        return $result;

    }

    function getHouseFloorPlan($id){

        $this->db->select('*');
        $this->db->from('tbl_house_floor_plan');
        $this->db->where('house_plan_id', $id);

        $result = $this->db->get()->result();
        if($result != null){
            $result['images'] = $this->getRelatedFloorPlanImagesForUpdate($id);
            return $result;
        }else{
            return null;
        }

    }

    function removeImages($imgName){
        $this->db->where('tbl_image_house_plan.img_url', $imgName);
        $this->db->delete('tbl_image_house_plan');

        $result = $this->db->affected_rows();

        return $result;
    }

    function getRelatedFloorPlanImagesForUpdate($id){
        $this->db->select('img_url');
        $this->db->from('tbl_image_house_plan');
        $this->db->where('property_master_id', $id);

        $result = $this->db->get()->result();

        if($result != null){
            return $result;
        }else{
            return null;
        }
    }

    function getRelatedFloorPlanImages($id){
        $this->db->select('img_url');
        $this->db->from('tbl_image_house_plan');
        $this->db->where('property_master_id', $id);

        $result = $this->db->get()->result();

        if($result != null){
            $this->deleteHouseFloorPlanImages($id);
            return $result;
        }else{
            return null;
        }


    }

    function deleteHouseFloorPlanImages($id){
        $this->db->where('property_master_id', $id);
        $this->db->delete('tbl_image_house_plan');

        return $this->db->affected_rows();
    }

    function getHousesForTable($param){
        $filter = $param['search'];

        $this->db->select('tbl_house.house_id, tbl_house.house_title, tbl_house.house_price, tbl_house.house_type, tbl_house.house_city, tbl_district.district_name, tbl_province.province_name');
        $this->db->from('tbl_house');
        $this->db->join('tbl_district','tbl_district.district_id = tbl_house.house_district');
        $this->db->join('tbl_province','tbl_province.province_id = tbl_house.house_province');
        $this->db->where("(`tbl_house.house_id` LIKE '%$filter%'");
        $this->db->or_where("`tbl_house.house_title` LIKE '%$filter%'");
        $this->db->or_where("`tbl_house.house_type` LIKE '%$filter%'");
        $this->db->or_where("`tbl_house.house_price` LIKE '%$filter%'");
        $this->db->or_where("`tbl_house.house_city` LIKE '%$filter%'");
        $this->db->or_where("`tbl_district.district_name` LIKE '%$filter%'");
        $this->db->or_where("`tbl_province.province_name` LIKE '%$filter%')");
        $this->db->limit($param['length'],$param['start']);
        $query = $this->db->get();
        $result = $query->result();

        $returnData['data'] =  $result;
        $returnData['recordsTotal'] = $this->getRowCountOfGetHousesForTable();
        $returnData['draw'] = $param['draw'];

        if($filter == null)
            $returnData['recordsFiltered'] = $this->getRowCountOfGetHousesForTable();
        else
            $returnData['recordsFiltered'] = $query->num_rows();

        return $returnData;
    }

    function getRowCountOfGetHousesForTable(){

        $this->db->select('tbl_house.house_id, tbl_house.house_title, tbl_house.house_price, tbl_house.house_type, tbl_house.house_city, tbl_district.district_name, tbl_province.province_name');
        $this->db->from('tbl_house');
        $this->db->join('tbl_district','tbl_district.district_id = tbl_house.house_district');
        $this->db->join('tbl_province','tbl_province.province_id = tbl_house.house_province');
        $query = $this->db->get();

        return $query->num_rows();
    }

    function getRelatedHouseImages($id){
        $this->db->select('img_url');
        $this->db->from('tbl_image_house');
        $this->db->where('property_master_id', $id);

        $result = $this->db->get()->result();

        if($result != null){
            $this->deleteHouseImages($id);
            return $result;
        }else{
            return null;
        }
    }

    function deleteHouseImages($id){
        $this->db->where('property_master_id', $id);
        $this->db->delete('tbl_image_house');

        return $this->db->affected_rows();
    }

    function deleteHouse($id){
        $this->db->where('house_id', $id);
        $this->db->delete('tbl_house');

        $result = $this->db->affected_rows();

        return $result;
    }

    function getHouse($id){
        $this->db->select('*');
        $this->db->from('tbl_house');
        $this->db->where('house_id', $id);

        $result = $this->db->get()->result();
        if($result != null){
            $result['images'] = $this->getRelatedHouseImagesForUpdate($id);
            return $result;
        }else{
            return null;
        }
    }

    function getRelatedHouseImagesForUpdate($id){
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

    function getRelatedHouseImageForHome($id){
        $this->db->select('img_url');
        $this->db->from('tbl_image_house');
        $this->db->where('property_master_id', $id);

        $result = $this->db->get()->row();

        if($result != null){
            return $result->img_url;
        }else{
            return null;
        }
    }

    function getAllHouses(){

        $houses = array();

        $this->db->select('*');
        $this->db->from('tbl_house');
        $this->db->where('house_status', 1);

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
            $data['house_image'] = $this->getRelatedHouseImageForHome($house->house_id);

            array_push($houses, $data);

        }

        return $houses;

    }

    function removeHouseImages($imgName){
        $this->db->where('tbl_image_house.img_url', $imgName);
        $this->db->delete('tbl_image_house');

        $result = $this->db->affected_rows();

        return $result;
    }

    function updateHouse($data, $id){
        $this->db->where('tbl_house.house_id', $id);
        $result = $this->db->update('tbl_house', $data);

        return $result;
    }

    function getCountOfHouse(){
        $this->db->select('*');
        $this->db->from('tbl_house');
        $query = $this->db->get();

        return $query->num_rows();
    }

}

