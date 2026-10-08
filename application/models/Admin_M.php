<?php

class Admin_M extends CI_Model{
    public function getUser(){
        return $this->db->order_by('username', 'ASC')->get('user')->result_array();
    }

    public function getPemasukan(){
        return $this->db->where('jenis_transaksi', 'pemasukan')->get('transaksi')->result_array();
    }

    public function getPengeluaran(){
        return $this->db->where('jenis_transaksi', 'pengeluaran')->get('transaksi')->result_array();
    }

    public function getUserById($id){
        return $this->db->where('id_user', $id)->get('user')->row_array();
    }

    public function totalTransaksi($jenis, $tanggalMulai = null, $tanggalAkhir = null){
        $this->db->select('COALESCE(SUM(nominal), 0) AS total', false)
            ->from('transaksi')
            ->where('jenis_transaksi', $jenis);

        if ($tanggalMulai !== null) {
            $this->db->where('tanggal >=', $tanggalMulai);
        }
        if ($tanggalAkhir !== null) {
            $this->db->where('tanggal <', $tanggalAkhir);
        }
        return (float) $this->db->get()->row()->total;
    }

    public function pemasukan_hari_ini(){
        return $this->totalTransaksi('pemasukan', date('Y-m-d'), date('Y-m-d', strtotime('tomorrow')));
    }

    public function pemasukan_bulan_ini(){
        return $this->totalTransaksi('pemasukan', date('Y-m-01'), date('Y-m-01', strtotime('first day of next month')));
    }

    public function pemasukan(){
        return $this->totalTransaksi('pemasukan');
    }

    public function pengeluaran_hari_ini(){
        return $this->totalTransaksi('pengeluaran', date('Y-m-d'), date('Y-m-d', strtotime('tomorrow')));
    }

    public function pengeluaran_bulan_ini(){
        return $this->totalTransaksi('pengeluaran', date('Y-m-01'), date('Y-m-01', strtotime('first day of next month')));
    }

    public function pengeluaran(){
        return $this->totalTransaksi('pengeluaran');
    }

    public function saldo_awal($tanggal){
        $pemasukan = $this->totalTransaksi('pemasukan', null, $tanggal);
        $pengeluaran = $this->totalTransaksi('pengeluaran', null, $tanggal);
        return $pemasukan - $pengeluaran;
    }
}