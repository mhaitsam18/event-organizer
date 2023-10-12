<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Admin
class Invoice extends CI_Controller
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
        if ($this->session->userdata('level') != '1') {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $top['title'] = "Administrator - Eventku";

        $data = [
            'invoice' => $this->MPayment->getAll()
        ];

        $this->load->view('admin/layouts/VATop', $top);
        $this->load->view('admin/layouts/VANav');
        $this->load->view('admin/VAInvoice', $data);
        $this->load->view('admin/layouts/VABottom');
    }
}
