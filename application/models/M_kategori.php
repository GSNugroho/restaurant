<?php
class M_kategori extends CI_Model{
    function insert_kategori($data){
        $this->db->insert('tbl_kategori', $data);
    }

    function get_kode_kategori(){
        $sql = "SELECT MAX(kategori_id) AS maxkode FROM tbl_kategori";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_semua_kategori(){
        $sql = "SELECT * FROM tbl_kategori ORDER BY kategori_id ASC";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_semua_kategori_js(){
        $sql = "SELECT * FROM tbl_kategori ORDER BY kategori_id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}