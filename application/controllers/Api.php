<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $kontak = $this->db->get('telepon')->result();
        } else {
            $this->db->where('id', $id);
            $kontak = $this->db->get('telepon')->result();
        }
        $this->response($kontak, 200);
    }


    //Menambah atau mengirim data kontak baru
    function index_post(){
        $data = array(
            'id' => $this->post('id'),
            'nama' => $this->post('nama'),
            'nomor' => $this->post('nomor')
        );

        $insert = $this->db->insert('telepon', $data);
        if($insert){
            $this->response($data, 200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }
}