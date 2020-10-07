<?php


class BHouse extends CI_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->model('LocationModel');
        $this->load->model('HouseModel');

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
        $data['houses'] = $this->HouseModel->getAvailableHouses();
        $this->load->view('BackEnd/Template/template', $data);
    }

    public function viewManageHouses(){

    }

    public function addHouseFloorPlan(){
        $User_Session = $this->session->userdata('User_Session');
        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {

            if ($this->HouseModel->is_plan_exist($this->input->post('cmbHouse'), $this->input->post('txtPlanDescription'))) {

                $rand_name = uniqid() . "_" . session_id() . "_" . time();

                $config["upload_path"] = "./assets/images/admin/uploads/";
                $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
                $config['max_size'] = 5000;
                $config['max_width'] = 2500;
                $config['max_height'] = 2500;
                $config['file_name'] = $rand_name;

                $this->load->library('upload', $config);

                $data = array();
                $response = array();
                $save = array();
                $count = count($_FILES['txtImages']['name']);

                for ($i = 0; $i < $count; $i++) {
                    if (!empty($_FILES['txtImages']['name'][$i])) {
                        $_FILES['file']['name'] = $_FILES['txtImages']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['txtImages']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['txtImages']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['txtImages']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['txtImages']['size'][$i];


                        if ($this->upload->do_upload('file')) {
                            $uploadData = $this->upload->data();
                            $filename = $uploadData['file_name'];
                            $data['totalFiles'][] = $filename;
                        }else{
                            $error = array('error' => $this->upload->display_errors());
                            $response['error'] = $error;
                            $response['status'] = 500;
                        }
                    }
                }

                $save['house_master_id'] = $this->input->post('cmbHouse');
                $save['plan_description'] = $this->input->post('txtPlanDescription');
                $save['created_by'] = $User_Session['ID'];

                $id = $this->HouseModel->saveHousePlan($save);

                if ($id == null) {
                    $response['status'] = 500;
                    $response['message'] = 'Internal Server Error.!';
                } else {

                    $c = 0;
                    for ($a = 0; $a < count($data['totalFiles']); $a++) {
                        $img['property_master_id'] = $id;
                        $img['img_url'] = $data['totalFiles'][$a];
                        $img['img_status'] = 1;

                        $result = $this->HouseModel->savePlanImages($img);

                        if ($result) {
                            $c++;
                        }
                    }

                    if ($c == count($data['totalFiles'])) {
                        $response['status'] = 200;
                        $response['message'] = 'House plan added successfully.!';
                    } else {
                        $response['status'] = 500;
                        $response['message'] = 'Internal Server Error.!';
                    }
                }

            }
            else{
                $response['status'] = 500;
                $response['message'] = 'This house plan are exits.!';
            }

            echo json_encode($response);

        }
    }

    public function addHouse(){
        $User_Session = $this->session->userdata('User_Session');
        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {

            if ($this->HouseModel->is_exist($this->input->post('txtHouseTitle'), $this->input->post('txtHouseAreaSize'), $this->input->post('txtHousePrice'), $this->input->post('txtHouseCity'))) {

                $rand_name = uniqid() . "_" . session_id() . "_" . time();

                $config["upload_path"] = "./assets/images/admin/uploads/";
                $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
                $config['max_size'] = 5000;
                $config['max_width'] = 2500;
                $config['max_height'] = 2500;
                $config['file_name'] = $rand_name;

                $this->load->library('upload', $config);

                $data = array();
                $response = array();
                $save = array();
                $count = count($_FILES['txtImages']['name']);

                for ($i = 0; $i < $count; $i++) {
                    if (!empty($_FILES['txtImages']['name'][$i])) {
                        $_FILES['file']['name'] = $_FILES['txtImages']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['txtImages']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['txtImages']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['txtImages']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['txtImages']['size'][$i];


                        if ($this->upload->do_upload('file')) {
                            $uploadData = $this->upload->data();
                            $filename = $uploadData['file_name'];
                            $data['totalFiles'][] = $filename;
                        }else{
                            $error = array('error' => $this->upload->display_errors());
                            $response['error'] = $error;
                            $response['status'] = 500;
                        }
                    }
                }

                $save['house_title'] = $this->input->post('txtHouseTitle');
                $save['house_description'] = $this->input->post('txtHouseDescription');
                $save['house_price'] = $this->input->post('txtHousePrice');
                $save['house_type'] = $this->input->post('cmbHouseType');
                $save['house_status'] = $this->input->post('cmbHouseStatus');
                $save['house_address'] = $this->input->post('txtHouseAddress');
                $save['house_city'] = $this->input->post('txtHouseCity');
                $save['house_district'] = $this->input->post('cmbHouseDistrict');
                $save['house_province'] = $this->input->post('cmbHouseProvince');
                $save['house_land_size'] = $this->input->post('txtHouseLandSize');
                $save['house_area_size'] = $this->input->post('txtHouseAreaSize');
                $save['house_built_year'] = $this->input->post('txtHouseBuiltYear');
                $save['house_bedrooms'] = $this->input->post('txtHouseBedrooms');
                $save['house_bathrooms'] = $this->input->post('txtHouseBathrooms');
                $save['house_garages'] = $this->input->post('txtHouseGarages');
                $save['house_garage_size'] = $this->input->post('txtHouseGarageSize');
                $save['house_youtube_url'] = $this->input->post('txtYoutubeLink');
                $save['created_by'] = $User_Session['ID'];

                $id = $this->HouseModel->saveHouse($save);

                if ($id == null) {
                    $response['status'] = 500;
                    $response['message'] = 'Internal Server Error.!';
                } else {

                    $c = 0;
                    for ($a = 0; $a < count($data['totalFiles']); $a++) {
                        $img['property_master_id'] = $id;
                        $img['img_url'] = $data['totalFiles'][$a];
                        $img['img_status'] = 1;

                        $result = $this->HouseModel->saveImages($img);

                        if ($result) {
                            $c++;
                        }
                    }

                    if ($c == count($data['totalFiles'])) {
                        $response['status'] = 200;
                        $response['message'] = 'House added successfully.!';
                    } else {
                        $response['status'] = 500;
                        $response['message'] = 'Internal Server Error.!';
                    }
                }

            }
            else{
                $response['status'] = 500;
                $response['message'] = 'This house details are exits.!';
            }

            echo json_encode($response);

        }
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