<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Admin
class Organizer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('MOrganizer');
        if ($this->session->userdata('level') != '1') {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $top['title'] = "Administrator - Eventku";
        $data['organizer'] = $this->MOrganizer->get();
        $this->load->view('admin/layouts/VATop', $top);
        $this->load->view('admin/layouts/VANav');
        $this->load->view('admin/VAOrganizer', $data);
        $this->load->view('admin/layouts/VABottom');
    }

    public function detail($id)
    {
        $top['title'] = "Detail Organizer - Eventku";
        $cek = $this->MOrganizer->detail($id);
        if ($cek) {
            $data['org'] = $cek;
            $this->load->view('admin/layouts/VATop', $top);
            $this->load->view('admin/layouts/VANav');
            $this->load->view('admin/VADetailOrganizer', $data);
            $this->load->view('admin/layouts/VABottom');
        } else {
            $this->session->set_flashdata([
                'type' => 'danger',
                'title' => 'Error!',
                'msg' => 'Oops organizer not found'
            ]);
            redirect('admin');
        }
    }
}
