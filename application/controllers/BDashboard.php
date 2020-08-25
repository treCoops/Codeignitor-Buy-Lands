<?php


class BDashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Buy Lands | Dashboard';
        $data['content'] = 'BackEnd/Home/dashboard';
        $this->load->view('BackEnd/Template/template', $data);
    }
}