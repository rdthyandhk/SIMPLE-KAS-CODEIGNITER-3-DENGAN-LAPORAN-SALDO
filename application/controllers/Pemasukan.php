<?php

class Pemasukan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_M');
        if (empty($this->session->userdata('id_user'))) {
            redirect('auth');
        }
    }

    public function index(){
        $username = $this->session->userdata('username');
        $level = $this->session->userdata('level');
        $this->db->from('transaksi');
        $this->db->where('jenis_transaksi', 'pemasukan');
        if($level == 'user'){
            $this->db->where('username', $username);
        }
        $this->db->order_by('tanggal', 'DESC');
        $pemasukan = $this->db->get()->result_array();
        $data = array(
            'pemasukan' => $pemasukan
        );
        $this->template->load('layout/template', 'pemasukan_index', $data);
    }

    public function tambah(){
        $this->template->load('layout/template', 'crud/pemasukan_tambah');
    }

    public function simpan(){
        $data = array(
            'keterangan' => $this->input->post('keterangan'),
            'tanggal' => $this->input->post('tanggal'),
            'username' => $this->session->userdata('username'),
            'jenis_transaksi' => $this->input->post('jenis_transaksi'),
            'nominal' => $this->input->post('nominal'),
        );
        $this->db->insert('transaksi', $data);
        redirect('pemasukan');
    }

    public function edit($id){
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id);
        $this->db->where('jenis_transaksi', 'pemasukan');
        if ($this->session->userdata('level') == 'user') {
            $this->db->where('username', $this->session->userdata('username'));
        }
        $pemasukan = $this->db->get()->row_array();
        if (!$pemasukan) {
            show_404();
        }
        $data = array(
            'pemasukan' => $pemasukan
        );
        $this->template->load('layout/template', 'crud/pemasukan_edit', $data);
    }

    public function update($id){
        $data = array(
            'keterangan' => $this->input->post('keterangan'),
            'tanggal' => $this->input->post('tanggal'),
            'jenis_transaksi' => $this->input->post('jenis_transaksi'),
            'nominal' => $this->input->post('nominal')
        );
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
        redirect('pemasukan');
    }

    public function hapus($id){
        $this->db->where('id_transaksi', $id);
        $this->db->delete('transaksi');
        redirect('pemasukan');
    }
}