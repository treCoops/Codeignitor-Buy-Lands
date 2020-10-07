<?php


class BHouse extends CI_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->model('LocationModel');

    }

    public function viewAddHouse(){
        $data['title'] = 'Admin Login | Add House';
        $data['content'] = 'BackEnd/House/addHouse';
        $data['province'] = $this->LocationModel->getAllProvince();
        $this->load->view('BackEnd/Template/template', $data);
    }

    public function viewAddFloorPlan(){
        $data['title'] = 'Admin Login | Add Floor Plan';
        $data['content'] = 'BackEnd/House/addFloorPlans';
        $this->load->view('BackEnd/Template/template', $data);
    }

    public function viewManageHouses(){

    }

    public function cGetRelatedDistrict(){

        $response = array();

        $data = $this->LocationModel->getRelatedDistrict($this->input->post('ID'));

        if($data != null){
            $response['data'] = $data;
            $response['status'] = '200';
        }else{
            $response['message'] = 'No data available.!';
            $response['status'] = '400';
        }

        echo json_encode($response);

    }
}