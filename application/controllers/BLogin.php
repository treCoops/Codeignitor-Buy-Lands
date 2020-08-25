<?php


class BLogin extends CI_Controller
{

    public function index(){

        $data['title'] = 'Admin Login | Buy Lands';
        $data['message'] = '';
        $this->load->view('BackEnd/Login/login', $data);
    }

    public function signIn(){

        $username = $this->input->post('txt_username');
        $password = $this->input->post('txt_password');

        $this->load->model('LoginModel');
        $this->load->library('session');

        $dbpassword1 = $this->LoginModel->validateUsername($username);

        if ($dbpassword1) {

            $dbpassword = $dbpassword1[0]->password;

            if($this->is_valid_password($password, $dbpassword)) {

                $user = $this->LoginModel->validateUser($username, $dbpassword);

                if($this->is_blocked($user[0]->block_status)) {

                    if($this->is_deactive($user[0]->active_status)) {
                        $Login_User = array(
                            'ID' => $user[0]->account_id,
                            'Username' => $user[0]->username,
                            'Full_Name' => $user[0]->full_name,
                            'Profile_Pic' => $user[0]->profile_pic,
                            'Active_Status' => $user[0]->active_status,
                            'Blocked_Status' => $user[0]->block_status,
                        );

                        $this->session->set_userdata('User_Session', $Login_User);
                        redirect(base_url('BDashboard'));
                    }else{
                        redirect(base_url('Login/deactive'));
                    }

                }else{
                    redirect(base_url('Login/blocked'));
                }

            } else {
                redirect(base_url('Login/invalid'));
            }
        } else {
            redirect(base_url('Login/invalid'));
        }
    }

    public function notLoggedIn()
    {
        $data['title'] = 'Buy Lands | Admin Login';
        $data['error_message'] = 'You are not logged in.!';
        $this->load->view('BackEnd/Login/login', $data);
    }

    public function blocked()
    {
        $data['title'] = 'Buy Lands | Admin Login';
        $data['error_message'] = 'Your account has been blocked, Please inform administrator.!';
        $this->load->view('BackEnd/Login/login', $data);
    }

    public function deactive()
    {
        $data['title'] = 'Buy Lands | Admin Login';
        $data['error_message'] = 'Your account has been disabled. Please inform administrator.!';
        $this->load->view('BackEnd/Login/login', $data);
    }

    public function invalid()
    {
        $data['title'] = 'Buy Lands | Admin Login';
        $data['error_message'] = 'Invalid username or password.!';
        $this->load->view('BackEnd/Login/login', $data);
    }

    public function logOut()
    {
        $this->session->unset_userdata('User_Session');
        $data['title'] = 'Buy Lands | Admin Login';
        $data['error_message'] = 'Please sign in to continue.!';
        $this->load->view('BackEnd/Login/login', $data);
    }

    function is_valid_password($password, $dbpassword)
    {

        $hash = hash('sha256', $password);

        return $hash == $dbpassword;
    }

    function is_blocked($blocked_status)
    {

        if($blocked_status == 1)
            return false;
        if($blocked_status == 0)
            return true;
    }

    function is_deactive($active_status)
    {

        if($active_status == 1)
            return true;
        if($active_status == 0)
            return false;
    }
}