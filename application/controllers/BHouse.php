<?php


class BHouse extends CI_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->model('LocationModel');
        $this->load->model('HouseModel');

    }

    public function viewAddHouse(){
        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {
            $data['title'] = 'Admin | Add House';
            $data['content'] = 'BackEnd/House/addHouse';
            $data['province'] = $this->LocationModel->getAllProvince();
            $this->load->view('BackEnd/Template/template', $data);
        }
    }

    public function viewAddFloorPlan(){
        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {
            $data['title'] = 'Admin | Add Floor Plan';
            $data['content'] = 'BackEnd/House/addFloorPlans';
            $data['houses'] = $this->HouseModel->getAvailableHouses();
            $this->load->view('BackEnd/Template/template', $data);
        }
    }

    public function viewManageHouses(){
        $data['title'] = 'Admin | Manage Houses';
        $data['content'] = 'BackEnd/House/manageHouses';
        $data['province'] = $this->LocationModel->getAllProvince();
        $this->load->view('BackEnd/Template/template', $data);
    }

    public function viewManageFloorPlans(){
        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {
            $data['title'] = 'Admin | Manage Floor Plans';
            $data['content'] = 'BackEnd/House/manageFloorPlans';
            $data['houses'] = $this->HouseModel->getAvailableHouses();
            $this->load->view('BackEnd/Template/template', $data);
        }
    }

    public function updateHouseFloorPlan(){
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
            $count = count($_FILES['txtImages']['name']);

            $response['count'] = $count;

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

                        $img['property_master_id'] = $this->input->post('txtPlanID');
                        $img['img_url'] = $filename;
                        $img['img_status'] = 1;

                        $this->HouseModel->savePlanImages($img);

                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $response['error'] = $error;
                        $response['status'] = 500;
                    }
                }
            }

            $result = $this->HouseModel->updatePlan($this->input->post('txtPlanID'), $this->input->post('cmbHouseUpdate'), $this->input->post('txtPlanDescription'));

            if($result == 0){
                $response['status'] = 500;
                $response['message'] = 'Operation failed!';
            }else{
                $response['status'] = 200;
                $response['message'] = 'Floor plan has been updated!';
            }

            echo json_encode($response);

        }
    }

    public function cRemoveImages(){
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
                    $result = $this->HouseModel->removeImages($images[$a]);

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

    public function addHouseFloorPlan(){

        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

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

        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

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

        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {
            $response = array();
            $data = $this->LocationModel->getRelatedDistrict($this->input->post('ID'));

            if ($data != null) {
                $response['data'] = $data;
                $response['status'] = '200';
            } else {
                $response['message'] = 'No data available.!';
                $response['status'] = '400';
            }

            echo json_encode($response);
        }
    }

    public function cDeleteHouseFloorPlan(){

        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {
            $response = array();
            $result = true;

            $images = $this->HouseModel->getRelatedFloorPlanImages($this->input->post('ID'));

            foreach ($images as $val){
                if (file_exists('assets/images/admin/uploads/'.$val->img_url)){
                    unlink('assets/images/admin/uploads/'.$val->img_url);
                }
            }

            $flag = $this->HouseModel->deleteHouseFloorPlan($this->input->post('ID'));

            if ($flag == 0) {
                $result = false;
            }

            $response['result'] = $result;

            echo json_encode($response);
        }
    }

    public function cGetHouseFloorPlan(){
        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {
            $response = array();

            $result = $this->HouseModel->getHouseFloorPlan($this->input->post('ID'));
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


    public function cGetHousePlansForTable(){

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
            $param['id'] = $this->input->get('ID');

            echo json_encode($this->HouseModel->getHousePlansForTable($param));
        }
    }

    public function cGetHousesTable(){

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

            echo json_encode($this->HouseModel->getHousesForTable($param));
        }
    }


    public function cDeleteHouse(){
        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {

            $response = array();
            $result = true;

            $images = $this->HouseModel->getRelatedHouseImages($this->input->post('ID'));


            foreach ($images as $val){
                if (file_exists('assets/images/admin/uploads/'.$val->img_url)){
                    unlink('assets/images/admin/uploads/'.$val->img_url);
                }
            }

            $flag = $this->HouseModel->deleteHouse($this->input->post('ID'));

            if ($flag == 0) {
                $result = false;
            }

            $response['result'] = $result;

            echo json_encode($response);
        }
    }

    public function cGetHouse(){
        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {
            $response = array();

            $result = $this->HouseModel->getHouse($this->input->post('ID'));
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

    public function cRemoveHouseImages(){
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
                    $result = $this->HouseModel->removeHouseImages($images[$a]);

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

    public function cUpdateHouse(){

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

                        $img['property_master_id'] = $this->input->post('txtHouseID');
                        $img['img_url'] = $filename;
                        $img['img_status'] = 1;

                        $this->HouseModel->saveImages($img);

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

            $result = $this->HouseModel->updateHouse($save, $this->input->post('txtHouseID'));

            if($result){
                $response['status'] = 200;
                $response['message'] = 'House data has been updated!';
            }else{
                $response['status'] = 500;
                $response['message'] = 'Operation failed!';
            }

            echo json_encode($response);

        }

    }

}