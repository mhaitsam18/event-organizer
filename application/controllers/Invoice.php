<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Client
class Invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('string');
        $this->load->model('MEvent');
        $this->load->model('MPayment');
        $this->load->model('MTicket');
        $this->load->model('MOrganizer');
    }

    public function detail($token)
    {
        $cek = $this->MPayment->detail($token);
        if ($cek) {
            $top['title'] = "Invoice - Eventku";
            $data['data'] = $cek;
            $data['pt'] = $this->MPayment->type($cek[0]->payment_type);
            $this->load->view('client/layouts/VCTop', $top);
            $this->load->view('client/layouts/VCNav');
            $this->load->view('client/VCInvoice', $data);
            $this->load->view('client/layouts/VCBottom');
        } else {
            redirect('');
        }
    }

    public function upload($token)
    {
        $cek = $this->MPayment->detail($token);
        if ($cek) {
            $top['title'] = "Upload bukti bayar - Eventku";
            $data['data'] = $cek;
            $this->load->view('client/layouts/VCTop', $top);
            $this->load->view('client/layouts/VCNav');
            $this->load->view('client/VCUpload', $data);
            $this->load->view('client/layouts/VCBottom');
        } else {
            redirect('');
        }
    }

    public function doupload($token)
    {
        if (isset($_POST['submit'])) {
            $cek = $this->MPayment->detail($token);

            if (strtotime("now") > strtotime($cek[0]->due_date)) {
                $this->session->set_flashdata([
                    'type' => 'danger',
                    'title' => 'Error!',
                    'msg' => 'Ooops, kamu sudah melebihi batas pembayaran'
                ]);
                redirect($_SERVER['HTTP_REFERER']);
            }

            $config['upload_path']  = 'assets/images/invoice';
            $config['allowed_types']  = 'jpg|png';
            $config['encrypt_name'] = TRUE;
            $config['max_size']      = 1024;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('picture')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/profil/' . $gbr['file_name'];
                $config['create_thumb'] = TRUE;

                $this->load->library('image_lib', $config);
                $picture = $gbr['file_name'];

                $data = [
                    'file' => $picture,
                    'status' => 2
                ];
                if ($this->MPayment->bukti($data, $cek[0]->id)) {
                    redirect('/invoice/detail/' . $token);
                }
            } else {
                echo '<script type="text/javascript">alert("Ooops, Something Error")</script>';
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
