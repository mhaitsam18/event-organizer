<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Organizer
class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
        $this->load->helper('string');
        $this->load->model('MEvent');
        $this->load->model('MOrganizer');
        $this->load->model('MSponsor');
        if ($this->session->userdata('level') != '2') {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $top['title'] = "My Event - Eventku";

        $data = [
            'myEvent' => $this->MEvent->myEventOrganizer($this->session->userdata('id')),
        ];

        $this->load->view('organizer/layouts/VOTop', $top);
        $this->load->view('organizer/layouts/VONav');
        $this->load->view('organizer/VOEvent', $data);
        $this->load->view('organizer/layouts/VOBottom');
    }

    public function create()
    {
        $cek = $this->MOrganizer->cekUser($this->session->userdata('id'));
        if (count($cek) > 0) {
            $top['title'] = "Create Event - Eventku";
            $this->load->view('organizer/layouts/VOTop', $top);
            $this->load->view('organizer/layouts/VONav');
            $this->load->view('organizer/VOCreateEvent');
            $this->load->view('organizer/layouts/VOBottom');
        } else {
            $this->session->set_flashdata([
                'type' => 'danger',
                'title' => 'Error!',
                'msg' => 'You have to fullfill your organizer profile first'
            ]);
            redirect('organizer/profile');
        }
    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('name', 'Event name', 'required|max_length[30]');
            if ($this->form_validation->run() == TRUE) {
                if ($this->input->post('quota') < 30) {
                    $this->session->set_flashdata([
                        'type' => 'danger',
                        'title' => 'Error!',
                        'msg' => 'Oops minimal quota 30 orang'
                    ]);
                    redirect($_SERVER['HTTP_REFERER']);
                }
                if (strtotime($this->input->post('due_date')) < strtotime("now")) {
                    $this->session->set_flashdata([
                        'type' => 'danger',
                        'title' => 'Error!',
                        'msg' => 'Oops waktu sudah lewat'
                    ]);
                    redirect($_SERVER['HTTP_REFERER']);
                }
                $config['upload_path']  = 'assets/images/event';
                $config['allowed_types']  = 'jpg|png';
                $config['encrypt_name'] = TRUE;
                $config['max_size']      = 1024;

                $p = $this->MOrganizer->cekUser($this->session->userdata('id'));
                $idp = $p[0]->id;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('picture')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/event/' . $gbr['file_name'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']         = 300;
                    $config['height']       = 300;

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $picture = $gbr['file_name'];

                    $token = random_string('alnum', 20);
                    $data = [
                        'id_user' => $this->session->userdata('id'),
                        'id_penyelenggara' => $idp,
                        'name' => $this->input->post('name'),
                        'detail' => $this->input->post('detail'),
                        'price' => $this->input->post('price'),
                        'quota' => $this->input->post('quota'),
                        'time' => $this->input->post('time'),
                        'due_date' => $this->input->post('due_date'),
                        'end_date' => $this->input->post('end_date'),
                        'venue' => $this->input->post('venue'),
                        'address' => $this->input->post('address'),
                        'maps' => $this->input->post('maps'),
                        'picture' => $picture,
                        'token' => $token
                    ];
                    if ($this->MEvent->add($data)) {
                        $this->session->set_flashdata([
                            'type' => 'default',
                            'title' => 'Success',
                            'msg' => 'Your event has been created'
                        ]);
                        redirect('organizer/event/detail/' . $token);
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
                        'title' => 'Error!',
                        'msg' => 'Oops upload data error. Data must be less than 1MB'
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

    public function detail($token)
    {
        $top['title'] = "Detail Event - Eventku";
        $cek = $this->MEvent->detail($token);
        if ($cek) {
            $data['sponsor'] = $this->MSponsor->mySponsor($cek[0]->id);
            $data['event'] = $cek;
            $this->load->view('organizer/layouts/VOTop', $top);
            $this->load->view('organizer/layouts/VONav');
            $this->load->view('organizer/VODetailEvent', $data);
            $this->load->view('organizer/layouts/VOBottom');
        } else {
            $this->session->set_flashdata([
                'type' => 'danger',
                'title' => 'Error!',
                'msg' => 'Oops event not found'
            ]);
            redirect('organizer');
        }
    }

    public function update($token)
    {
        $top['title'] = "Update Event - Eventku";
        $cek = $this->MEvent->detail($token);
        if ($cek) {
            $data['event'] = $cek;
            $this->load->view('organizer/layouts/VOTop', $top);
            $this->load->view('organizer/layouts/VONav');
            $this->load->view('organizer/VOUpdateEvent', $data);
            $this->load->view('organizer/layouts/VOBottom');
        } else {
            $this->session->set_flashdata([
                'type' => 'danger',
                'title' => 'Error!',
                'msg' => 'Oops event not found.'
            ]);
            redirect('organizer');
        }
    }

    public function getupdate($token, $id)
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('name', 'Event name', 'required|max_length[30]');
            if ($this->form_validation->run() == TRUE) {
                if ($this->input->post('quota') < 30) {
                    $this->session->set_flashdata([
                        'type' => 'danger',
                        'title' => 'Error!',
                        'msg' => 'Oops minimal quota 30 orang'
                    ]);
                    redirect($_SERVER['HTTP_REFERER']);
                }
                if (strtotime($this->input->post('due_date')) < strtotime("now")) {
                    $this->session->set_flashdata([
                        'type' => 'danger',
                        'title' => 'Error!',
                        'msg' => 'Oops waktu sudah lewat'
                    ]);
                    redirect($_SERVER['HTTP_REFERER']);
                }

                if ($_FILES['picture']) {
                    $config['upload_path']  = 'assets/images/event';
                    $config['allowed_types']  = 'jpg|png';
                    $config['encrypt_name'] = TRUE;
                    $config['max_size']      = 1024;

                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('picture')) {
                        $gbr = $this->upload->data();
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/event/' . $gbr['file_name'];
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']         = 300;
                        $config['height']       = 300;

                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $picture = $gbr['file_name'];

                        $data = [
                            'name' => $this->input->post('name'),
                            'detail' => $this->input->post('detail'),
                            'price' => $this->input->post('price'),
                            'quota' => $this->input->post('quota'),
                            'time' => $this->input->post('time'),
                            'due_date' => $this->input->post('due_date'),
                            'venue' => $this->input->post('venue'),
                            'address' => $this->input->post('address'),
                            'maps' => $this->input->post('maps'),
                            'picture' => $picture
                        ];
                        if ($this->MEvent->update($data, $id)) {
                            $this->session->set_flashdata([
                                'type' => 'default',
                                'title' => 'Success',
                                'msg' => 'Your event has been updated'
                            ]);
                            redirect('organizer/event/detail/' . $token);
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
                            'title' => 'Error!',
                            'msg' => 'Oops upload data error. Data must be less than 1MB'
                        ]);
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                } else {
                    $data = [
                        'name' => $this->input->post('name'),
                        'detail' => $this->input->post('detail'),
                        'price' => $this->input->post('price'),
                        'quota' => $this->input->post('quota'),
                        'time' => $this->input->post('time'),
                        'due_date' => $this->input->post('due_date'),
                        'venue' => $this->input->post('venue'),
                        'address' => $this->input->post('address'),
                        'maps' => $this->input->post('maps')
                    ];
                    if ($this->MEvent->update($data, $id)) {
                        $this->session->set_flashdata([
                            'type' => 'default',
                            'title' => 'Success',
                            'msg' => 'Your event has been updated'
                        ]);
                        redirect('organizer/event/detail/' . $token);
                    } else {
                        $this->session->set_flashdata([
                            'type' => 'danger',
                            'title' => 'Error!',
                            'msg' => 'Oops something error'
                        ]);
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                }
            }
        }
    }

    public function delete($ide)
    {
        $del = $this->MEvent->delete($ide);
        if ($del) {
            $this->session->set_flashdata([
                'type' => 'default',
                'title' => 'Success',
                'msg' => 'Your event has been deleted'
            ]);
            redirect('organizer/event');
        } else {
            $this->session->set_flashdata([
                'type' => 'danger',
                'title' => 'Error!',
                'msg' => 'Oops something error'
            ]);
            redirect('organizer/event');
        }
    }

    public function sponsor()
    {
        if (isset($_POST['submit'])) {
            $config['upload_path']  = 'assets/images/event';
            $config['allowed_types']  = 'jpg|png';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = 1024;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('picture')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/event/' . $gbr['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 300;
                $config['height']       = 300;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $picture = $gbr['file_name'];

                $data = [
                    'id_event' => $this->input->post('id_event'),
                    'name' => $this->input->post('name'),
                    'detail' => $this->input->post('detail'),
                    'ava' => $picture,
                ];
                if ($this->MSponsor->add($data)) {
                    $this->session->set_flashdata([
                        'type' => 'default',
                        'title' => 'Success',
                        'msg' => 'Sponsor has been added'
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
            }
        } else {
            $this->session->set_flashdata([
                'type' => 'danger',
                'title' => 'Error!',
                'msg' => 'Oops something error'
            ]);
            redirect('organizer/event');
        }
    }
}