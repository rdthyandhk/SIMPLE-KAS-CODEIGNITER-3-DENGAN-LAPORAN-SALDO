<?php

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_M');
        if (empty($this->session->userdata('id_user')) || $this->session->userdata('level') == 'user') {
            redirect('auth');
        }
    }

    public function index(){
        $data = array(
            'user' => $this->Admin_M->getUser()
        );
        $this->template->load('layout/template', 'user_index', $data);
    }

    public function tambah(){
        $this->template->load('layout/template', 'crud/user_tambah');
    }

    public function simpan(){
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'nama'     => $this->input->post('nama'),
            'level'    => $this->input->post('level'),
        );
        $this->db->insert('user', $data);
        redirect('user/index');
    }

    public function edit($id){
        $user = $this->Admin_M->getUserById($id);
        if (!$user) {
            show_404();
        }

        $data = array(
            'user' => $user
        );
        $this->template->load('layout/template', 'crud/user_edit', $data);
    }

    public function update(){
        $id = $this->input->post('id_user');
        if (!$id) {
            show_404();
        }

        $data = array(
            'username' => $this->input->post('username'),
            'nama'     => $this->input->post('nama'),
            'level'    => $this->input->post('level'),
        );

        $password = $this->input->post('password');
        if ($password !== null && $password !== '') {
            $data['password'] = md5($password);
        }

        $this->db->where('id_user', $id);
        if (!$this->db->update('user', $data)) {
            show_error('Gagal memperbarui data pengguna.');
        }

        redirect('user/index');
    }

    public function hapus($id){
        $this->db->where('id_user', $id);
        $this->db->delete('user');
        redirect('user');
    }
}