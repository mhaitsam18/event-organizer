<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MSponsor extends CI_Model
{
    public function mySponsor($id_event)
    {
        $query = $this->db->select('*')->from('sponsor')->where('id_event', $id_event)->get();
        return $query->result();
    }

    public function add($data)
    {
        return $this->db->insert('sponsor', $data);
    }
}
