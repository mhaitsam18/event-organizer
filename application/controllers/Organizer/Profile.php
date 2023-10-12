<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Organizer
class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
        $this->load->model('MUser');
        $this->load->model('MOrganizer');
        if ($this->session->userdata('level') != '2') {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $top['title'] = "Organizer Profile - Eventku";
        $data['org'] = $this->MOrganizer->cekUser($this->session->userdata('id'));
        // var_dump($data['org']);

        $this->load->view('organizer/layouts/VOTop', $top);
        $this->load->view('organizer/layouts/VONav');
        $this->load->view('organizer/VOProfile', $data);
        $this->load->view('organizer/layouts/VOBottom');
    }

    public function update()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('detail', 'detail organisasi', 'required');
            $this->form_validation->set_rules('address', 'address', 'required|max_length[100]');
            $this->form_validation->set_rules('phone', 'phone', 'required|numeric|min_length[6]|max_length[12]');
            if ($this->form_validation->run() == TRUE) {
                $cek = $this->MOrganizer->cekUser($this->session->userdata('id'));
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'detail' => $this->input->post('detail'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                ];
                if (count($cek)>0) {
                    if ($this->MOrganizer->update($data, $this->session->userdata('id'))) {
                        $this->session->set_flashdata([
                            'type' => 'default',
                            'title' => 'Success',
                            'msg' => 'Your profile has been updated'
                        ]);
                        redirect('organizer/profile');
                    } else {
                        $this->session->set_flashdata([
                            'type' => 'danger',
                            'title' => 'Error!',
                            'msg' => 'Ooops, something error'
                        ]);
                        redirect('organizer/profile');
                    }
                } else {
                    $data['id_user'] = $this->session->userdata('id');
                    if ($this->MOrganizer->add($data)) {
                        $this->session->set_flashdata([
                            'type' => 'default',
                            'title' => 'Success',
                            'msg' => 'Your profile has been updated'
                        ]);
                        redirect('organizer/profile');
                    } else {
                        $this->session->set_flashdata([
                            'type' => 'danger',
                            'title' => 'Error!',
                            'msg' => 'Ooops, something error'
                        ]);
                        redirect('organizer/profile');
                    }
                }
            } else {
                $this->session->set_flashdata([
                    'type' => 'danger',
                    'title' => 'Error',
                    'msg' => validation_errors()
                ]);
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect('organizer');
        }
    }

    public function updateBio()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|min_length[6]|max_length[12]');
            $this->form_validation->set_rules('ktp', 'KTP', 'required|numeric|min_length[16]|max_length[16]');
            $this->form_validation->set_message('number', 'Data must be a number');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'phone' => $this->input->post('phone'),
                    'ktp' => $this->input->post('ktp')
                );
                if ($this->MUser->update($data, $this->session->userdata('id'))) {
                    $this->session->set_userdata([
                        'phone' => $data['phone'],
                        'ktp' => $data['ktp']
                    ]);
                    $this->session->set_flashdata([
                        'type' => 'default',
                        'title' => 'Success',
                        'msg' => 'Profile updated'
                    ]);
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $this->session->set_flashdata([
                        'type' => 'danger',
                        'title' => 'Error',
                        'msg' => 'Oops, something error'
                    ]);
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata([
                    'type' => 'danger',
                    'title' => 'Error',
                    'msg' => validation_errors()
                ]);
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect('organizer');
        }
    }

    public function ktp()
    {
        if (isset($_POST['submit'])) {
            $config['upload_path']  = 'assets/images/profil';
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
                $this->image_lib->resize();
                $picture = $gbr['file_name'];

                $data = [
                    'foto_ktp' => $picture,
                ];

                if ($this->MUser->ktp($data, $this->session->userdata('id'))) {
                    $this->session->set_userdata([
                        'foto_ktp' => $data['foto_ktp']
                    ]);
                    $this->session->set_flashdata([
                        'type' => 'default',
                        'title' => 'Success',
                        'msg' => 'Yeay, SK Organisasi berhasil ditambahkan'
                    ]);
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $this->session->set_flashdata([
                        'type' => 'danger',
                        'title' => 'Error!',
                        'msg' => 'Oops something error'
                    ]);
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata([
                    'type' => 'danger',
                    'title' => 'Error',
                    'msg' => 'Oops, something error'
                ]);
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect('organizer');
        }
    }
}