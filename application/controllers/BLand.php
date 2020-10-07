<?php

class BLand extends CI_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->model('LocationModel');
        $this->load->model('LandModel');

    }



    public function viewAddLand(){
        $data['title'] = 'Admin Login | Add Land';
        $data['content'] = 'BackEnd/Land/addLand';
        $data['province'] = $this->LocationModel->getAllProvince();
        $this->load->view('BackEnd/Template/template', $data);
    }

    public function viewManageLands(){

    }

    public function addLand(){
        $User_Session = $this->session->userdata('User_Session');
        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {

            if ($this->LandModel->is_exist($this->input->post('txtLandTitle'), $this->input->post('txtLandArea'), $this->input->post('txtLandPrice'), $this->input->post('txtLandCity'))) {

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
                        }
                    }
                }

                $save['land_title'] = $this->input->post('txtLandTitle');
                $save['land_description'] = $this->input->post('txtLandDescription');
                $save['land_price'] = $this->input->post('txtLandPrice');
                $save['land_area'] = $this->input->post('txtLandArea');
                $save['land_status'] = $this->input->post('cmbLandStatus');
                $save['land_address'] = $this->input->post('txtLandAddress');
                $save['land_city'] = $this->input->post('txtLandCity');
                $save['land_province'] = $this->input->post('cmbLandProvince');
                $save['land_district'] = $this->input->post('cmbLandDistrict');
                $save['land_youtube_url'] = $this->input->post('txtYoutubeLink');
                $save['created_by'] = $User_Session['ID'];

                $id = $this->LandModel->saveLand($save);

                if ($id == null) {
                    $response['status'] = 500;
                    $response['message'] = 'Internal Server Error.!';
                } else {

                    $c = 0;
                    for ($a = 0; $a < count($data['totalFiles']); $a++) {
                        $img['property_master_id'] = $id;
                        $img['img_url'] = $data['totalFiles'][$a];
                        $img['img_status'] = 1;

                        $result = $this->LandModel->saveImages($img);

                        if ($result) {
                            $c++;
                        }
                    }

                    if ($c == count($data['totalFiles'])) {
                        $response['status'] = 200;
                        $response['message'] = 'Land added successfully.!';
                    } else {
                        $response['status'] = 500;
                        $response['message'] = 'Internal Server Error.!';
                    }
                }

            }
            else{
                $response['status'] = 500;
                $response['message'] = 'This land details are exits.!';
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