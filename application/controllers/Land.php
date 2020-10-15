<?php


class Land extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('LandModel');
        $this->load->model('LocationModel');

    }

    public function index()
    {
        $data['content'] = 'FrontEnd/Pages/landSinglePage';
        $data['title'] = 'Buy Lands | Land';

        $data['land'] = $this->LandModel->getLandDataSingle($this->input->get('lid'));
        $data['provinces'] = $this->LocationModel->getAllProvince();



        $this->load->view('FrontEnd/Template/template', $data);
    }

}