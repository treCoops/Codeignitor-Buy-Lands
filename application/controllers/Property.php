<?php


class Property extends CI_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->model('SearchModel');
        $this->load->model('LocationModel');

    }

    public function search(){

        $keyword = $this->input->post('txtKeyword');
        $type = $this->input->post('cmbType');
        $province = $this->input->post('cmbProvince');
        $district = $this->input->post('cmbDistrict');
        $minPrice = $this->input->post('slideLow');
        $maxPrice = $this->input->post('slideHigh');

        $minValue = null;
        $maxValue = null;

        if($minPrice != null && $maxPrice){
            $min_parts = explode(',', $minPrice);
            $max_parts = explode(',', $maxPrice);

            for ($a=0; $a<count($min_parts); $a++){
                $minValue = $minValue."".$min_parts[$a];
            }

            for ($a=0; $a<count($max_parts); $a++){
                $maxValue = $maxValue."".$max_parts[$a];
            }
        }




        $result = null;

        if($type == 'Land'){

            if($province != -1 && $district != -1 && $minPrice != null && $maxPrice){
                $this->render($this->SearchModel->searchLandByKeywordTypeProvinceDistrictMinMax($keyword, $province, $district, substr($minValue, 3), substr($maxValue, 3)), $type);
            }else if($minPrice != null && $maxPrice){
                $this->render($this->SearchModel->searchLandByKeywordTypeMinMax($keyword, substr($minValue, 3), substr($maxValue, 3)), $type);
            }else if($province != -1 && $district != -1 ){
                $this->render($this->SearchModel->searchLandByKeywordTypeProvinceDistrict($keyword, $province, $district), $type);
            }else{
                $this->render($this->SearchModel->searchLandByKeywordType($keyword), $type);
            }

        }else{

            if($province != -1 && $district != -1 && $minPrice != null && $maxPrice){
                $this->render($this->SearchModel->searchHouseByKeywordTypeProvinceDistrictMinMax($keyword, $type, $province, $district, substr($minValue, 3), substr($maxValue, 3)), $type);
            }else if($minPrice != null && $maxPrice){
                $this->render($this->SearchModel->searchHouseByKeywordTypeMinMax($keyword, $type, substr($minValue, 3), substr($maxValue, 3)), $type);
            }else if($province != -1 && $district != -1 ){
                $this->render($this->SearchModel->searchHouseByKeywordTypeProvinceDistrict($keyword, $type, $province, $district), $type);
            }else{
                $this->render($this->SearchModel->searchHouseByKeywordType($keyword, $type), $type);
            }
        }




    }

    function render($val, $type){

        $data['content'] = 'FrontEnd/Pages/searchListPage';
        $data['title'] = 'Buy Lands | Property Search';
        $data['properties'] = $val;
        $data['type'] = $type;
        $data['provinces'] = $this->LocationModel->getAllProvince();

        $this->load->view('FrontEnd/Template/template', $data);
    }


    function all(){
        $data['content'] = 'FrontEnd/Pages/allListPage';
        $data['title'] = 'Buy Lands | All Properties';

        if($this->input->get('type') == 'land'){
            $data['properties'] = $this->SearchModel->getAllLands();
        }else{
            $data['properties'] = $this->SearchModel->getAllHouses();
        }

        $data['type'] = $this->input->get('type');
        $data['provinces'] = $this->LocationModel->getAllProvince();

        $this->load->view('FrontEnd/Template/template', $data);
    }

}