<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('LocationModel');
        $this->load->model('HouseModel');
        $this->load->model('LandModel');

    }

	public function index()
	{
	    $data['content'] = 'FrontEnd/Pages/index';
	    $data['title'] = 'Buy Lands | Home';
	    $data['provinces'] = $this->LocationModel->getAllProvince();
	    $data['houses'] = $this->HouseModel->getAllHouses();
	    $data['lands'] = $this->LandModel->getAllLands();

		$this->load->view('FrontEnd/Template/template', $data);
	}
}
