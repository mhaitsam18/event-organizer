<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
        $this->load->model('MUser');
        if ($this->session->userdata('auth') == true) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $top['title'] = "Login - Eventku";
        $this->load->view('dashboard/layouts/VDTop', $top);
        $this->load->view('dashboard/auth/VLogin');
        $this->load->view('dashboard/layouts/VDBottom');
    }

    public function auth()
    {
        if (isset($_POST['submit'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $password = hash('md5', $password);
            $cek = $this->MUser->cekuser($username, $password);
            if ($cek->num_rows() > 0) {
                $data = $cek->row_array();
                $this->session->set_userdata([
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'level' => $data['level'],
                    'phone' => $data['phone'],
                    'ktp' => $data['ktp'],
                    'foto_ktp' => $data['foto_ktp'],
                    'auth' => true
                ]);
                if ($data['level'] == '1') {
                    redirect('admin');
                } else if ($data['level'] == '2') {
                    redirect('organizer');
                } else if ($data['level'] == '3') {
                    redirect('');
                } else {
                    $this->session->sess_destroy();
                    redirect('');
                }
            } else {
                $this->session->set_flashdata([
                    'type' => 'danger',
                    'title' => 'Error',
                    'msg' => 'Ooops, user not found'
                ]);
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect('login');
        }
    }
}
