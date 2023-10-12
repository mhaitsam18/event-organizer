<?php
defined('BASEPATH') or exit('No direct script access allowed');

//User
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
        if ($this->session->userdata('level') != '3') {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $top['title'] = "Invoice - Eventku";
        $data = [
            'myEvent' => $this->MPayment->myInvoice($this->session->userdata('id')),
        ];
        $this->load->view('dashboard/layouts/VDTop', $top);
        $this->load->view('dashboard/layouts/VDNav');
        $this->load->view('dashboard/VDInvoice', $data);
        $this->load->view('dashboard/layouts/VDBottom');
    }

    public function refund($token)
    {
        $cek = $this->MPayment->detail($token);
        if ($cek) {
            $top['title'] = "Invoice - Eventku";
            $data = [
                'cek' => $cek
            ];
            $this->load->view('dashboard/layouts/VDTop', $top);
            $this->load->view('dashboard/layouts/VDNav');
            $this->load->view('dashboard/VDRefund', $data);
            $this->load->view('dashboard/layouts/VDBottom');
        } else {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function dorefund($token)
    {
        if (isset($_POST['submit'])) {
            $cek = $this->MPayment->detail($token);
            if ($cek) {
                $data = [
                    'status' => 6,
                    'alasan_refund' => $this->input->post('alasan'),
                    'bank_refund'=> $this->input->post('bank'),
                    'norek_refund' => $this->input->post('norek')
                ];
                $this->MPayment->bukti($data, $cek[0]->id);
                $this->session->set_flashdata([
                    'type' => 'default',
                    'title' => 'Success',
                    'msg' => 'Refund berhasil diajukan'
                ]);
                redirect('/dashboard/invoice/');
            } else {
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
