<?php
defined('BASEPATH') or exit('No direct script access allowed');

//User
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('MEvent');
        $this->load->model('MOrganizer');
        $this->load->model('MUser');
        $this->load->model('MPayment');
        $this->load->model('MTicket');
        if ($this->session->userdata('level') != '3') {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $top['title'] = "Dashboard - Eventku";
        $data = [
            'myEvent' => $this->MPayment->myInvoice($this->session->userdata('id')),
            'ticket' => $this->MTicket->userTicket($this->session->userdata('id')),
        ];
        $this->load->view('dashboard/layouts/VDTop', $top);
        $this->load->view('dashboard/layouts/VDNav');
        $this->load->view('dashboard/VDHome', $data);
        $this->load->view('dashboard/layouts/VDBottom');
    }
}
