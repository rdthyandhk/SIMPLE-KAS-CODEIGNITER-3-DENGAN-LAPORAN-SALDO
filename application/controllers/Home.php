<?php

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_M');
        $this->load->library('Pdf');
        if (empty($this->session->userdata('id_user'))) {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->template->load('layout/template', 'dashboard');
    }

    public function laporan(){
        $tanggal1 = $this->input->get('tanggal1');
        $tanggal2 = $this->input->get('tanggal2');
        $this->db->from('transaksi');
        $this->db->where('tanggal >=', $tanggal1);
        $this->db->where('tanggal <=', $tanggal2);
        $this->db->order_by('tanggal', 'ASC');
        $laporan = $this->db->get()->result_array();
        $saldo_awal = $this->Admin_M->saldo_awal($tanggal1);
        $data = array(
            'tanggal1' => $tanggal1,
            'tanggal2' => $tanggal2,
            'laporan' => $laporan,
            'saldo_awal' => $saldo_awal
        );
        $this->load->view('laporan', $data);
    }

    

}