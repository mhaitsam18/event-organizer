<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MTicket extends CI_Model
{
    public function get()
    {
        return $this->db->get('ticket')->result();
    }

    public function myTicket($id_panitia)
    {
        $query = $this->db->select('*')->from('ticket')->where('id_panitia', $id_panitia)->get();
        return $query->result();
    }

    public function userTicket($id_user)
    {
        $query = $this->db->select('*')->from('ticket')->where('id_user', $id_user)->get();
        return $query->result();
    }

    public function getByEvent($id_event)
    {
        $query = $this->db->select('*')->from('ticket')->where('id_event', $id_event)->get();
        return $query->result();
    }

    public function add($data)
    {
        return $this->db->insert('ticket', $data);
    }

    public function detail($token)
    {
        $query = $this->db->select('*')->from('ticket')->where('token', $token)->get();
        return $query->result();
    }
}
