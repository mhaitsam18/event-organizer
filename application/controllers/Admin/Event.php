<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Admin
class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('MEvent');
        $this->load->model('MSponsor');
        if ($this->session->userdata('level') != '1') {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $top['title'] = "Administrator - Eventku";
        $data['event'] = $this->MEvent->get();
        $this->load->view('admin/layouts/VATop', $top);
        $this->load->view('admin/layouts/VANav');
        $this->load->view('admin/VAEvent', $data);
        $this->load->view('admin/layouts/VABottom');
    }

    public function detail($token)
    {
        $top['title'] = "Detail Event - Eventku";
        $cek = $this->MEvent->detail($token);
        if ($cek) {
            $data['event'] = $cek;
            $data['sponsor'] = $this->MSponsor->mySponsor($cek[0]->id);
            $this->load->view('admin/layouts/VATop', $top);
            $this->load->view('admin/layouts/VANav');
            $this->load->view('admin/VADetailEvent', $data);
            $this->load->view('admin/layouts/VABottom');
        } else {
            $this->session->set_flashdata([
                'type' => 'danger',
                'title' => 'Error!',
                'msg' => 'Oops event not found'
            ]);
            redirect('admin');
        }
    }

    public function acc($ide)
    {
        $this->MEvent->acc($ide);
        $this->session->set_flashdata([
            'type' => 'default',
            'title' => 'Success',
            'msg' => 'Event has been accepted'
        ]);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function reject($ide)
    {
        $data = [
            'status' => '3',
            'alasan_reject' => $this->input->post('alasan')
        ];
        $uji = $this->MEvent->reject($ide, $data);
        if($uji){
            $this->session->set_flashdata([
                'type' => 'default',
                'title' => 'Success',
                'msg' => 'Event has been rejected'
            ]);
        }else{
            $this->session->set_flashdata([
                'type' => 'danger',
                'title' => 'Danger',
                'msg' => 'Error'
            ]);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}
