<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Organizer
class Invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('MEvent');
        $this->load->model('MTicket');
        $this->load->model('MPayment');
        $this->load->database();
        $this->load->helper('string');
        $this->load->library('pdf');
        if ($this->session->userdata('level') != '2') {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $top['title'] = "Organizer - Eventku";

        $data = [
            'invoice' => $this->MPayment->penyelenggara($this->session->userdata('id')),
            'event' => $this->MEvent->myEventOrganizer($this->session->userdata('id')),
        ];

        $this->load->view('organizer/layouts/VOTop', $top);
        $this->load->view('organizer/layouts/VONav');
        $this->load->view('organizer/VOInvoice', $data);
        $this->load->view('organizer/layouts/VOBottom');
    }

    public function detail($id_event)
    {
        $top['title'] = "Invoice - Eventku";
        $data = [
            'invoice' => $this->MPayment->getByEvent($id_event),
            'id_event' => $id_event,
        ];
        $this->load->view('organizer/layouts/VOTop', $top);
        $this->load->view('organizer/layouts/VONav', $data);
        $this->load->view('organizer/VODetailInvoice');
        $this->load->view('organizer/layouts/VOBottom');
    }

    public function verif($token)
    {
        $cek = $this->MPayment->detail($token);
        $event = $this->MEvent->detailId($cek[0]->id_event);

        $data = [
            'status' => 3,
        ];

        $this->MPayment->verif($data, $cek[0]->id);

        for ($x = 0; $x < $cek[0]->jumlah; $x++) {
            $data = [
                'id_panitia' => $cek[0]->id_penyelenggara,
                'id_event' => $cek[0]->id_event,
                'id_user' => $cek[0]->id_user,
                'token_invoice' => $token,
                'nama_pemesan' => $cek[0]->nama_user,
                'token' => random_string('alnum', 5),
                'event_name' => $event[0]->name,
                'event_date' => $event[0]->due_date,
                'event_venue' => $event[0]->venue,
            ];
            $this->MTicket->add($data);
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function cekrefund($token)
    {
        $cek = $this->MPayment->detail($token);
        if ($cek) {
            $top['title'] = "Invoice - Eventku";
            $data = [
                'cek' => $cek
            ];
            $this->load->view('organizer/layouts/VOTop', $top);
            $this->load->view('organizer/layouts/VONav');
            $this->load->view('organizer/VOCekRefund', $data);
            $this->load->view('organizer/layouts/VOBottom');
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
                    'status' => $this->input->post('terima'),
                    'alasan_terima_tolak' => $this->input->post('alasan')
                ];
                $this->MPayment->bukti($data, $cek[0]->id);

                if ($data['status'] == '5') {
                    $this->MPayment->deleteTicket($token);
                }

                $this->session->set_flashdata([
                    'type' => 'default',
                    'title' => 'Success',
                    'msg' => 'Refund berhasil diajukan'
                ]);
                redirect('/organizer/invoice/');
            } else {
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function report($id_event)
    {
        $invoice = $this->MPayment->getByEvent($id_event);
        $event = $this->MEvent->detailId($id_event);
        $pdf = new FPDF('l', 'mm', 'A4');
        $pdf->addPage();
        $pdf->Cell(280, 10, '', 0, 1, 'C');
        $pdf->setFont('Arial', 'B', 14);
        $pdf->Cell(280, 20, 'Laporan Keuangan', 0, 1, 'C');
        $pdf->Cell(280, 10, '', 0, 1, 'C');
        $pdf->setFont('Arial', '', 13);
        $pdf->Cell(280, -7, 'Nama Event : ' . $event[0]->name, 0, 1, 'L');
        $pdf->Cell(280, 20, 'Tanggal : ' . date('d F Y, H:i:s'), 0, 1, 'L');
        #Header
        $pdf->setFont('Arial', 'B', 13);
        $pdf->Cell(75, 6, 'Nama User', 1, 0, 'C');
        $pdf->Cell(75, 6, 'Nama Event', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Jumlah', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Harga', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Status', 1, 1, 'C');
        $pdf->setFont('Arial', '', 12);
        foreach ($invoice as $i) {
            $pdf->Cell(75, 6, $i->nama_user, 1, 0, 'C');
            $pdf->Cell(75, 6, $i->nama_event, 1, 0, 'C');
            $pdf->Cell(35, 6, $i->jumlah, 1, 0, 'C');
            $pdf->Cell(40, 6, 'Rp ' . number_format($i->total), 1, 0, 'C');
            if ($i->status == '1') {
                $pdf->Cell(50, 6, 'Belum Dibayar', 1, 1, 'C');
            } elseif ($i->status == '2') {
                $pdf->Cell(50, 6, 'Menunggu Persetujuan', 1, 1, 'C');
            } elseif ($i->status == '3') {
                $pdf->Cell(50, 6, 'Lunas', 1, 1, 'C');
            } elseif ($i->status == '4') {
                $pdf->Cell(50, 6, 'Dibatalkan', 1, 1, 'C');
            } elseif ($i->status == '5') {
                $pdf->Cell(50, 6, 'Refund', 1, 1, 'C');
            } elseif ($i->status == '6') {
                $pdf->Cell(50, 6, 'Proses Refund', 1, 1, 'C');
            }
        }
        $pdf->Output();
    }
}
