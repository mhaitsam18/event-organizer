<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Organizer
class Ticket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('MEvent');
        $this->load->model('MTicket');
        if ($this->session->userdata('level') != '2') {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $top['title'] = "Ticket - Eventku";

        $data = [
            'ticket' => $this->MTicket->myTicket($this->session->userdata('id')),
            'event' => $this->MEvent->myEventOrganizer($this->session->userdata('id')),
        ];

        $this->load->view('organizer/layouts/VOTop', $top);
        $this->load->view('organizer/layouts/VONav', $data);
        $this->load->view('organizer/VOTicket');
        $this->load->view('organizer/layouts/VOBottom');
    }

    public function detail($id_event)
    {
        $top['title'] = "Ticket - Eventku";
        $data = [
            'ticket' => $this->MTicket->getByEvent($id_event),
        ];
        $this->load->view('organizer/layouts/VOTop', $top);
        $this->load->view('organizer/layouts/VONav', $data);
        $this->load->view('organizer/VODetailTicket');
        $this->load->view('organizer/layouts/VOBottom');
    }
}
