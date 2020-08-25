<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
	    $data['content'] = 'FrontEnd/Pages/index';
	    $data['title'] = 'Buy Lands | Home';
		$this->load->view('FrontEnd/Template/template', $data);
	}
}
