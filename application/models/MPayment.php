<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MPayment extends CI_Model
{
    public function get()
    {
        return $this->db->get('payment_type')->result();
    }

    public function getAll()
    {
        return $this->db->get('invoice')->result();
    }

    public function type($type)
    {
        $query = $this->db->select('*')->from('payment_type')->where('id', $type)->get();
        return $query->result();
    }

    public function add($data)
    {
        return $this->db->insert('invoice', $data);
    }

    public function detail($token)
    {
        $query = $this->db->select('*')->from('invoice')->where('token', $token)->get();
        return $query->result();
    }

    public function bukti($data, $id)
    {
        $hasil = $this->db->update('invoice', $data, 'id=' . $id);
        return $hasil;
    }

    public function myInvoice($idu)
    {
        $query = $this->db->select('*')->from('invoice')->where('id_user', $idu)->get();
        return $query->result();
    }

    public function penyelenggara($idu)
    {
        $query = $this->db->select('*')->from('invoice')->where('id_penyelenggara', $idu)->get();
        return $query->result();
    }

    public function getByEvent($id_event)
    {
        $query = $this->db->select('*')->from('invoice')->where('id_event', $id_event)->get();
        return $query->result();
    }

    public function revenue($idu)
    {
        $this->db->where('id_penyelenggara', $idu);
        $this->db->where('status', 3);
        $this->db->select_sum('total');
        return $this->db->get('invoice')->result();
    }

    public function verif($data, $id)
    {
        $hasil = $this->db->update('invoice', $data, 'id=' . $id);
        return $hasil;
    }

    public function deleteTicket($token_invoice)
    {
        $this->db->where('token_invoice', $token_invoice);
        return $this->db->delete('ticket');
    }
}
