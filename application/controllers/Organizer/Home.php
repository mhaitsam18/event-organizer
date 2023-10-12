<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Organizer
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('MEvent');
        $this->load->model('MTicket');
        $this->load->model('MPayment');
        if ($this->session->userdata('level') != '2') {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $top['title'] = "Organizer - Eventku";

        $data = [
            'myEvent' => $this->MEvent->myEventOrganizer($this->session->userdata('id')),
            'ticket' => $this->MTicket->myTicket($this->session->userdata('id')),
            'invoice' => $this->MPayment->penyelenggara($this->session->userdata('id')),
            'revenue' => $this->MPayment->revenue($this->session->userdata('id')),
        ];

        $this->load->view('organizer/layouts/VOTop', $top);
        $this->load->view('organizer/layouts/VONav');
        $this->load->view('organizer/VOHome', $data);
        $this->load->view('organizer/layouts/VOBottom');
    }
}
