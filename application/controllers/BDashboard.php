<?php


class BDashboard extends CI_Controller
{


    function __construct() {
        parent::__construct();

        $this->load->model('LandModel');
        $this->load->model('HouseModel');
        $this->load->model('MessageModel');

    }

    public function index()
    {
        $data['title'] = 'Buy Lands | Dashboard';
        $data['content'] = 'BackEnd/Home/dashboard';
        $data['houseCount'] = $this->HouseModel->getCountOfHouse();
        $data['landCount'] = $this->LandModel->getCountOfLand();
        $data['messageCount'] = $this->MessageModel->getCountOfMessage();
        $this->load->view('BackEnd/Template/template', $data);
    }
}