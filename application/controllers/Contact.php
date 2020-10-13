<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function index()
    {
        $data['content'] = 'FrontEnd/Pages/contact';
        $data['title'] = 'Buy Lands | Contact Us';
        $this->load->view('FrontEnd/Template/template', $data);
    }
}