<?php
class M_kasir extends CI_Model{

    function get_all_order(){
        $sql = "SELECT count(*) as allcount FROM tbl_order";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_order_search($searchQuery){
        $sql = "SELECT count(*) as allcount FROM tbl_order WHERE 1=1 ".$searchQuery;
        $query = $this->db->query($sql);
        return $query;
    }

    function insert_pos($data){
        $this->db->insert('tbl_pos', $data);
    }

    function update_detail_pos($id, $data){
        $this->db->where('kd_pos', $id);
        $this->db->update('tbl_pos', $data);
    }

    function get_fetch_order($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $sql = "SELECT 
        tbl_order.order_id as order_id,
        tbl_order.order_nm_pemesan as order_nm_pemesan,
        DATE_FORMAT(tbl_order.order_dt_create, '%d-%m-%Y %H:%i:%s') as order_dt_create,
        tbl_order.order_aktif as order_aktif,
        tbl_order.order_selesai as order_selesai
        FROM tbl_order
        WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
        .$columnSortOrder." LIMIT ".$baris.", ".$rowperpage;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_data_order_masuk($id){
        $sql = "SELECT * FROM tbl_order WHERE tbl_order.order_id = '$id' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_detail_order_masuk($id){
        $sql = "SELECT
            tbl_order_detail.order_detail_id as order_detail_id,
            tbl_order_detail.order_detail_jumlah as order_detail_jumlah,
            tbl_produk.produk_satuan as produk_satuan,
            tbl_produk.produk_harga as produk_harga,
            tbl_produk.produk_nama as produk_nama,
            (CAST(order_detail_jumlah as FLOAT) * CAST(produk_harga as FLOAT))  as sub_total
        FROM
            tbl_order_detail
            JOIN tbl_order ON tbl_order_detail.order_id = tbl_order.order_id
            JOIN tbl_produk ON tbl_order_detail.order_detail_produk_id = tbl_produk.produk_id
        WHERE
            tbl_order.order_id = '$id' AND tbl_order.order_aktif = 1";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_all_pos(){
        $sql = "SELECT count(*) as allcount FROM tbl_pos";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_pos_search($searchQuery){
        $sql = "SELECT count(*) as allcount FROM tbl_pos WHERE 1=1 ".$searchQuery;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_fetch_pos($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $sql = "SELECT 
        tbl_pos.kd_pos as kd_pos,
        tbl_pos.nm_pos as nm_pos,
        tbl_pos.keterangan as keterangan,
        tbl_pos.dt_aktif as dt_aktif
        FROM tbl_pos
        WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
        .$columnSortOrder." LIMIT ".$baris.", ".$rowperpage;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_detail_pos($id){
        $sql = "SELECT 
        tbl_pos.kd_pos as kd_pos,
        tbl_pos.nm_pos as nm_pos,
        tbl_pos.keterangan as keterangan,
        tbl_pos.dt_aktif as dt_aktif
        FROM tbl_pos
        WHERE tbl_pos.kd_pos = '$id' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
?>