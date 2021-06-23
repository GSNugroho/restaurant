<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->library('session');
        if((!empty($_SESSION['masuk']) && !empty($_SESSION['akses']))){
            $this->load->model('M_kategori');
        }else{
            $this->session->set_flashdata('error', 'Maaf, Anda Hapus Login Dahulu');
			redirect('Welcome');
		}
    }

    // public function index(){
    //     $this->load->view('produk/produk_tambah_kategori');
    // }

    function tambah_kategori(){
        $kategori_nama = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $this->input->post('kategori_nama', true));

        $data = array(
            'kategori_id' => $this->get_kode_kategori(),
            'kategori_nama' => $kategori_nama,
            'kategori_dt_create' => date('Y-m-d H:i:s'),
            'kategori_user_create' => $this->session->userdata('nama'),
            'kategori_aktif' => 1
        );

        $this->M_kategori->insert_kategori($data);

        $all = array(
            'kategori' => $this->M_kategori->get_semua_kategori_js()
        );
        echo json_encode($all);
    }

    function get_kode_kategori(){
        $kode = $this->M_kategori->get_kode_kategori();
        foreach($kode->result_array() as $row){
            $data = $row['maxkode'];
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 3, 6);
        $noUrut++;
        $char = "HT-";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
    }
}