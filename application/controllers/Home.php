<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('string');
        $this->load->model('MEvent');
    }

    public function index()
    {
        $top['title'] = "Eventku";
        $data['event'] = $this->MEvent->get9();
        $this->load->view('client/layouts/VCTop', $top);
        $this->load->view('client/layouts/VCNav', $data);
        $this->load->view('client/VCHome');
        $this->load->view('client/layouts/VCBottom');
    }
}
