<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
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
        $top['title'] = "Register - Eventku";
        $this->load->view('dashboard/layouts/VDTop', $top);
        $this->load->view('dashboard/auth/VRegister');
        $this->load->view('dashboard/layouts/VDBottom');
    }

    public function auth()
    {
        if (isset($_POST['submit'])) {
            try {
                $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[30]');
                $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|is_unique[user.username]');
                $this->form_validation->set_message('is_unique', 'Username already exist');
                $this->form_validation->set_message('max_length', 'Your name must be lower than 30 char');
                if ($this->form_validation->run() == TRUE) {
                    $username = $this->input->post('username');
                    $nama = $this->input->post('nama');
                    $level = $this->input->post('level');
                    $password = $this->input->post('password');
                    $password = hash('md5', $password);
                    $attr = array(
                        'username' => $username,
                        'password' => $password,
                        'name' => $nama,
                        'level' => $level
                    );
                    if ($this->MUser->add($attr)) {
                        $this->session->set_flashdata([
                            'type' => 'default',
                            'title' => 'Sukses',
                            'msg' => 'Your account has been created'
                        ]);
                        redirect('login');
                    } else {
                        $this->session->set_flashdata([
                            'type' => 'danger',
                            'title' => 'Error',
                            'msg' => 'Oops, something error'
                        ]);
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                } else {
                    $this->session->set_flashdata([
                        'type' => 'danger',
                        'title' => 'Error',
                        'msg' => validation_errors()
                    ]);
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } catch (Exception $e) {
                $this->session->set_flashdata([
                    'type' => 'danger',
                    'title' => 'Error',
                    'msg' => $e->getMessage()
                ]);
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect('register');
        }
    }
}
