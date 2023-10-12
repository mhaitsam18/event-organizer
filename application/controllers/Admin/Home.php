<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Admin
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('MEvent');
        $this->load->model('MOrganizer');
        $this->load->model('MUser');
        $this->load->model('MTicket');
        if ($this->session->userdata('level') != '1') {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $top['title'] = "Administrator - Eventku";

        $data = [
            'event' => $this->MEvent->get(),
            'organizer' => $this->MOrganizer->get(),
            'user' => $this->MUser->get(),
            'ticket' => $this->MTicket->get()
        ];

        $this->load->view('admin/layouts/VATop', $top);
        $this->load->view('admin/layouts/VANav');
        $this->load->view('admin/VAHome', $data);
        $this->load->view('admin/layouts/VABottom');
    }
}
