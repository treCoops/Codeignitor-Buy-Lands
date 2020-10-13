<?php


class BProfile extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->model('ProfileModel');

    }

    function viewManageProfile(){
        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {
            $data['title'] = 'Admin | Manage Profile';
            $data['content'] = 'BackEnd/Profile/manageProfile';
            $this->load->view('BackEnd/Template/template', $data);
        }
    }

    function updateProfile(){

        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {

            $rand_name = uniqid() . "_" . session_id() . "_" . time();

            $config["upload_path"] = "./assets/images/profile/";
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size'] = 5000;
            $config['max_width'] = 2500;
            $config['max_height'] = 2500;
            $config['file_name'] = $rand_name;

            $this->load->library('upload', $config);

            $response = array();
            $save = array();

            if (!empty($_FILES['txtImages']['name'])) {
                $_FILES['file']['name'] = $_FILES['txtImages']['name'];
                $_FILES['file']['type'] = $_FILES['txtImages']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['txtImages']['tmp_name'];
                $_FILES['file']['error'] = $_FILES['txtImages']['error'];
                $_FILES['file']['size'] = $_FILES['txtImages']['size'];


                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $save['profile_pic'] = $filename;

                    if($this->input->post('txtCurrentImage') != 'placeholder.png') {
                        if (file_exists('assets/images/profile/' . $this->input->post('txtCurrentImage'))) {
                            unlink('assets/images/profile/' . $this->input->post('txtCurrentImage'));
                        }
                    }

                }else{
                    $error = array('error' => $this->upload->display_errors());
                    $response['error'] = $error;
                }
            }

            $save['username'] = $this->input->post('txtUsername');
            $save['full_name'] = $this->input->post('txtFullName');

            $result = $this->ProfileModel->updateMe($this->input->post('txtUserId'), $save);

            if($result){
                $response['status'] = 200;
                $response['message'] = 'Profile data has updated.';
            }else{
                $response['status'] = 500;
                $response['message'] = 'Operation error.';
            }

            echo json_encode($response);

        }

    }

    function updatePassword(){

        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {

            if($this->ProfileModel->checkCurrent($this->convertToHash($this->input->post('txtOldPassword')), $this->input->post('txtUserId'))){

                $result = $this->ProfileModel->updatePass($this->convertToHash($this->input->post('txtConfirmPassword')), $this->input->post('txtUserId'));

                if($result){
                    $response['status'] = 200;
                    $response['message'] = 'Password updated.';
                }else{
                    $response['status'] = 500;
                    $response['message'] = 'Internal server error.';
                }
            }else{
                $response['status'] = 500;
                $response['message'] = 'Please check your current password.';
            }


            echo json_encode($response);


        }
    }

    function convertToHash($password){
        return(hash('sha256', $password));
    }




}