<?php

class BLand extends CI_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->model('LocationModel');
        $this->load->model('LandModel');

    }

    public function viewAddLand(){
        $data['title'] = 'Admin | Add Land';
        $data['content'] = 'BackEnd/Land/addLand';
        $data['province'] = $this->LocationModel->getAllProvince();
        $this->load->view('BackEnd/Template/template', $data);
    }

    public function viewManageLands(){
        $data['title'] = 'Admin | Manage Lands';
        $data['content'] = 'BackEnd/Land/manageLands';
        $data['province'] = $this->LocationModel->getAllProvince();
        $this->load->view('BackEnd/Template/template', $data);
    }

    public function addLand(){

        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

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

                if (!empty($_FILES['txtPlanImage']['name'])) {
                    $_FILES['file']['name'] = $_FILES['txtPlanImage']['name'];
                    $_FILES['file']['type'] = $_FILES['txtPlanImage']['type'];
                    $_FILES['file']['tmp_name'] = $_FILES['txtPlanImage']['tmp_name'];
                    $_FILES['file']['error'] = $_FILES['txtPlanImage']['error'];
                    $_FILES['file']['size'] = $_FILES['txtPlanImage']['size'];


                    if ($this->upload->do_upload('file')) {
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        $save['land_plan_image'] = $filename;
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $response['error'] = $error;
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

        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

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

    function cGetLandsTable(){
        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {
            $param['draw'] = $this->input->get('draw');
            $param['length'] = $this->input->get('length');
            $param['start'] = $this->input->get('start');
            $param['columns'] = $this->input->get('columns');
            $param['search'] = $this->input->get('search[value]');
            $param['order'] = $this->input->get('order');

            echo json_encode($this->LandModel->getLandsForTable($param));
        }
    }

    function cDeleteLand(){
        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {
            $response = array();
            $result = true;

            $images = $this->LandModel->getRelatedLandImages($this->input->post('ID'));

            foreach ($images as $val){
                if (file_exists('assets/images/admin/uploads/'.$val->img_url)){
                    unlink('assets/images/admin/uploads/'.$val->img_url);
                }
            }

            $flag = $this->LandModel->deleteLand($this->input->post('ID'));

            if ($flag == 0) {
                $result = false;
            }

            $response['result'] = $result;

            echo json_encode($response);
        }
    }

    function cGetLand(){
        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {
            $response = array();

            $result = $this->LandModel->getLand($this->input->post('ID'));
            if($result != null){
                $response['data'] = $result;
                $response['status'] = 200;
            }else{
                $response['message'] = 'No data found';
                $response['status'] = 200;
            }

            echo json_encode($response);
        }
    }

    function cRemoveImages(){
        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {

            $images = $this->input->post('images');
            $response = array();
            $count = 0;

            if($images != null){

                for($a=0; $a<count($images); $a++){
                    $result = $this->LandModel->removeImages($images[$a]);

                    if($result != 0){
                        if (file_exists('assets/images/admin/uploads/'.$images[$a])){
                            unlink('assets/images/admin/uploads/'.$images[$a]);
                        }

                        $count++;
                    }
                }

                if($count == count($images)){
                    $response['status'] = 200;
                    $response['message'] = 'Success';
                    echo json_encode($response);
                }
            }
        }
    }

    function cUpdateLand(){
        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {

            $rand_name = uniqid() . "_" . session_id() . "_" . time();

            $config["upload_path"] = "./assets/images/admin/uploads/";
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size'] = 5000;
            $config['max_width'] = 2500;
            $config['max_height'] = 2500;
            $config['file_name'] = $rand_name;

            $this->load->library('upload', $config);

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

                        $img['property_master_id'] = $this->input->post('txtLandID');
                        $img['img_url'] = $filename;
                        $img['img_status'] = 1;

                        $this->LandModel->saveImages($img);

                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $response['error'] = $error;
                        $response['status'] = 500;
                    }
                }
            }

            if (!empty($_FILES['txtPlanImage']['name'])) {
                $_FILES['file']['name'] = $_FILES['txtPlanImage']['name'];
                $_FILES['file']['type'] = $_FILES['txtPlanImage']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['txtPlanImage']['tmp_name'];
                $_FILES['file']['error'] = $_FILES['txtPlanImage']['error'];
                $_FILES['file']['size'] = $_FILES['txtPlanImage']['size'];


                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $save['land_plan_image'] = $filename;

                    if($this->input->post('txtCurrentPlanImage') != null) {
                        if (file_exists('assets/images/admin/uploads/' . $this->input->post('txtCurrentPlanImage'))) {
                            unlink('assets/images/admin/uploads/' . $this->input->post('txtCurrentPlanImage'));
                        }
                    }

                }else{
                    $error = array('error' => $this->upload->display_errors());
                    $response['error'] = $error;
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

            $result = $this->LandModel->updateLand($save, $this->input->post('txtLandID'));

            if($result){
                $response['status'] = 200;
                $response['message'] = 'Land data has been updated!';
            }else{
                $response['status'] = 500;
                $response['message'] = 'Operation failed!';
            }

            echo json_encode($response);


        }
    }


}