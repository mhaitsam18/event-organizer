<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Client
class Event extends CI_Controller
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
        $this->load->model('MSponsor');
    }

    public function index()
    {
        $top['title'] = "Event - Eventku";
        $data['event'] = $this->MEvent->getApp();
        $this->load->view('client/layouts/VCTop', $top);
        $this->load->view('client/layouts/VCNav');
        $this->load->view('client/VCEvent', $data);
        $this->load->view('client/layouts/VCBottom');
    }

    public function detail($token)
    {
        $cek = $this->MEvent->detail($token);
        $pay_tipe = $this->MPayment->get();
        if ($cek) {
            $top['title'] = "Event - Eventku";
            $data['event'] = $cek;
            $data['payment_type'] = $pay_tipe;
            $data['sponsor'] = $this->MSponsor->mySponsor($cek[0]->id);
            $this->load->view('client/layouts/VCTop', $top);
            $this->load->view('client/layouts/VCNav');
            $this->load->view('client/VCDetailEvent', $data);
            $this->load->view('client/layouts/VCBottom');
        } else {
            redirect('');
        }
    }

    public function order()
    {
        if (isset($_POST['submit'])) {
            $amm = $this->MTicket->getByEvent($this->input->post('id_event'));
            $amm = count($amm);
            if ($amm >= $this->input->post('quota')) {
                echo '<script type="text/javascript">alert("Ooops, Tiket sudah habis terjual")</script>';
                redirect($_SERVER['HTTP_REFERER']);
            }
            $attr = array(
                'id_user' => $this->input->post('id_user'),
                'nama_user' => $this->input->post('nama_user'),
                'id_event' => $this->input->post('id_event'),
                'nama_event' => $this->input->post('nama_event'),
                'id_penyelenggara' => $this->input->post('id_penyelenggara'),
                'jumlah' => $this->input->post('jumlah'),
                'total' =>  $this->input->post('harga') * $this->input->post('jumlah'),
                'payment_type' => $this->input->post('payment_type'),
                'token' => random_string('alnum', 10),
                'due_date' => date("Y-m-d H:i:s", strtotime("+2 days", strtotime(date("Y-m-d H:i:s")))),
            );
            if ($this->MPayment->add($attr)) {
                redirect('/invoice/detail/' . $attr['token']);
            } else {
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
