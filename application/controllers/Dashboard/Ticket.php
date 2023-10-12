<?php
defined('BASEPATH') or exit('No direct script access allowed');

//User
class Ticket extends CI_Controller
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
        $this->load->library('pdf');
        if ($this->session->userdata('level') != '3') {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $top['title'] = "Ticket - Eventku";
        $data = [
            'ticket' => $this->MTicket->userTicket($this->session->userdata('id')),
        ];
        $this->load->view('dashboard/layouts/VDTop', $top);
        $this->load->view('dashboard/layouts/VDNav');
        $this->load->view('dashboard/VDTicket', $data);
        $this->load->view('dashboard/layouts/VDBottom');
    }

    public function print($token)
    {
        $cek = $this->MTicket->detail($token);
        if ($cek) {
            $pdf = new FPDF('p', 'mm', 'A4');
            $pdf->addPage();
            $pdf->Cell(200, 10, '', 0, 1, 'C');
            $pdf->setFont('Arial', '', 11);
            $pdf->Cell(200, 5, '=========================', 0, 1, 'C');
            $pdf->setFont('Arial', 'B', 14);
            $pdf->Cell(200, 10, 'Ticket - Eventku', 0, 1, 'C');
            $pdf->setFont('Arial', '', 11);
            $pdf->Cell(200, 5, '=========================', 0, 1, 'C');
            $pdf->Cell(200, 20, '', 0, 1, 'L');
            $pdf->setFont('Arial', '', 12);
            $pdf->Cell(200, 10, 'Ticket ID : ' . $cek[0]->token, 0, 1, 'L');
            $pdf->Cell(200, 10, 'Nama Pemesan : ' . $cek[0]->nama_pemesan, 0, 1, 'L');
            $pdf->Cell(200, 10, 'Event Name : ' . $cek[0]->event_name, 0, 1, 'L');
            $pdf->Cell(200, 10, 'Date : ' . $cek[0]->event_date, 0, 1, 'L');
            $pdf->Cell(200, 10, 'Venue : ' . $cek[0]->event_venue, 0, 1, 'L');
            $pdf->Cell(200, 10, '', 0, 1, 'L');
            $pdf->setFont('Arial', '', 10);
            $pdf->Cell(100, 10, 'Tiket ini merupakan bukti pembayaran yang sah.', 0, 1, 'L');
            $pdf->setFont('Arial', 'B', 10);
            $pdf->Cell(100, 10, 'Tim Eventku', 0, 1, 'L');
            $pdf->Output();
        } else {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
