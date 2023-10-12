<?php
defined('BASEPATH') or exit('No direct script access allowed');

//User
class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation', 'email'));
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
        $top['title'] = "Profile - Eventku";
        $this->load->view('dashboard/layouts/VDTop', $top);
        $this->load->view('dashboard/layouts/VDNav');
        $this->load->view('dashboard/VDProfile');
        $this->load->view('dashboard/layouts/VDBottom');
    }

    public function updateBio()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|min_length[6]|max_length[12]');
            $this->form_validation->set_message('number', 'Data must be a number');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'phone' => $this->input->post('phone'),
                );
                if ($this->MUser->update($data, $this->session->userdata('id'))) {
                    $this->session->set_userdata([
                        'phone' => $data['phone'],
                    ]);
                    $this->session->set_flashdata([
                        'type' => 'default',
                        'title' => 'Success',
                        'msg' => 'Profile updated'
                    ]);
                    redirect($_SERVER['HTTP_REFERER']);
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
        } else {
            redirect('dashboard');
        }
    }
}
