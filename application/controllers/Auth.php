<?php

class Auth extends CI_Controller{
    public function index(){
        $this->load->view('login');
    }

    public function masuk(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', array('username' => $username))->row_array();
        if (empty($user)) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger" role="alert">
                Username tidak ada!
            </div>');
            redirect('auth');
        }
        else if (hash_equals($user['password'], md5($password))) {
            $this->session->set_userdata(array(
                'username' => $user['username'],
                'nama' => $user['nama'],
                'level' => $user['level'],
                'id_user' => $user['id_user']
            ));
            $this->session->set_flashdata('alert', '
            <div class="alert alert-success" role="alert">
                Selamat datang di dashboard
            </div>');
            redirect('home');
        }
        else{
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger" role="alert">
                Password salah!
            </div>');
            redirect('auth');
        }
    }

    public function keluar(){
        $this->session->sess_destroy();
        redirect('auth');
    }
}