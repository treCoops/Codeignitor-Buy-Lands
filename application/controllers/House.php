<?php


class House extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('HouseModel');
        $this->load->model('LocationModel');

    }

    public function index()
    {
        $data['content'] = 'FrontEnd/Pages/houseSinglePage';
        $data['title'] = 'Buy Lands | House';

        $data['house'] = $this->HouseModel->getHouseDataSingle($this->input->get('hid'));
        $data['provinces'] = $this->LocationModel->getAllProvince();

//        var_dump($data); die;


        $this->load->view('FrontEnd/Template/template', $data);
    }
}