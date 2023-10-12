<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MUser extends CI_Model
{
    public function get()
    {
        $this->db->where('level !=', '1');
        return $this->db->get('user')->result();
    }

    public function add($data)
    {
        return $this->db->insert('user', $data);
    }

    public function update($data, $idu)
    {
        $hasil = $this->db->update('user', $data, 'id=' . $idu);
        return $hasil;
    }

    public function ktp($data, $idu)
    {
        $hasil = $this->db->update('user', $data, 'id=' . $idu);
        return $hasil;
    }

    public function cekuser($username, $password)
    {
        $hasil = $this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
        return $hasil;
    }

    public function cekWithUname($username)
    {
        $hasil = $this->db->query("SELECT * FROM user WHERE email='$username'");
        return $hasil;
    }
}
