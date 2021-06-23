<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        if((!empty($_SESSION['masuk']) && !empty($_SESSION['akses']))){
            $this->load->model('M_bersih');
            $this->load->model('M_kategori');
            $this->load->model('M_produk');
            $this->load->model('M_transaksi');
        }else{
            $this->session->set_flashdata('error', 'Maaf, Anda Hapus Login Dahulu');
			redirect('Welcome');
		}
    }

    function laba_resmi_detail(){
        $bulan = $this->input->post('bulan', TRUE);
        $tahun = $this->input->post('tahun', TRUE);

        $data = array(
            'penjualan' => $this->M_transaksi->get_data_penjualan($bulan, $tahun),
            'stok_in_sblm' => $this->M_transaksi->get_data_stok_in_sblm($bulan, $tahun),
            'stok_out_sblm' => $this->M_transaksi->get_data_stok_out_sblm($bulan, $tahun),
            'stok_in_ini' => $this->M_transaksi->get_data_stok_in_ini($bulan, $tahun),
            'stok_out_ini' => $this->M_transaksi->get_data_stok_out_ini($bulan, $tahun),
            'biaya' => $this->M_transaksi->get_detail_biaya($bulan, $tahun),
        );

        $this->load->view('bersih/bersih_laba_rugi_detail.php', $data);
    }

    function buku_besar_biaya(){
        $bulan = $this->input->post('bulan', TRUE);
        $tahun = $this->input->post('tahun', TRUE);

        $data = array(
            'biaya' => $this->M_transaksi->get_detail_biaya($bulan, $tahun),
            'pos' => $this->M_transaksi->get_semua_pos()
        );

        $this->load->view('bersih/bersih_buku_besar_detail.php', $data);
    }
}
?>