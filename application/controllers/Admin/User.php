<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Admin
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('MUser');
        if ($this->session->userdata('level') != '1') {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $top['title'] = "Administrator - Eventku";
        $data['users'] = $this->MUser->get();
        $this->load->view('admin/layouts/VATop', $top);
        $this->load->view('admin/layouts/VANav');
        $this->load->view('admin/VAUser', $data);
        $this->load->view('admin/layouts/VABottom');
    }
}
