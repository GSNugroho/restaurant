<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan semua produk
    function produk_get() {
        $id = $this->get('id');
        if ($id == '') {
            $produk = $this->db->get('tbl_produk')->result();
        } else {
            $this->db->where('produk_id', $id);
            $produk = $this->db->get('tbl_produk')->result();
        }
        $this->response($produk, 200);
    }

    // Menampilkan semua menu yang dijual
    function menu_get(){
        $id = $this->get('id');
        $antia = 'HT-000002';
        $antib = 'HT-000005';
        if ($id == ''){
            $this->db->where('produk_kategori != ', $antia);
            $this->db->where('produk_kategori != ', $antib);

            $menu = $this->db->get('tbl_produk')->result();
        } else {
            $this->db->where('produk_id', $id);
            $this->db->where('produk_kategori != ', $antia);
            $this->db->where('produk_kategori != ', $antib);

            $menu = $this->db->get('tbl_produk')->result();
        }
        $this->response($menu, 200);
    }


    //Menambah atau mengirim data produk baru
    function produk_post(){
        $data = array(
            'produk_id' => $this->get_kd_produk(),
			'produk_nama' => $this->post('produk_nama'),
			'produk_kategori' => $this->post('produk_kategori'),
			'produk_harga' => $this->post('produk_harga'),
			'produk_sku' => $this->post('produk_sku'),
			'produk_satuan' => $this->post('produk_satuan'),
			'produk_jual' => $this->post('produk_jual'),
			'produk_stok' => $this->post('produk_stok'),
			'produk_deskripsi' => $this->post('produk_diskripsi'),
			'produk_jenis' => $this->post('produk_jenis'),
			'produk_dt_create' => date('Y-m-d H:i:s'),
			'produk_user_create' => $this->post('user_create'),
			'produk_aktif' => 1,
			'produk_level' => $this->post('produk_level')
        );

        $insert = $this->db->insert('tbl_produk', $data);
        if($insert){
            $this->response($data, 200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }
}