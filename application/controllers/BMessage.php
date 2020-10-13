<?php


class BMessage extends CI_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->model('MessageModel');

    }

    public function viewMessage(){
        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {
            $data['title'] = 'Admin | Manage Messages';
            $data['content'] = 'BackEnd/Message/manageMessages';
            $this->load->view('BackEnd/Template/template', $data);
        }
    }

    function sendMessage()
    {
        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        } else {

            $response = array();
            $message = array();

            if ($this->MessageModel->is_message_exist($this->input->post('txtName'), $this->input->post('txtEmail'), $this->input->post('txtPhone'), $this->input->post('txtSubject'), $this->input->post('txtDescription'))) {

                $message['sender_name'] = $this->input->post('txtName');
                $message['sender_email'] = $this->input->post('txtEmail');
                $message['sender_phone'] = $this->input->post('txtPhone');
                $message['sender_message_subject'] = $this->input->post('txtSubject');
                $message['sender_message'] = $this->input->post('txtDescription');
                $message['message_status'] = 'NEW';

                $result = $this->MessageModel->saveMessage($message);

                if ($result){
                    $response['status'] = 200;
                    $response['message'] = 'Message sent successfully.';
                }else{
                    $response['status'] = 500;
                    $response['message'] = 'Operation filed, Please try again later.';
                }

            }else{
                $response['status'] = 200;
                $response['message'] = 'This message already sent to us.';
            }

            echo json_encode($response);

        }
    }

    function cGetMessagesForTable(){
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

            echo json_encode($this->MessageModel->getMessagesForTable($param));
        }
    }

    function cDeleteMessage(){
        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {
            $response = array();
            $result = true;

            $flag = $this->MessageModel->deleteMessage($this->input->post('ID'));

            if ($flag == 0) {
                $result = false;
            }

            $response['result'] = $result;

            echo json_encode($response);
        }
    }

    function cGetMessage(){
        header("Content-type:application/json");

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','2048M');

        $User_Session = $this->session->userdata('User_Session');

        if ($User_Session == null) {
            redirect(base_url('BLogin/notLoggedIn'));
        }else {

            $response = array();

            $result = $this->MessageModel->viewMessage($this->input->post('ID'));

            if($result != null){
                $response['data'] = $result;
                $response['status'] = 200;
            }else{
                $response['message'] = 'Internal server error';
                $response['status'] = 500;
            }

            echo json_encode($response);

        }


    }

}