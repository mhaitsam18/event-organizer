<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MOrganizer extends CI_Model
{
    public function get()
    {
        return $this->db->get('organizer')->result();
    }

    public function detail($id)
    {
        $query = $this->db->select('*')->from('organizer')->where('id', $id)->get();
        return $query->result();
    }

    public function cekUser($idu)
    {
        $this->db->where('id_user',$idu);
        return $this->db->get('organizer')->result();
    }

    public function add($data)
    {
        return $this->db->insert('organizer', $data);
    }

    public function update($data, $idu)
    {
        $hasil = $this->db->update('organizer', $data, 'id_user=' . $idu);
        return $hasil;
    }
}