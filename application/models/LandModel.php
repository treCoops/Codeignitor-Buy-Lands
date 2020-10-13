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

    function updateLand($data, $id){
        $this->db->where('tbl_land.land_id', $id);
        $result = $this->db->update('tbl_land', $data);

        return $result;
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

    function getLandsForTable($param){
        $filter = $param['search'];

        $this->db->select('tbl_land.land_id, tbl_land.land_title, tbl_land.land_price, tbl_land.land_city, tbl_district.district_name, tbl_province.province_name');
        $this->db->from('tbl_land');
        $this->db->join('tbl_district','tbl_district.district_id = tbl_land.land_district');
        $this->db->join('tbl_province','tbl_province.province_id = tbl_land.land_province');
        $this->db->where("(`tbl_land.land_id` LIKE '%$filter%'");
        $this->db->or_where("`tbl_land.land_title` LIKE '%$filter%'");
        $this->db->or_where("`tbl_land.land_price` LIKE '%$filter%'");
        $this->db->or_where("`tbl_land.land_city` LIKE '%$filter%'");
        $this->db->or_where("`tbl_district.district_name` LIKE '%$filter%'");
        $this->db->or_where("`tbl_province.province_name` LIKE '%$filter%')");
        $this->db->limit($param['length'],$param['start']);
        $query = $this->db->get();
        $result = $query->result();

        $returnData['data'] =  $result;
        $returnData['recordsTotal'] = $this->getRowCountOfGetLandsForTable();
        $returnData['draw'] = $param['draw'];

        if($filter == null)
            $returnData['recordsFiltered'] = $this->getRowCountOfGetLandsForTable();
        else
            $returnData['recordsFiltered'] = $query->num_rows();

        return $returnData;
    }

    function getRowCountOfGetLandsForTable(){

        $this->db->select('tbl_land.land_id, tbl_land.land_title, tbl_land.land_price, tbl_land.land_city, tbl_district.district_name, tbl_province.province_name');
        $this->db->from('tbl_land');
        $this->db->join('tbl_district','tbl_district.district_id = tbl_land.land_district');
        $this->db->join('tbl_province','tbl_province.province_id = tbl_land.land_province');
        $query = $this->db->get();

        return $query->num_rows();
    }

    function getRelatedLandImages($id){
        $this->db->select('img_url');
        $this->db->from('tbl_image_land');
        $this->db->where('property_master_id', $id);

        $result = $this->db->get()->result();

        if($result != null){
            $this->deleteLandImages($id);
            return $result;
        }else{
            return null;
        }
    }

    function deleteLandImages($id){
        $this->db->where('property_master_id', $id);
        $this->db->delete('tbl_image_land');

        return $this->db->affected_rows();
    }

    function deleteLand($id){
        $this->db->where('land_id', $id);
        $this->db->delete('tbl_land');

        $result = $this->db->affected_rows();

        return $result;
    }

    function getLand($id){
        $this->db->select('*');
        $this->db->from('tbl_land');
        $this->db->where('land_id', $id);

        $result = $this->db->get()->result();
        if($result != null){
            $result['images'] = $this->getRelatedLandImagesForUpdate($id);
            return $result;
        }else{
            return null;
        }
    }

    function getRelatedLandImagesForUpdate($id){
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

    function removeImages($imgName){
        $this->db->where('tbl_image_land.img_url', $imgName);
        $this->db->delete('tbl_image_land');

        $result = $this->db->affected_rows();

        return $result;
    }

}