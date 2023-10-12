<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MEvent extends CI_Model
{
    public function get()
    {
        return $this->db->get('event')->result();
    }

    public function getApp()
    {
        $this->db->where('status', 2);
        $this->db->order_by('due_date', 'ASC');
        return $this->db->get('event')->result();
    }

    public function get9()
    {
        $this->db->where('status', 2);
        $this->db->order_by('due_date', 'ASC');
        return $this->db->get('event', 9)->result();
    }

    public function myEventOrganizer($idu)
    {
        $query = $this->db->select('event.*,count(invoice.id) AS tikets, sum(invoice.total) AS revenue')->from('event')->join('invoice', 'invoice.id_event = event.id')->where('event.id_user', $idu)->group_by('event.id')->get();
        return $query->result();
    }

    public function detail($token)
    {
        $query = $this->db->select('*')->from('event')->where('token', $token)->get();
        return $query->result();
    }

    public function detailId($id)
    {
        $query = $this->db->select('*')->from('event')->where('id', $id)->get();
        return $query->result();
    }

    public function add($data)
    {
        return $this->db->insert('event', $data);
    }

    public function update($data, $id)
    {
        $hasil = $this->db->update('event', $data, 'id=' . $id);
        return $hasil;
    }

    public function delete($ide)
    {
        $this->db->where('id', $ide);
        return $this->db->delete('event');
    }

    public function acc($ide)
    {
        $this->db->set('status', 2);
        $this->db->where('id', $ide);
        $this->db->update('event');
    }

    public function reject($ide, $data)
    {
        $hasil = $this->db->update('event', $data, 'id=' . $ide);
        return $hasil;
    }
}
